@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Welkom {{auth()->user()->name}}<br>
                        <br>


                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th width="50%">Plek</th>
                                <th>Voeg toe</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($places as $place)
                                <tr>
                                    <td><b>{{$place->name}}</b></td>
                                    <td><a href="{{route('place.store', $place->id)}}">
                                            @if($place->hasPlace(auth()->user()->id))
                                                Verwijder favoriet
                                            @else
                                                Favoriet
                                            @endif
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection