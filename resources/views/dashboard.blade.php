@extends('home')
@section('sidebar')
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h2>Welcome</h2>
    </div>
</div>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">Current Tasks</div>
        <div class="panel-body">
            @if(count($tasks) > 0)
            <table class="table table-striped task-table">
                <tbody>
                    <thead>
                        <th>Task</th>
                        <th>Detail</th>
                        <th>Group</th>
                    </thead>
                    @foreach($tasks as $task)
                    <tr>
                        <td class="table-text">
                            {{ $task->taskName }}
                        </td>
                        <td>
                            {{ $task->taskDetail }}
                        </td>
                        <td>
                            {{ $task->groupName }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>You don't have any task</p>
            @endif
        </div>
    </div>
</div>
@endsection        