@extends('home')
@section('sidebar')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Welcome</div>
        <div class="panel-body">       
            @if($gcount > 0)
	            <ul>
	            @foreach($groups as $g)
	            	<li>$g</li>
	            @endforeach
				</ul>            	
            @else
            <p>You don't have any group</p>
            @endif
        </div>
    </div>
</div>
@endsection        