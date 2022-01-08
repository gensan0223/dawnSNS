@extends('layouts.logout')

@section('content')
<p class="text-center py-5 fw-light fs-4">Social Network Service</p>

<div class="card bg-dark mx-auto bg-opacity-50" style="width:18rem;">
    {!! Form::open() !!}

    <div class="card-body">
        <div class="text-center card-title py-5 fw-normal">
            DAWNSNSへようこそ
        </div>

        <div class="mb-3">
            {{ Form::label('mail','MailAddress',['class'=>'form-label']) }}
            {{ Form::email('mail',null,['class' => 'input form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('password','Password',['class'=>'form-label']) }}
            {{ Form::password('password',['class' => 'input form-control']) }}
        </div>
        <div class="text-right">
            {{ Form::submit('LOGIN', ['class'=>'btn btn-primary']) }}
        </div>

            <p class="pt-5 text-center"><a href="/register" class="text-white text-decolation-none">新規ユーザーの方はこちら</a></p>

            {!! Form::close() !!}
    </div>
</div>


@endsection
