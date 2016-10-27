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

                        {!!Form::open(['route' => 'place.store'])!!}
                        <div class="form-group">
                            {!! Form::label('review', 'Laat een review achter!') !!}
                            {!! Form::textarea('review', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Verstuur', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!!Form::close()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection