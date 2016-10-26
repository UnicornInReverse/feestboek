@extends('layouts.master')

@section('content')
    <h1>Hallo, {{auth()->user()->name}}</h1>
    <h2><a href="{{route('admin.index')}}">Users </a><b><u>Beers</u></b></h2>

    <hr>

    {!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('name', 'Nieuw:') !!}<br>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Voeg toe', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}


    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($beers as $beer)
            <tr>
                <td>{{$beer->name}}</td>
                <td><a href="">Edit</a></td>
                <td><a href="{{route('admin.beers.delete', $beer->id)}}">
                        <button>Delete</button>
                    </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection