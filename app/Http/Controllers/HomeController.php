<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Else_;
use Symfony\Component\Routing\Tests\Fixtures\RedirectableUrlMatcher;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('auth.home');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'required'
        ]);

        $keyword = $request->get('keyword');

        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('email', 'LIKE', '%' . $keyword . '%')->paginate(2);

        $users->appends(['keyword' => $keyword]);


        return view('auth.home', compact('users', 'keyword'));
    }

//    public function search(Request $request){
//        if ($request->isMethod('post')) {
//            $this->validate($request, [
//                'keyword' => 'required'
//            ]);
//
//            $keyword = $request->input('keyword');
//            $request->session()->flash('keyword', $keyword);
//
//            $users = User::where('name', 'LIKE', '%' . $keyword . '%')->paginate(2);
//
//            return view('auth.home', compact('users', 'keyword'));
//        }
//
//        else {
//            $keyword = $request->session()->get('keyword');
//            return view('auth.home', compact('keyword'));
//        }
//    }

    public function show(User $user)
    {
        return view('auth.user', compact('user'));
    }


    public function addFriend(User $user) {
        auth()->user()->friends()->toggle($user);

        return redirect()->route('home');
    }
}

