@extends('layouts.login')

@section('content')

<h2>User</h2>
<div class="container border-bottom py-4">
    <div class="row px-5 ">
        <div class="col-1" for="icon">
            <img class="rounded-circle" src="/images/icons/{{ $user->images }}" alt="">
        </div>
    </div>
</div>
@foreach($posts as $post)

{{ $post->posts}}

@endforeach

@endsection