@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('username','ユーザー名',['class'=>'label']) }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail','メールアドレス',['class'=>'label']) }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password', 'パスワード',['class'=>'label']) }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('password-confirm','パスワード確認',['class'=>'label']) }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
