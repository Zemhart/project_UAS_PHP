@extends('home')
@section('sidebar')
<script>
    function newgroup()
    {
        var idgroup = $("#idgroup").val();
        var groupname = $("#groupname").val();
        var userid = $("#userid").val();
        var tok = $("#_token").val();

        var param = {
            "idgroup": idgroup,
            "groupname": groupname,
            "userid": userid,
            "_token": tok
        };

        $.ajax({
            method: "POST",
            url: '/tasks/public/new',
            data: param,
            success:function(data)
            {
                alert("Success");
                location.reload();
            },
            error:function()
            {
                alert("failed create group");
            }
        });
    }
</script>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>Groups</h2>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">Your Groups</div>
            <div class="panel-body">
                <ul class="list-group">
                    @if (count($group) > 0)
                	@foreach($group as $g)
                	<li class="list-group-item">
                    <a href="{{ url('groups', $g->groupId) }}" class="btn btn-primary">{{ $g->groupName }}</a>
                    <a href="{{ url('messages', $g->groupId) }}" class="btn btn-info">Message</a>
                    </li>
                	@endforeach
                    @else
                        You don't have any group
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create Group</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="idgroup">Group id:</label>
                    <input type="text" name="idgroup" id="idgroup" placeholder="Group id...">
                </div>
                <div class="form-group">
                    <label for="groupname">Group name:</label>
                    <input type="text" name="groupname" id="groupname" placeholder="Group name...">
                </div>
                <button type="create" class="btn btn-default" onclick="newgroup()">Create New Group</button>
                <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}">
                <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id }}">                
            </div>
        </div>
    </div>
</div>    
@endsection