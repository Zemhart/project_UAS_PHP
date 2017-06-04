@extends('home')
@section('sidebar')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>Account Setting</h2>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="panel panel-info">
            <div class="panel-heading">Edit Account</div>
            <div class="panel-body">
                 <form action="{{ route('editAcc') }}" method="POST">
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd">
                  </div>
                  <button type="submit" class="btn btn-default">Save</button>
                </form> 
            </div>
        </div>
    </div>
</div>    
@endsection