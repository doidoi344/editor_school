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
        <!-- fullcalendar読み込み -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
        

        
    </head>
    <body>
        <header class="main-header">
            <div class="main-h-inner wrapper">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
                <nav class="navigation">
                    <div>
                        <form action="{{ route('logout') }}" method="POST">
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
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="ログアウト" class="s-nav-link">
                        </form>
                    </div>
                    @endauth
                </div>
            @endif
        </nav>
        <!-- サイドバー -->
        <div id="primary-container" class="wrapper">
            <aside>
                <div class="contents-title">
                    <h2 id="menu-title">メニュー</h2>
                </div>
                <div class="side-container">
                    <ul>
                        <li>
                            <a class="sidebar-link" href="{{ route('reservations.index') }}">予約履歴</a>
                        </li>
                        <li id="line">
                            <a class="sidebar-link" href="">講座一覧</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <section>
                <div class="contents-title">
                    <h2>カレンダー</h2>
                </div>
                <div class="calendar-container">
                    <div id="calendar"></div>
                </div>
            </section>
        </div>

        <!-- 予約フォーム -->
        <div id="reservationForm-overlay">
            <div class="reservationForm-container">
                <h3>予約フォーム</h3>
                <form id="reservationForm" action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="day">日付:</label>
                        <input type="text" id="day" name="day">
                    </div>

                    <div class="form-group">
                        <label for="reservation">講座選択:</label>
                        <select name="reservation" id="reservation">
                            <option value="カット">カット</option>
                            <option value="トリミング">トリミング</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_time">開始時刻:</label>
                        <input type="text" id="start_time" name="start_time">
                    </div>

                    <div class="form-group">
                        <label for="end_time">終了時刻:</label>
                        <input type="text" id="end_time" name="end_time">
                    </div>

                    <div class="form-group">
                        <button type="submit">予約する</button>
                    </div>
                </form>
            </div>
        </div>

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
        <script src="{{ asset('js/top.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>
    </body>
</html>
