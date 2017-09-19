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
                    <li><a href="{{ route('backend.users.create')}}">Add User</a></li>
                    <li><a href="#">View Users</a></li>
                    </ul>
                </div>
                </div>

                <div class="panel-body">
                    @if (session('alerts'))
                        <div class="alert alert-success">
                            {{ session('alerts') }}
                        </div>
                    @endif
                    @if($users->count() == 0 )
                    <p> No one has been using this App</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr> 
                                <th>#</th> 
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th> 
                                <th>Roles</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username}}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                	@foreach($user->roles as $role)
                                		<label class="label label-default">{{ $role->display_name }}</label>
                            		@endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection