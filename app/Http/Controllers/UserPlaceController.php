<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
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
    
    public function show (Place $place) {
        return view ('auth.show', compact('place'));
    }

    public function storeReview (Request $request, Place $place) {
        $this->validate($request, [
            'review'=>'required',
        ]);

        $review = new Review;
        $review->review = $request->get('review');
        $review->place_id = $place->id;
        $review->user_id = auth()->user()->id;
        $review->save();

        return redirect()->route('place.show', $place->id);
    }

}
