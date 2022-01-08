@extends('layouts.login')

@section('content')

<form class="row border-bottom pb-3 pt-3" method="post" action="{{ route('posts.store') }}">
    {{ csrf_field() }}
    <div class="col" for="postIcon">
        <img class="rounded-circle px-5" src="/storage/images/icons/{{$loginUser->images}}" alt="">
    </div>
    <div class="col-7" for="postContent">
        <textarea class="form-control border-0" name="post" id="post" placeholder="何をつぶやこうか…？"></textarea>
    </div>
    <div class="col" for="postButton">
        <input type="image" alt="送信" src="/images/post.png">
    </div>
</form>

@foreach($followPosts as $post)
<div class="container border-bottom py-2" for="postList">
    <div class="row mx-5" for="name-date">
        <div class="col-1" for="icon">
            <img class="rounded-circle" src="/storage/images/icons/{{ $post->user->images }}" alt="">
        </div>
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
    @if($post->user_id == $loginUser->id)
    <div class="row justify-content-end">
        <div class="col-1" for="edit">
            <input type="image" src="/images/edit.png" data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                        {!! Form::open(['route'=>['posts.edit', $post->id]]) !!}
                        <div class="modal-body">
                            <div>
                                {{ Form::textarea('post',$post->posts,['class' => 'form-control input', 'rows'=>3]) }}
                            </div>
                        </div>
                        <div class="modal-footer">
                        <input type="image" src="/images/edit.png">
                        {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-1" for="delete">
            <form method="post" action="{{ route('posts.destroy', $post->id) }}" >
            {{ csrf_field() }}
            <input type="image" src="/images/trash.png" name="id" onclick='return confirm("削除しますか？");'>
            </form>
        </div>
    </div>
    @endif
</div>
@endforeach

@endsection