@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="{{ route('group') }}">Groups<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Message</a></li>
            <li><a href="#">Another</a></li>
          </ul>
        </div>
        @yield('sidebar')
    </div>
</div>
@endsection
