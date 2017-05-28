@extends('layouts.app')

@section('content')
@include('errors')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Current tasks:</strong></div>
                <div class="panel-body">
                    <ul>
                        @foreach ($tasks as $t)
                        <li>{{ $t->name }}</li>
                        @endforeach
                    </ul>
                </div>
             </div>
         </div>
    </div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Task</div>
            <div class="panel-body">
                <form action="{{ url('task') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="name" placeholder="Task name">
                    <input type="submit" name="submit" value="Add Task">
                </form>
            </div>
        </div>
    </div>
</div>    
<strong>Current group tasks:</strong>
<ul>
	@foreach ($group as $t)
	<li>{{ $t->taskName }}</li>
	@endforeach
</ul>
<form action="{{ url('task') }}" method="post">
	{{ csrf_field() }}
	<input type="text" name="username" placeholder="Your user name..."><br>
	<input type="password" name="password" placeholder="Your password...">
	<input type="submit" name="login" value="Login">
</form>
@endsection