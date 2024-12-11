<?php

namespace App\Models;

use App\Models\Street;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StreetImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function street()
    {
        return $this->belongsTo(Street::class);
    }
}
