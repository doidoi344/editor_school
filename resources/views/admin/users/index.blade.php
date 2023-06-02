<x-admins.app>
    <div id="secoundary-container" class="wrapper">
    <h1 class="users-list-title">受講生一覧</h1>
        <div class="users-list-container">
            <form action="{{ route('admin.users.destroy') }}" method="POST" id="deleteForm">
                @csrf
                <table class="users-list-table">
                    <thead>
                        <tr class="th-bg">
                            <th></th>
                            <th>ユーザー名</th>
                            <th>登録メールアドレス</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="delete-button-container">
                    <button type="submit" class="unregister-button">
                        <span class="material-symbols-outlined">delete</span>登録解除
                    </button>
                </div>
            </form>
        </div>
    </div> 
</x-admins.app>  
        