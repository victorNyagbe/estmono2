<?php

namespace App\Models;

use App\Models\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
