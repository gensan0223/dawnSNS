@extends('layouts.login')

@section('content')

<div class="container border-bottom py-4">
{!! Form::open(['route'=>'posts.getSelfProfile', 'files'=>true]) !!}
{{csrf_field()}}
    <div class="row px-5 ">
        <div class="col-1" for="icon">
            <img class="rounded-circle" src="/images/icons/{{ $loginUser->images }}" alt="">
        </div>
    </div>
    <div class="row mb-3">
            {{ Form::label('username','UserName',['class'=>'col-sm-2 col-form-label label']) }}
            {{-- {{ Form::text('username',null,['class' => 'input', 'placeholder' => 'a']) }} --}}
            <div class="col-sm-10">
                {{ Form::text('username',$loginUser->username,['class' => 'form-control input']) }}
            </div>
    </div>
    <div class="row mb-3">
            {{ Form::label('mail','MailAddress',['class'=>'col-sm-2 col-form-label label']) }}
            <div class="col-sm-10">
                {{ Form::text('mail',$loginUser->mail,['class' => 'form-control input']) }}
            </div>
    </div>
    <div class="row mb-3">
            {{ Form::label('password', 'Password',['class'=>'col-sm-2 col-form-label label']) }}
            <div class="col-sm-10">
                {{ Form::input('password', 'password',$loginUser->password, ['class'=>'form-control', 'readonly']) }}
                {{-- <p>Password : {{$loginUser->password}}</p> --}}
            </div>
    </div>
    <div class="row mb-3">
            {{ Form::label('newPassword','New Password',['class'=>'col-sm-2 col-form-label label']) }}
            <div class="col-sm-10">
                {{ Form::password('newPassword',['class' => 'form-control input']) }}
            </div>
    </div>
    <div class="row mb-3">
            {{ Form::label('bio','Bio',['class'=>'col-sm-2 col-form-label label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('bio',$loginUser->bio,['class' => 'form-control input', 'rows'=>3]) }}
            </div>
    </div>
    <div class="row mb-3">
            {{ Form::label('icon','icon',['class'=>'col-sm-2 col-form-label label']) }}
            <div class="col-sm-10">
                {{ Form::file('icon', ['class' => 'form-control input']) }}
            </div>
    </div>
{{ Form::submit('更新') }}
{!! Form::close() !!}
</div>

@endsection