<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Task;
use App\grouptask;
use App\user;
use App\member;
use App\group;


Route::post('/groupTask', function(Request $req) {
	$name = $req->taskName;
	$detail = $req->content;
	$idgroup = $req->groupid;

	$grouptask = new grouptask;

});

Route::get('/tasks', function() {
	$tasks = Task::orderBy('created_at', 'asc')->get();
	return view('tasks', [
		'tasks' => $tasks
	]);
});

Route::get('/ex', function() {
	$tasks = Task::orderBy('created_at', 'asc')->get();
    $group = grouptask::orderBy('taskId', 'asc')->get();
    return view('tasks', [
    	'tasks' => $tasks,
    	'group' => $group
    ]);
});

Route::get('/groups/{id}', function($id) {
	$group = group::where('idGroup', $id)->get();
	$member = member::join('users', 'members.userId', '=', 'users.id')->where('groupId', $id)->get();
	$task = grouptask::where([['groupid', $id], ['status', '=', 0]])->get();
	return view('group', [
		'group' => $group[0],
		'member' => $member,
		'task' => $task
	]);
});

Route::get('/test', function() {
	return view('test');
});

Route::get('/search', function() {
	$groups = group::get();
	return view('search', [
		'groups' => $groups
	]);
});

Route::post('/search', function(Request $request) {
	$search = $request->search;
	$groups = group::where('groupName', 'LIKE', "$search%")->get();
	return view('search', [
		'groups' => $groups
	]);
})->name('search');

Route::get('/recent', function() {
	
});

Route::get('/', function () {
	return redirect()->route('login');
});


// Route::post('/task', function(Request $request) {
// 	$validator = Validator::make($request->all(), [
// 		'name' => 'required|max:30'
// 	]);
// 	if ($validator->fails()) {
// 		return redirect('/ex')->withInput()->withErrors($validator);
// 	}
// 	$task = new Task;
// 	$task->name = $request->name;
// 	$task->save();
// 	return redirect('/ex');
// });

Route::post('/login', function (Request $request) {
	$user = user::where('Name' , $request->username)->get();
	$users = member::orderBy('memberId', 'asc')->get();
	foreach ($users as $u) {
		echo $u;
	}
	echo $user;
});

Route::delete('/task/{id}', function($id) {
	Task::findOrFail($id)->delete();

	return redirect('/tasks');
});

Route::get('/hello/{name}', function($name) {
	return view('hello', [
		'name' => $name
	]);
});

Route::get('/home', function() {
	$groups = member::where('userid', Auth::user()->id)->count();
	return view('home', [
		'groups' => $groups
	]);
});

Route::get('/groups', function() {
    $groups = grouptask::where([['userid',  Auth::user()->id], ['status', 0]])->count();
    $group = member::where('userid', Auth::user()->id)->get();	
	return view('groups', [
		'groups' => $groups,
		'group' => $group
	]);
})->name('group');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ajax', 'AjaxController@index');
Route::post('/setTask', 'AjaxController@setTask');