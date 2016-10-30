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
                        <h4><b>Vrienden</b></h4>
                        @foreach(auth()->user()->friends as $friend)
                            {{ $friend->name }}<br>
                        @endforeach
                        <hr>

                        <form method="get" action="{{ route('home.search') }}">

                            {!! Form::label('keyword', 'Zoek naar vrienden') !!}
                            {!! Form::text('keyword', isset($keyword) ? $keyword : '', ['class'=>'form-control', 'id'=>'content', 'placeholder' => 'Zoeken...']) !!}
                        </form>

                        <div><br>
                            @if(isset($users) && $users->count())

                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th width="70%">Resultaten</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><a href="{{route('home.users', $user->id)}}">{{$user->name}}</a></td>
                                            <td><a class="btn btn-info btn-xs" href="{{route('users.add', $user->id)}}">
                                                    @if(auth()->user()->hasFriend($user->id))
                                                        Remove friend
                                                    @else
                                                        Add friend
                                                    @endif
                                                </a></td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            @else
                                Geen resultaten gevonden.
                            @endif
                        </div>

                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
