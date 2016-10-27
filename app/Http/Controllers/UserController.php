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

    public function edit(User $user){

        return view('admin.edit')->with('user', $user);
    }
    
    public function update(Request $request, User $user){

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'admin'=>'required|min:0|max:1|integer'
        ]);

        $user->update($request->all());

        return Redirect::route('admin.index');
    }
    
        public function adminUpdate(User $user){

        if($user->admin == 1){
            $user->admin = 0;
        }
        else {
            $user->admin = 1;
        }

        $user->save();

        return Redirect::route('admin.index');
    }

    public function destroy(User $user) {

        $user->delete();

        return Redirect::route('admin.index');
    }
}
