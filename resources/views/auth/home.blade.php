@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Welkom {{auth()->user()->name}}

                        <hr>
                        <form method="get" action="{{ route('home.search') }}">

                            {!! Form::label('keyword', 'Zoek naar vrienden') !!}
                            {!! Form::text('keyword', isset($keyword) ? $keyword : '', ['class'=>'form-control', 'id'=>'content', 'placeholder' => 'Zoeken...']) !!}
                        </form>

                        <div><br>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{route('home.users', $user->id)}}">{{$user->name}}</a></td>
                                        <a class="btn btn-info btn-xs" href="{{route('users.add', $user->id)}}">Add friend</a>
                                        <br>
                                    </tr>
                                @endforeach
                                {{$users->links()}}
                            @endif
                        </div>

                        <hr>
                        @foreach(auth()->user()->friends as $friend)
                            {{ $friend->name }}
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
