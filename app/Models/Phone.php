<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'color', 'price'
    ];


    function user() {
        return $this->belongsTo(User::class);
    }
}
