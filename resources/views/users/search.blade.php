@extends('layouts.login')

@section('content')
<div class="container py-3">
  <form class="row g-3 align-items-center" action="{{ route('users.search') }}" name="search">
    <div class="col-auto">
      <label for="searchUsername" class="visually-hidden">ユーザ名</label>
      <input class="form-control" id="searchUsername" placeholder="ユーザ名">
    </div>
    <div class="col-auto">
      <input type="image" src="images/search.png" alt="検索" class="">
    </div>
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
            <a href="" class="btn btn-primary btn-sm" role="button">フォローする</a>
          </div>
        </div>
      @endforeach
  </div>

@endsection