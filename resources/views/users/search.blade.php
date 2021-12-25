@extends('layouts.login')

@section('content')
<form class="row g-3">
    <div class="col-auto">
      <label for="searchUsername" class="visually-hidden">ユーザ名</label>
      <input class="form-control" id="searchUsername" placeholder="ユーザ名">
    </div>
    <div class="col-auto">
      <input type="image" src="images/search.png" alt="検索" class="">
    </div>
  </form>

  <div>
      
  </div>

@endsection