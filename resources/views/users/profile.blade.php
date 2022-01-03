@extends('layouts.login')

@section('content')

<div class="container border-bottom py-4">
    <div class="row px-5 ">
        <div class="col-1" for="icon">
            <img class="rounded-circle" src="/images/icons/{{ $user->images }}" alt="">
        </div>
        <div class="col">
            <p>Name : {{$user->username}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Bio : {{$user->bio}}</p>
        </div>
          <div for="followButton" class="col">
            <form action="{{route('follows.follow')}}" method="post" >
            {{ csrf_field() }}
              <input type="hidden" name="userId" value="{{$user->id}}">
              @if($user->isFollowing($user->id)->isEmpty())
              <input type="submit" name="follow" class="btn btn-primary btn-sm" value="フォローする">
              @else
              <input type="submit" name="unfollow" class="btn btn-danger btn-sm" value="フォローをはずす">
              @endif
            </form>
            {{-- <a href="{{route('follows.follow')}}" class="btn btn-primary btn-sm" role="button">フォローする</a> --}}
          </div>
    </div>
</div>
@foreach($posts as $post)
<div class="container border-bottom py-2" for="postList">
    <div class="row mx-5" for="name-date">
        <div class="col-1" for="icon">
            <img class="rounded-circle" src="/images/icons/{{ $post->user->images }}" alt="">
        </div>
        <div class="col-1" for="username">
            {{ $user->username }}
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