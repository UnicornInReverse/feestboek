@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h3>{{$place->name}}</h3>
                        <hr>
                        <h2>Reviews</h2>

                        @foreach($place->reviews as $review)
                            <div class="well">
                                <b>{{$review->user->name}}</b>
                                <hr>
                                {{$review->review}}
                            </div>
                        @endforeach

                        @if(auth()->user()->place->count() > 2)
                        {!!Form::open(['url' => 'place/'.$place->id])!!}
                        <div class="form-group">
                            {!! Form::label('review', 'Laat een review achter!') !!}
                            {!! Form::textarea('review', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Verstuur', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!!Form::close()!!}
                        @else
                            <div class="alert alert-info">
                                Je moet 3 plekken toevoegen om een review ergens achter te laten.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection