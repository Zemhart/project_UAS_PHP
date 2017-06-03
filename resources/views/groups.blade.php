@extends('home')
@section('sidebar')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Your Groups</div>
            <div class="panel-body">
                <ul>
                    @if (count($group) > 0)
                	@foreach($group as $g)
                	<li><a href="{{ url('groups', $g->groupId) }}">{{ $g->groupName }}</a></li>
                	@endforeach
                    @else
                        You don't have any group
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>    
@endsection