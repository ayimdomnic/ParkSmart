@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    {!! Form::open([ 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'route' => 'parking.store']) !!}
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                
                                <input class='form-control' name="name" id="name" type="text" value="{{ old('name')}}" placeholder="Name">

                                
                            </div>
                            <div class="col-md-6">
                                
                                 <input class='form-control' name="location" id="location" type="text" value="{{ old('location')}}" placeholder="Location">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <input class='form-control' name="latitude" id="latitude" type="number" value="{{ old('latitude')}}" placeholder="-32.0067890">
                            </div>
                            <div class="col-md-6">
                                <input class='form-control' name="longitude" id="longitude" type="number" value="{{ old('longitude')}}" placeholder="-34.0098902">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <input class='form-control' name="levels" id="levels" type="number" value="{{ old('levels')}}" placeholder="5">
                            </div>
                            <div class="col-md-6">
                                <input class='form-control' name="cost" id="cost" type="number" value="{{ old('cost')}}" placeholder="500000.00">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-12">
                            <input type="file" accept="image/*" name="cover_image" class="form-control-file" id="cover_image" aria-describedby="fileHelp">
                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Add Parking </button>
                                <a href="{{route('home')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection