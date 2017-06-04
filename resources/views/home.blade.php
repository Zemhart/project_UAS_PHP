@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="{{ route('group') }}">Groups</a></li>
            <li><a href="{{ route('profile') }}">Profile</a></li>
          </ul>
        </div>
        @yield('sidebar')
    </div>
</div>
@endsection
