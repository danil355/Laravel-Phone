<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    function user() {
        return $this->belongsTo(User::class);
    }

    function phone() {
        return $this->belongsTo(Phone::class);
    }
}
