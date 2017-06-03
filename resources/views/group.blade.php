@extends('home')
@section('sidebar')

<script>
    function setTask() 
    {   
        var taskname = $("#taskName").val();
        var taskcontent = $("#taskcontent").val();
        var idgroup = $("#groupid").val();
        var tok = $('#_token').val();
        var memberid = $("#member").find(":selected").val();
        
        var param = {
            "name" : taskname,
            "detail" : taskcontent,
            "idgroup" : idgroup,
            "member" : memberid,
            "_token" : tok
        }
        $.ajax({
            method: "POST",
            url: '/tasks/public/setTask',
            data: param,
            success:function(data)
            {
                alert(data.msg);
                $("#stat").text('');
                $("#taskList").append('<li>' + taskname + '</li>');
            },
            error:function()
            {
                alert("failed adding task");
            }
        });
    }
</script>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>GOAL</strong></div>
                <div class="panel-body">
                    {{ $group->mainPost }}
                </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>MEMBER</strong></div>
                <div class="panel-body">
                    <ul>
                    @foreach ($member as $m)
                    <li>
                        {{ $m->name }}
                    </li>
                    @endforeach
                    </ul>
                </div>
        </div>
    </div>
    @if(count($authmember) > 0)
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>PENDING TASK</strong></div>
                <div class="panel-body">
                    <ul id="taskList">
                    @if ($task->count() === 0)
                        <p id="stat">You don't have any task<p>
                    @else
                    @foreach ($task as $t)
                    <li>
                        {{ $t->taskName }}
                    </li>
                    @endforeach
                    @endif
                    </ul>
                </div>
        </div>
    </div>
    @if (Auth::user()->id == $group->groupAdmin)
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Task</div>
            <div class="panel-body">
                <div id="msg"></div>
                <!-- <form action="{{ url('groupTask') }}" method="POST"> -->
                <input type="text" name="name" id="taskName" placeholder="Task name">
                <br><br>
                <textarea name="content" id="taskcontent" placeholder="Describe task..."></textarea>
                <br>
                Select Member:<br>
                <select id="member">
                    @foreach($member as $m)
                        <option value="{{ $m->userId }}">{{ $m->name }}</option>
                    @endforeach                    
                </select>
                <br><br>                
                <input type="button" name="submit" value="Add Task" onclick="setTask()">
                <input type="hidden" name="groupid" id="groupid" value="{{ $group->idGroup }}">
                 <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}">
                <!-- </form> -->
            </div>
        </div>
    </div>
    @endif
    @else
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
            <form action="{{ url('join') }}" method="POST">
                {{ csrf_field() }}
                <input type="submit" value="Join">
                <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                <input type="hidden" name="groupid" value="{{ $group->idGroup }}">    
            </form>
                
            </div>
        </div>
    </div>
    @endif
</div>
@endsection