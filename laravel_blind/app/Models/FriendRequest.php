<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FriendRequest extends Model
{
    use HasFactory;

    protected $fillable = ['from_user_email', 'to_user_email', 'status'];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_user_email');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'to_user_email');
    }
}
