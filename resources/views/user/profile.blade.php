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

                    <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-4">
                            <div class="list-group">
                            <a href="#" class="list-group-item">
                                <img src="{{ user()->avatar}}" alt="{{ user()->username}} image">   
                                <h4 class="list-group-item-heading">{{ user()->name }}</h4>
                                <p class="list-group-item-text">{{ user()->biography }}</p>
                            </a>
                            <li class="list-group-item">
                                <span class="badge">14</span>
                                Messages
                            </li>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a data-toggle="tab" href="#favourites"><i class="fa fa-star"></i> Favourites</a></li>
                                <li role="presentation"><a data-toggle="tab" href="#locations"><i class="fa fa-map"></i> Locations </a></li>
                                <li role="presentation"><a data-toggle="tab" href="#points"><i class="fa fa-diamond"></i> Points </a></li>
                                <li role="presentation"><a data-toggle="tab" href="#leaderboard"> <i class="fa fa-users"></i> Leader Board </a></li>
                                <li role="presentation"><a data-toggle="tab" href="#orders"><i class="fa fa-cogs"></i> Orders </a></li>
                                <li role="presentation"><a data-toggle="tab" href="#profile"><i class="fa fa-cogs"></i> Edit Profile </a></li>
                            </ul>
                            <div class="tab-content">
                            <div id="favourites" class="tab-pane fade in active">
                                <h3>Favourites</h3>
                                <p>Some content.</p>
                            </div>
                            <div id="locations" class="tab-pane fade">
                                <h3>Locations</h3>
                                <p>Some content in menu 1.</p>
                            </div>
                            <div id="points" class="tab-pane fade">
                                <h3>Points</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                            <div id="leaderboards" class="tab-pane fade">
                                <h3>Leader</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                            <div id="orders" class="tab-pane fade">
                                <h3>Orders</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                            <div id="profile" class="tab-pane fade">
                                <h3>Edit Profile</h3>
                                <p> {{ user()->name }} </p>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        {!! Form::open(['method'=> 'POST', 'route' => 'profile.update', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}
                                        
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection