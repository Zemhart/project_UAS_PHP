@extends('home')
@section('sidebar')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Group search results:</strong></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach ($groups as $g)
                    <li class="list-group-item"><a href="{{ url('groups', $g->idGroup) }}">{{ $g->groupName }}</a></li>
                    @endforeach
                </ul>
            </div>
         </div>
     </div>
</div>
@endsection