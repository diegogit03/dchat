<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_chat');
    }

    public static function allFromUser(int $user_id)
    {
        return self::whereRelation('users', 'user_id', $user_id)
            ->with('users')
            ->get();
    }
}
