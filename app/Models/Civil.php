<?php

namespace App\Models;

use App\Models\FichierCivil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Civil extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fichier_civils()
    {
        return $this->hasMany(FichierCivil::class);
    }
}
