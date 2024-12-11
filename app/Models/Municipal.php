<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MunicipalType;

class Municipal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function municipal_type()
    {
        return $this->belongsTo(MunicipalType::class);
    }
}
