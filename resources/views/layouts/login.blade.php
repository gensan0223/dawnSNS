<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head" class="clearfix">
            <div class="float-start">
                <h1><a href="/top"><img src="/images/main_logo.png"></a></h1>
            </div>
            <div id="menu" class="float-end">
                <div id="menu_bar" class="my-3 mx-3">
                    <a class="btn btn-secondary dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $loginUser->username }}さん
                        <img class="rounded-circle px-5" src="/storage/images/icons/{{$loginUser->images}}">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('posts.top') }}">ホーム</a></li>
                        <li><a class="dropdown-item" href="{{ route('posts.selfProfile') }}">プロフィール</a></li>
                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm" class="row g-3">
                <p>{{ $loginUser->username }}さんの</p>
                <div class="row">
                    <div class="col">フォロー数</div>
                    <div class="col">{{ $followCount }}名</div>
                </div>
                <div class="row">
                    <p class="btn"><a class="btn btn-sm btn-primary col" href="{{ route('follows.followList') }}">フォローリスト</a></p>
                </div>
                <div class="row">
                    <div class="col">フォロワー数</div>
                    <div class="col">{{ $followerCount }}名</div>
                </div>
                <div class="row">
                    <p class="btn"><a class="btn btn-sm btn-primary col" href="{{ route('follows.followerList') }}">フォロワーリスト</a></p>
                </div>
            </div>
            <div class="row">
            <p class="btn"><a class="btn btn-primary" href="{{ route('users.search') }}">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>