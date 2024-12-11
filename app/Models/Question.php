<?php

namespace App\Models;

use App\Models\CategoryQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category_question()
    {
        return $this->belongsTo(CategoryQuestion::class);
    }
}
