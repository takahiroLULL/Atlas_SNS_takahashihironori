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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            <div class="atlas-zone">
        <a href="/top"><img src="{{ asset('images/atlas.png') }}" class="atlas-img"></a>
           </div>
            <div class="menu">
                    <input type="checkbox" id="menu_bar01"/>
                    <label for="menu_bar01">{{ Auth::user()->username }}さん<img src="{{  asset('/storage/images/' . Auth::user()->images) }}" class="user-icon">
                    </label>
                    
                    <!--Authの中のuserテーブルの中のusernameを取り出す-->
                    
                <ul id="links01">
                    <li><a href="/top"><span class="text-muted">HOME</span></a></li>
                    <li class="bg-primary"><a href="/profile"><span class="text-white">プロフィール編集
</span></a></li>
                    <li ><a href="/logout"><span class="text-muted">ログアウト</span></a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar" >
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
              
                <p>フォロー数     {{ Auth::user()->getFollowCount(Auth::user()->id) }}名</p>
                <!-- blade〜モデルでやりとり -->
                <!-- ログインしている::ユーザー()->modelのメソッド（フォローしている人の数）→id -->
                <div class="user-btn">
                <p class="side-btn"><div class="btn btn-primary btn-lg"><a href="/follow-list"><span class="text-white">フォローリスト</span></a></div></p>
              </div>
                
                <div>
                <p>フォロワー数   {{ Auth::user()->getFollowerCount(Auth::user()->id) }}名</p>
                </div>
                <div class="user-btn">
                <p class="side-btn"><div class="btn btn-primary btn-lg" ><a href="/follower-list"><span class="text-white">フォロワーリスト</span></a></div></p>
                </div>
            </div>
            <hr>
            <p><div class="btn btn-primary btn-lg" ><a href="/search"><span class="text-white">ユーザー検索</span></a></div></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>
