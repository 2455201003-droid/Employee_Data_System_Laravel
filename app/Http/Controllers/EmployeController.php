<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\departement;
use App\Models\Employe;


class EmployeController extends Controller
{
    //
public function index(Request $request)
{
    $search = $request->search;

    $data = Employe::with('departement')
        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {
                $q->where('nama_pegawai', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->orWhereHas('departement', function ($q2) use ($search) {
                      $q2->where('nama_departemen', 'like', "%{$search}%");
                  });
            });

        })
        ->paginate(10);


    return view('show_employes', compact('data'));
}

    public function create() {
        $departements = departement::all();
        return view('add_employes', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'departement_id' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('foto_pegawai'), $namaFoto);
        }


        Employe::create([
            'nip' => $request->nip,
            'nama_pegawai' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'departement_id' => $request->departement_id,
            'foto' => $namaFoto
    ]);

    return redirect('/employes')->with('Berhasil','Data surat berhasil ditambahkan');

}

    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        $departements = Departement::all();

        return view('edit_employes', compact('employe', 'departements'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'departement_id' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $employe = Employe::findOrFail($id);

        $data = [
            'nip' => $request->nip,
            'nama_pegawai' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'departement_id' => $request->departement_id,
        ];

        if ($request->hasFile('foto')) {

        if ($employe->foto && file_exists(public_path('foto_pegawai/' . $employe->foto))) {
            unlink(public_path('foto_pegawai/' . $employe->foto));
        }

            $file = $request->file('foto');
            $namaFoto = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('foto_pegawai'), $namaFoto);
            $data['foto'] = $namaFoto;
        }
        $employe->update($data);

        return redirect('/employes')->with('success', 'Data berhasil diupdate');
    }


    
   public function destroy($id)
    {
        $employe = Employe::findOrFail($id);

    
        if ($employe->foto && file_exists(public_path('foto_pegawai/' . $employe->foto))) {
            unlink(public_path('foto_pegawai/' . $employe->foto));
        }

    
        $employe->delete();

        return redirect('/employes')
            ->with('success', 'Data berhasil dihapus');
    }


    public function exportPdf()
    {
        $data = Employe::with('departement')->get();
        $pdf = PDF::loadView('pdf', compact('data'));
        return $pdf->download('data-pegawai.pdf');
    }
}
