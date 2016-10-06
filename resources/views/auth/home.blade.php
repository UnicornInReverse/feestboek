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
                    <form method="post" action="{{ route('user.search') }}">

                        {!! Form::label('keyword', 'Zoek naar vrienden') !!}
                        {!! Form::text('keyword', '', ['class'=>'form-control', 'id'=>'content', 'placeholder' => 'Zoeken...']) !!}
                        {{ csrf_field() }}
                    </form>

                    <div><br>
                        @if(isset($users))
                            @foreach($users as $user)
                                <tr>
                                    <td><a>{{$user->name}}</a></td><br>
                                </tr>
                            @endforeach
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
