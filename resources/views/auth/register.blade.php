@extends('layouts.logout')

@section('content')
@if($errors->any())
    <div class="alert alert-warning alert-dismissable fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card bg-dark mx-auto bg-opacity-50 mt-5" style="width:18rem;">

    {!! Form::open() !!}
    <div class="card-body">
        <div class="text-center card-title py-3 fw-normal">
            新規ユーザー登録
        </div>

        <div class="mb-3">
            {{ Form::label('username','UserName',['class'=>'label form-label']) }}
            {{ Form::text('username',null,['class' => 'input form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('mail','MailAddress',['class'=>'label form-label']) }}
            {{ Form::text('mail',null,['class' => 'input form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('password', 'Password',['class'=>'label form-label']) }}
            {{ Form::password('password',['class' => 'input form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('password-confirm','Password Confirm',['class'=>'label form-label']) }}
            {{ Form::password('password_confirmation',['class' => 'input form-control']) }}
        </div>
        <div class="text-right">
            {{ Form::submit('REGISTER', ['class'=>'btn btn-primary']) }}
        </div>

            <p class="pt-5 text-center"><a href="/login" class="text-white text-decolation-none">ログイン画面へ戻る</a></p>

            {!! Form::close() !!}
    </div>
</div>


@endsection
