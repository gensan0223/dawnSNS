@extends('layouts.login')

@section('content')

<h2>Follow List</h2>
<div class="container border-bottom py-4">
    <div class="row px-5 ">
@foreach($follower as $follower)
        <div class="col-1" for="icon">
            <a href="{{route('users.profile', $follower->id)}}">
                <img class="rounded-circle" src="images/icons/{{ $follower->images }}" alt="">
            </a>
        </div>
@endforeach
    </div>
</div>

@foreach($followerPosts as $post)
<div class="container border-bottom py-2" for="postList">
    <div class="row mx-5" for="name-date">
        <a href="{{route('users.profile', $post->user_id)}}">
            <img class="rounded-circle" src="images/icons/{{ $post->user->images }}" alt="">
        </a>
        <div class="col-1" for="username">
            {{ $post->user->username }}
        </div>
        <div class="col-3" for="created_at">
            <p class="h6 text-muted">
            {{ $post->created_at }}
            </p>
        </div>
    </div>
    <div class="row mx-5">
        <div class="col my-4" for="post">
            {{ $post->posts }}
        </div>
    </div>
</div>
@endforeach

        
@endsection