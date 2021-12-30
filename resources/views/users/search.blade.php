@extends('layouts.login')

@section('content')
<div class="container py-3">
  <form class="row g-3 align-items-center" action="{{ route('users.search') }}">
    {{ csrf_field() }}
    <div class="col-auto">
      <label for="searchUsername" class="visually-hidden">ユーザ名</label>
      <input class="form-control" id="searchUsername" placeholder="ユーザ名" name="search">
    </div>
    <div class="col-auto">
      <input type="image" src="images/search.png" alt="検索" class="">
    </div>
    @if(!empty($keyword))
    <div for="searchWord" class="col-auto">
      検索結果：{{ $keyword}}
    </div>
    @endif
  </form>
</div>
  <div>
      @foreach($users as $user)
        <div for="searchResult" class="row mt-5">
          <div class="col">
            <img src="" alt="">
          </div>
          <div for="username" class="col-6">
            <a href="/search">{{$user->username}}</a>
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
      @endforeach
  </div>

@endsection