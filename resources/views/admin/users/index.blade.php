<x-admins.app>
    <div id="secoundary-container" class="wrapper">
    <h1 class="users-list-title">受講生一覧</h1>
        <div class="users-list-container">
            <form action="" method="POST" id="deleteForm">
                @csrf
                <table class="users-list-table">
                    <thead>
                        <tr class="th-bg">
                            <th></th>
                            <th>ユーザー名</th>
                            <th>登録メールアドレス</th>
                            <th>年齢</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="1"></td>
                            <td>山田太郎</td>
                            <td>text1@text.com</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="2"></td>
                            <td>山田太郎</td>
                            <td>text1@text.com</td>
                            <td>26</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="3"></td>
                            <td>山田太郎</td>
                            <td>text1@text.com</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="4"></td>
                            <td>山田太郎</td>
                            <td>text1@text.com</td>
                            <td>19</td>
                        </tr>
                    </tbody>
                </table>
                <div class="delete-button-container">
                    <button type="submit" class="delete-button">
                        <span class="material-symbols-outlined">delete</span>登録解除
                    </button>
                </div>
            </form>
        </div>
    </div> 
</x-admins.app>  
        