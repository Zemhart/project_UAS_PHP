<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\grouptask;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = grouptask::where([['username',  Auth::user()->id], ['status', 0]])->get();
        $c = grouptask::where([['username',  Auth::user()->id], ['status', 0]])->count();
        return response()->view('dashboard', [
            'groups' => $groups,
            'gcount' => $c
        ]);
    }
}
