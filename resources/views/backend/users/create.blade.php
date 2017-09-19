@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" class="pull-right">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('backend.users.index')}}">All Users</a></li>
                    <li><a href="#">View Users</a></li>
                    </ul>
                </div>
                </div>
                <div class="panel-body">
                	    <div class="box box-success">
				        {!! Form::open(['method' => 'POST', 'route' => 'backend.users.store', 'files' => true, 'role' => 'form']) !!}

				        <div class="box-body">
				        	<input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}" placeholder="Name">
				        	<input type="email" id="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="Email"> 
				        	<input type="text" id="username" name="username" class="form-control" value="{{ old('username')}}" placeholder="Username">
				        	<input type="password" id="password" name="password" class="form-control" placeholder="password">
				        	<input type="password" name="password_confrim" type="password" class="form-control" placeholder="Confirm Password">
				        	<input type="file" name="avatar" class="form-control-file">
				        </div>
				        <!-- /.box-body -->

				        <div class="box-footer">
				            <input type="submit" name="" class="form-submit">
				        </div>

				        {!! Form::close() !!}
				    </div>
                </div>

            </div>
        </div>
    </div>            
</div>

@endsection