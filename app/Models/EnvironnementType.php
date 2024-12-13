<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironnementType extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function environnements()
    {
        return $this->hasMany(Environnement::class);
    }
}
