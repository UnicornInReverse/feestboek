@extends('layouts.master')

@section('content')
    <h1>Hallo, {{auth()->user()->name}}</h1>
    <h2><b><u>Users</u></b> <a href="{{route('admin.beers')}}">Beers </a><a href="{{route('admin.places')}}">Places</a></h2>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Admin</th>
        </tr>
        </thead>
        <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->admin}}</td>
            <td><a href="{{ route('admin.users.edit', $user->id) }}">Edit</a></td>
            <td><a href="{{route('admin.update', $user->id) }}"><button>
                        @if($user->admin==0)
                        Make admin
                            @else
                            No admin
                        @endif
                    </button></a></td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection





