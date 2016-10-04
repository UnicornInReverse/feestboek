<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Else_;


class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.edit')->with('user', $user);
    }
    
    public function update(Request $request, User $id){

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'admin'=>'required|min:0|max:1|integer'
        ]);

        $id->update($request->all());

        return Redirect::route('admin.index');
    }
    
    public function adminUpdate($id){
        $user = User::findOrFail($id);
        if($user->admin == 1){
            $user->admin = 0;
        }
        else {
            $user->admin = 1;
        }

        $user->save();

        return Redirect::route('admin.index');
    }

    public function delete($id) {
        $user = User::findOrFail($id);

        $user->delete();

        return Redirect::route('admin.index');
    }
}
