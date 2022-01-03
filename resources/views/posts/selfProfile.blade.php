@extends('layouts.login')

@section('content')

<h2>User</h2>
<div class="container border-bottom py-4">
{!! Form::open() !!}
    <div class="row px-5 ">
        <div class="col-1" for="icon">
            <img class="rounded-circle" src="/images/icons/{{ $loginUser->images }}" alt="">
        </div>
        <div class="col">
            {{ Form::label('username','UserName',['class'=>'label']) }}
            {{-- {{ Form::text('username',null,['class' => 'input', 'placeholder' => 'a']) }} --}}
            {{ Form::text('username',$loginUser->username,['class' => 'input']) }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ Form::label('mail','MailAddress',['class'=>'label']) }}
            {{ Form::text('mail',$loginUser->mail,['class' => 'input']) }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ Form::label('password', 'Password',['class'=>'label']) }}
            {{ Form::text('password',$loginUser->password,['class' => 'input']) }}
            {{-- <p>Password : {{$loginUser->password}}</p> --}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ Form::label('password-confirm','New Password',['class'=>'label']) }}
            {{ Form::text('password_confirmation',$loginUser->password,['class' => 'input']) }}
            <p>New Password : {{$loginUser->password}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ Form::label('password-confirm','Bio',['class'=>'label']) }}
            {{ Form::text('password_confirmation',$loginUser->bio,['class' => 'input']) }}
            <p>Bio : {{$loginUser->bio}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Icon Image : {{$loginUser->images}}</p>
        </div>
    </div>
{{ Form::submit('登録') }}
{!! Form::close() !!}
</div>

@endsection