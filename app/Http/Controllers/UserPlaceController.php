<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class UserPlaceController extends Controller
{
    public function index () {
        $places = Place::all();
        return view ('auth.places', compact('places'));
    }

    public function store(Request $request, Place $place)
    {
        $userID = auth()->user()->id;
        if ($place->hasPlace($userID)) {
            $place->removePlace($userID);
        } else {
            $place->addPlace($userID);
        }

        return Redirect::route('home.places');
    }

}
