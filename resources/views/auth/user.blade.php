@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Dit is het profiel van {{$user->name}}<br>
                        <hr>

                        <h4><b>Favoriete bieren</b></h4>

                        <ul>
                            @foreach($user->beer as $beer)
                                <li>{{$beer->name}}</li>
                            @endforeach
                        </ul>

                        <h4><b>Favoriete plekken</b></h4>

                        <ul>
                            @foreach($user->place as $place)
                                <li>{{$place->name}}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection