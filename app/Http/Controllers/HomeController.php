<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Else_;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('auth.home');
    }

    public function search(Request $request){
        $this->validate($request, [
           'keyword' => 'required'
        ]);

        $keyword = $request->input('keyword');

        $users = User::where('name', 'LIKE', '%'.$keyword.'%')->get();

        return view('auth.home', compact('users', 'keyword'));
    }
}

