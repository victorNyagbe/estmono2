<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureType extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function cultures()
    {
        return $this->hasMany(Culture::class);
    }
}
