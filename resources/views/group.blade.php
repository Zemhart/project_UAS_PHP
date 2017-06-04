@extends('home')
@section('sidebar')

<script>
    function change()
    {
        var idgroup = $("#groupid").val();
        var goal = $("#mainpost").val();
        var param = {
            "idgroup" : idgroup,
            "goal" : goal,
            "_token" : $("#_token").val()
        };
        $.ajax({
            method: "POST",
            url: "/tasks/public/change",
            data: param,
            success: function(data)
            {
                alert("Success");
                $("#goal").text(goal);
            },
            error: function()
            {
                alert("failed");
            }
        });
    }
    function done(task) 
    {
        var param = {
            "taskid" : task.taskId,
            "_token" : $("#_token").val()
        };

        $.ajax({
            method: "POST",
            url: "/tasks/public/done",
            data: param,
            success: function()
            {
                alert("Success");
                location.reload();
            },
            error: function()
            {
                alert("failed");
            }
        });
    }

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
        };
        $.ajax({
            method: "POST",
            url: '/tasks/public/setTask',
            data: param,
            success:function(data)
            {
                alert(data.msg);
                $("#stat").text('');
                location.reload();
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
    <div class="page-header">
        <h2>{{ $group->groupName }}</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#about">About</a></li>
            <li><a data-toggle="tab" href="#task">Tasks</a></li>
        </ul>
    </div>
    </div>
    <div class="tab-content">
            <div id="about" class="tab-pane fade in active">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><strong>GOAL</strong></div>
                        <div class="panel-body">
                            <h3 id="goal" style="font-family:'Lucida Console', Monaco, monospace">{{ $group->mainPost }}</h3>
                            @if (Auth::user()->id == $group->groupAdmin)
                                <div class="form-group">
                                        <label for="mainpost">Change goal:</label>
                                        <textarea name="mainpost" class="form-control" id="mainpost"></textarea>
                                </div>
                                <button type="change" class="btn btn-default" onclick="change()">Change</button>
                                
                            @endif
                        </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading"><strong>MEMBER</strong></div>
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach ($member as $m)
                        <li class="list-group-item">
                            <p class="list-group-item-heading">{{ $m->name }}
                            @if ($m->userId == $group->groupAdmin)
                                (Admin)
                            @endif
                            </p>
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            
            <div id="task" class="tab-pane fade">
            <div class="col-md-8 col-md-offset-2">                                
            @if(count($authmember) > 0)
                <div class="panel panel-info">
                    <div class="panel-heading"><strong>PENDING TASK</strong></div>
                        <div class="panel-body">
                            <ul id="taskList" class="list-group">
                            @if ($task->count() === 0)
                                <p id="stat">You don't have any task<p>
                            @else
                            @foreach ($task as $t)
                            <li class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $t->taskName }}</h4>
                                <p class="list-group-item-text">{{ $t->taskDetail }}</p>
                                <p>PIC: {{ $t->name  }}</p>
                                @if (Auth::user()->id == $t->userid)
                                <button type="submit" class="btn btn-success" onclick="done({{ $t }})">Done</button>
                                @endif
                            </li>
                            @endforeach
                            @endif
                            </ul>
                        </div>
                </div>
                @if (Auth::user()->id == $group->groupAdmin)
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
                        <!-- </form> -->
                    </div>
                </div>
                @endif                
                </div>
            @else
            <div class="alert alert-warning">
                <h3>You have to join first!</h3>
            </div>
            @endif
            </div>
    </div>
    
    @if(count($authmember) == 0)
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
    <input type="hidden" name="groupid" id="groupid" value="{{ $group->idGroup }}">
    <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}">
</div>
@endsection