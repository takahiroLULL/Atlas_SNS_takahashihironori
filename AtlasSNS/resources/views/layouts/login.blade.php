<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
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
        <div id = "head">
            <!--"/top"に戻るように     Atlasの画像を置く  画像を押せばtopに戻る記述-->
        <h1><a href="/top"><img src="images/atlas.png" ></a></h1> 
            <div class="menu">
                    <input type="checkbox" id="menu_bar01"/>
                    <label for="menu_bar01">{{ Auth::user()->username }}さん<img src="images/icon1.png">
                    </label>
                    <!--Authの中のuserテーブルの中のusernameを取り出す-->
                <ul id="links01">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{-- $posts->count() --}}名</p>
                </div>
                <p class="btn"><a href="follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{-- $posts->count() --}}名</p>
                </div>
                <p class="btn"><a href="follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><button type="button"><a href="/search">ユーザー検索</a></butoon></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>
