<?php

namespace App\Models;

use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
