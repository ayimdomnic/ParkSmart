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
                    <li><a href="{{ route('parking.add')}}">Add Parking</a></li>
                    <li><a href="#">View Users</a></li>
                    </ul>
                </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($parking->count() == 0 )
                    <p> No one has been using this App</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr> 
                                <th>#</th> 
                                <th>Name</th>
                                <th>Location</th> 
                                <th>Levels</th> 
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parking as $spot)
                            <tr>
                                <td>{{ $spot->id }}</td>
                                <td>{{ $spot->name }}</td>
                                <td>{{ $spot->location}}</td>
                                <td>{{ $spot->levels }}</td>
                                <td>{{ $spot->cost }}</td>
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
