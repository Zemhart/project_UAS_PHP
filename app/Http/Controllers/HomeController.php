<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\grouptask;
use App\member;

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
        $task = grouptask::join('groups', 'grouptasks.groupid', '=', 'groups.idGroup')->where([['userid',  Auth::user()->id], ['status', 0]])->get();
        $member = member::where('userid',  Auth::user()->id)->count();
        return response()->view('dashboard', [
            'tasks' => $task,
            'members' => $member
        ]);
    }
}
