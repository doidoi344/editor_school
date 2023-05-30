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
        <!-- googleアイコン読み込み -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <!-- jqueryCDN読み込み -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        
    </head>
    <body>
        <header class="main-header">
            <div class="main-h-inner wrapper">
                <div class="logo">
                    <a href="{{ route('admin.main') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                </div>
                <nav class="navigation">
                    <div>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="ログアウト" class="logout-button">
                        </form>
                    </div>
                </nav>
                <!-- ハンバーガーメニューバー -->
                <div class="hamburger-menu">
                    <div class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>
        <!-- スマホ版メニュー -->
        <nav class="hamburger-navigation">
            @if (Route::has('login'))
                <div class="hamburger-links">
                    @auth
                    <div>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="ログアウト" class="s-nav-link">
                        </form>
                    </div>
                    @endauth
                </div>
            @endif
        </nav>
            {{ $slot }}
            <footer class="main-footer">
            <div class="footer-inner wrapper">
                <div class="footer-info">
                    <h3 class="footer-sub-title"><span>会社情報</span></h3>
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </div>
                    <p>会社名:Editor School株式会社</p>
                    <p>住所:〒123-4567 東京都〇〇区〇〇〇</p>
                    <p>TEL:0120-〇〇〇〇-〇〇〇〇</p>
                </div>
                <div class="business-info">
                    <h3 class="footer-sub-title"><span>営業日時のお知らせ</span></h3>
                    <table class="footer-business-hours">
                        <tr>
                            <th>営業時間</th>
                            <th>月曜日</th>
                            <th>火曜日</th>
                            <th>水曜日</th>
                            <th>木曜日</th>
                            <th>金曜日</th>
                            <th>土曜日</th>
                            <th>日曜日</th>
                            <th>祝・祭日</th>
                        </tr>
                        <tr>
                            <td>9:00 - 18:00</td>
                            <td>営業</td>
                            <td>営業</td>
                            <td>営業</td>
                            <td>営業</td>
                            <td>営業</td>
                            <td>休業</td>
                            <td>休業</td>
                            <td>休業</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2023 Editor School. All rights reserved.</p>
            </div>
        </footer>
        <!-- js読み込み -->
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/top.js') }}"></script>
    </body>
</html>
