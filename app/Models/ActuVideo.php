<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActuVideo extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function videoType()
    {
        return $this->belongsTo(VideoType::class);
    }
}
