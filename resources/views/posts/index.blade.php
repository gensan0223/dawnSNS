@extends('layouts.login')

@section('content')
<form class="row border-bottom pb-3 pt-3" method="post" action="{{ route('posts.store') }}">
    {{ csrf_field() }}
    <div class="col" for="postIcon">
        <img class="rounded-circle" src="images/dawn.png" alt="">
    </div>
    <div class="col-7" for="postContent">
        <textarea class="form-control border-0" name="post" id="post" placeholder="何をつぶやこうか…？"></textarea>
    </div>
    <div class="col" for="postButton">
        <input type="image" alt="送信" src="images/post.png">
    </div>
</form>


@foreach($loginUserPosts as $post)
<div class="row" for="postList">
    <div class="col" for="username">
        {{ $post->user->username }}
    </div>
    <div class="col" for="created_at">
        {{ $post->created_at }}
    </div>
</div>
<div class="row">
    <div class="col" for="post">
        {{ $post->posts }}
    </div>
</div>
<div class="row">
    <div class="col" for="edit">
        <input type="image" src="images/edit.png">
    </div>
    <div class="col" for="delete">
        <input type="image" src="images/trash.png">
    </div>
</div>
@endforeach

@endsection