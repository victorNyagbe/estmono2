<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipal;

class MunicipalType extends Model
{
    use HasFactory;

    public function municipals()
    {
        return $this->hasMany(Municipal::class);
    }
}
