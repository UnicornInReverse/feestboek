<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.edit')->with('user', $user);
    }
    
    public function update(Request $request, User $id){

        $id->update($request->all());


        return Redirect::route('admin.index');
    }
}
