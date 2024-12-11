<?php

namespace App\Models;

use App\Models\StreetImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Street extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function street_images()
    {
        return $this->hasMany(StreetImage::class);
    }
}
