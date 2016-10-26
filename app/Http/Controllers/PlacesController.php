<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class PlacesController extends Controller
{
    public function index()
    {
        $places = Place::paginate(5);
        return view('admin.places.index', compact('places'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $place = new Place;

        $place->name = $request->name;

        $place->save();

        return back();

    }

    public function destroy(Place $place)
    {
        $place->delete();

        return Redirect::route('admin.places');
    }
}
