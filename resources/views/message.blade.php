@extends('home')
@section('sidebar')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>{{ $group->groupName }} Message Board</h2>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-body">
                @if (count($messages) > 0)
                    @foreach ($messages as $m)
                    <p>{{ $m->created_at }}  <strong>{{ $m->name }}</strong> : {{ $m->content }}</p>
                    @endforeach
                @else
                    This group doesn't have any message
                @endif
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-body">
                <form method="POST" action="{{ route('sendMsg') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="content" name="content" placeholder="Type something..">
                    </div>
                        <input type="hidden" name="groupid" value="{{ $group->idGroup }}">
                        <input type="submit" class="btn btn-default" value="Send">
                </form> 
            </div>
        </div>
    </div>
</div>    
@endsection