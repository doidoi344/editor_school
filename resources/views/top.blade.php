<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Top</title>
        <!-- リセットcss -->
        <link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
        <!-- レスポンシブ対応 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />
        <!-- css読み込み -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <!-- jqueryCDN読み込み -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>
    <body>
        <div id="big-bg">
            <header class="header">
                <div class="h-inner wrapper">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </div>
                    <nav class="navigation">
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <a href="{{ url('/main') }}" class="nav-link">予約画面へ</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">ログイン</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link">新規登録</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    </nav>
                    <div class="hamburger-menu">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </header>
            <nav class="hamburger-navigation">
                @if (Route::has('login'))
                    <div class="hamburger-links">
                        @auth
                            <a href="{{ url('/main') }}" class="s-nav-link">予約画面へ</a>
                        @else
                            <a href="{{ route('login') }}" class="s-nav-link">ログイン</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="s-nav-link">新規登録</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
            <div id="text-container">
                <h1>Editor School<br>講座予約システム</h1>
            </div>
        </div>
        <!-- js読み込み -->
        <script src="{{ asset('js/top.js') }}" defer></script>
    </body>
</html>
