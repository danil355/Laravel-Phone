<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Phone;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    function toggle(Phone $phone) {

        $favorites = $phone->favorites();
        $exists = auth()->user()->isFavorite($phone);

        if ($exists) {
            $favorites->detach(auth()->id());
        } else {
            $favorites->attach(auth()->id());
        }

        return [
            'favorite' => !$exists
        ];
    }

    function index() {

        $phones = auth()->user()
            ->favorites()
            ->latest()
            ->paginate(10);

        return view('phones.favorites', [
            'phones' => $phones
        ]);
    }
}
