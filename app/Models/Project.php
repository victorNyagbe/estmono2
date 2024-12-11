<?php

namespace App\Models;

use App\Models\ProjectType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class);
    }
}
