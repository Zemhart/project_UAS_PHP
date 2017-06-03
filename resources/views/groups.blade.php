<!-- @extends('home') -->
<!-- @section('sidebar') -->

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