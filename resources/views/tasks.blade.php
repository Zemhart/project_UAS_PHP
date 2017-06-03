@extends('app')

@section('content')
<div class="panel-body">
    @include('errors')
    <form action="{{ url('task') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" placeholder="Task name">
            </div> 
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
        </div>
    </form>
</div>
@if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="{{ url('task', $task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button>Delete Task</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    
    </div>
@endif
<!-- <div class="panel-body">
    <ul>

    </ul>
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
</ul>
<form action="{{ url('task') }}" method="post">
	{{ csrf_field() }}
	<input type="text" name="username" placeholder="Your user name..."><br>
	<input type="password" name="password" placeholder="Your password...">
	<input type="submit" name="login" value="Login">
</form> -->
@endsection