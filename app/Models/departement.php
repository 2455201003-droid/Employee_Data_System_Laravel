<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    public function employe()
    {
       return $this->hasMany(employe::class);
    }
}
