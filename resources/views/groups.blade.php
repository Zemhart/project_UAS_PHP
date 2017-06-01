<!-- @extends('home') -->
<!-- @section('sidebar') -->
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
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Your Groups</div>
            <div class="panel-body">
                <ul>
                	@foreach($group as $g)
                	<li><a href="{{ url('groups',$g->groupId) }}">{{ $g->groupId }}</a></li>
                	@endforeach
                </ul>
            </div>
        </div>
    </div>
</div>    
<!-- @endsection -->