<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\EducationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function education_type()
    {
        return $this->belongsTo(EducationType::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($education) {
            $education->slug = $education->generateSlug($education->name);
            $education->save();
        });
    }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
