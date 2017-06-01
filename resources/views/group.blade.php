@extends('home')
@section('sidebar')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>GOAL</strong></div>
            {{ $group->mainPost }}
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>MEMBER</strong></div>
            <ul>
            @foreach ($member as $m)
            <li>
            	{{ $m->name }}
            </li>
            @endforeach
            </ul>
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>PENDING TASK</strong></div>
            @if ($task->count() === 0)
            	You don't have any task
            @else
            	You have something
            @endif
            <ul>
            @foreach ($task as $t)
            <li>
            	{{ $t->taskName }}
            </li>
            @endforeach
            </ul>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>
@endsection