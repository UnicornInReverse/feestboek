@extends('layouts.master')

@section('content')
    <h2>Users</h2>
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
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection
