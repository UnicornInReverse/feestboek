@extends('layouts.master')

@section('content')
    <h2>Edit user</h2>

    <form method="post" action="{{ url('admin/users/' . $user->id) }}">
        {{method_field('patch')}}
    <div class="form-group">
        {!! Form::label('name', 'Username') !!}
        {!! Form::text('name', $user->name, ['class'=>'form-control', 'id'=>'content']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::text('email', $user->email, ['class'=>'form-control', 'id'=>'content']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('admin', 'Admin') !!}
        {!! Form::text('admin', $user->admin, ['class'=>'form-control', 'id'=>'content']) !!}
    </div>
        {{ csrf_field() }}
    <div>
    {!! Form::submit('Opslaan') !!}
    </div>

    </form>
@endsection