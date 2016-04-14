<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getLogin() {
        return view('admin.login');
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'admin' => 'required',
            'password' => 'required'
        ]);

        if ( !Auth::attempt(['admin' => $request['admin'], 'password' => $request['password']]) ) {
            return redirect()->back()->with(['fail' => 'Could not log you in!']);
        }
        return redirect()->route('admin.dashboard');
    }

    public function getDashBoard() {
        if ( !Auth::check() ) {
            return redirect()->route('admin.login');
        }

        $authors = Author::all();
        return view('admin.dashboard', ['authors' => $authors]);
    }
}