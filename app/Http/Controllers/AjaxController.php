<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\grouptask;
use Illuminate\Support\Facades\Auth;
use App\group;
use App\member;

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

    public function done(Request $req)
    {
    	$taskid = $req->input('taskid');
    	grouptask::where('taskId', $taskid)->update(['status' => 1]);
    	return response()->json(array('msg' => "success"), 200);
    }

    public function change(Request $req)
    {
    	$idgroup = $req->input('idgroup');
    	$goal = $req->input('goal');
    	group::where('idGroup', $idgroup)->update(['mainPost' => $goal]);
    	return response()->json(array('msg' => "success"), 200);
    }

    public function newgroup(Request $req)
    {
    	$idgroup = $req->input('idgroup');
    	$groupname = $req->input('groupname');
    	$userid = $req->input('userid');
    	$group = new group;

    	$group->idGroup = $idgroup;
    	$group->groupName = $groupname;
    	$group->groupAdmin = $userid;
    	$group->mainPost = "This group doesn't have any goal yet";
    	$group->save();

    	$member = new member;
    	$member->userId = $userid;
    	$member->groupId = $idgroup;
    	$member->save();
    	return response()->json(array('msg' => "success"), 200);
    }
}
