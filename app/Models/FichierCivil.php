<?php

namespace App\Models;

use App\Models\Civil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FichierCivil extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function civil()
    {
        return $this->belongsTo(Civil::class);
    }
}
