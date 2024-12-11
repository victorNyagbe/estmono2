<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoType extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function actuVideos()
    {
        return $this->hasMany(ActuVideo::class);
    }
}
