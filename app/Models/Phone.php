<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'color', 'price', 'image_path'
    ];


    function user() {
        return $this->belongsTo(User::class);
    }

    function comments() {
        return $this->hasMany(Comment::class);
    }

    function favorites() {
        return $this->belongsToMany(User::class, Favorite::class);
    }


    function deleteImage() {

        if (!$this->image_path)
            return;

        $file = storage_path('app/' . $this->image_path);

        if (!file_exists($file))
            return;

        unlink($file);
    }
}
