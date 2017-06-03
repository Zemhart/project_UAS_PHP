<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\grouptask;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function index() 
    {
    	$msg = "Test Message";
    	return response()->json(array('msg'=> $msg), 200);
    }

    public function setTask(Request $req)
    {
    	$name = $req->input('name');
    	$detail = $req->input('detail');
    	$idgroup = $req->input('idgroup');
    	$userid = $req->input('member');
    	$grouptask = new grouptask;
    	
    	$grouptask->groupid = $idgroup;
    	$grouptask->taskName = $name;
    	$grouptask->taskDetail = $detail;
    	$grouptask->userid = $userid;    	
    	$grouptask->save();
    	return response()->json(array('msg' => "success"), 200);
    }
}
