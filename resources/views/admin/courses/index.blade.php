<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <h2 class="soft-title">講座一覧</h2>
        <div class="cources-container">
            <div class="item">
                <img src="{{ asset('images/basic.png') }}" alt="">
                <h3>基礎編集技術</h3>
                <p>動画編集の基本操作やタイムラインの使い方を学びます。クリップの追加や削除、シーンの切り替え、基本的なトリミングなどを扱います。</p>
                <p class="lesson-time"><span>授業時間：60分</span></p>
                <div class="edit-btn-box">
                    <a href="{{ route('admin.courses.edit', ['id' => 1]) }}" class="edit-button">
                        <span class="material-symbols-outlined">edit_document</span>編集
                    </a>
                    <a href="" class="destroy-button">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/trimming.png') }}" alt="">
                <h3>切り取り・トリミング技術</h3>
                <p>動画の不要な部分を切り取ったり、トリミングして必要なシーンだけを抽出します。正確なカットの方法やショートカットの活用などを学びます。</p>
                <p class="lesson-time"><span>授業時間：60分</span></p>
                <div class="edit-btn-box">
                    <a href="" class="edit-button">
                        <span class="material-symbols-outlined">edit_document</span>編集
                    </a>
                    <a href="" class="destroy-button">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/insert.png') }}" alt="">
                <h3>テキスト・タイトルの追加</h3>
                <p>動画にテキストやタイトルを追加する方法を学びます。フォントやスタイルの選択、アニメーション効果の設定などを通じて見栄えの良いテキスト表示を実現します。</p>
                <p class="lesson-time"><span>授業時間：60分</span></p>
                <div class="edit-btn-box">
                    <a href="" class="edit-button">
                        <span class="material-symbols-outlined">edit_document</span>編集
                    </a>
                    <a href="" class="destroy-button">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/audio.png') }}" alt="">
                <h3>音声調整</h3>
                <p>動画の音声を編集し、クリアな音声やバックグラウンドミュージックの追加などを行います。音声トラックの操作やノイズ除去、ボリューム調整などを学びます。</p>
                <p class="lesson-time"><span>授業時間：60分</span></p>
                <div class="edit-btn-box">
                    <a href="" class="edit-button">
                        <span class="material-symbols-outlined">edit_document</span>編集
                    </a>
                    <a href="" class="destroy-button">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/basic.png') }}" alt="">
                <h3>基礎編集技術</h3>
                <p>動画編集の基本操作やタイムラインの使い方を学びます。クリップの追加や削除、シーンの切り替え、基本的なトリミングなどを扱います。</p>
                <p class="lesson-time"><span>授業時間：60分</span></p>
                <div class="edit-btn-box">
                    <a href="" class="edit-button">
                        <span class="material-symbols-outlined">edit_document</span>編集
                    </a>
                    <a href="" class="destroy-button">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/insert.png') }}" alt="">
                <h3>テキスト・タイトルの追加</h3>
                <p>動画にテキストやタイトルを追加する方法を学びます。フォントやスタイルの選択、アニメーション効果の設定などを通じて見栄えの良いテキスト表示を実現します。</p>
                <p class="lesson-time"><span>授業時間：60分</span></p>
                <div class="edit-btn-box">
                    <a href="" class="edit-button">
                        <span class="material-symbols-outlined">edit_document</span>編集
                    </a>
                    <a href="" class="destroy-button">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
            </div>
            <div class="add-item">
                <a href="{{ route('admin.courses.create') }}" class="add-item-button">
                    <span class="material-symbols-outlined">add_to_photos</span>
                </a>
            </div>
        </div>
    </div>        
</x-admins.app>  
        