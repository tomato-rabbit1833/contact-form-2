{{-- resources/views/auth/register.blade.php --}}

<h2>ユーザー登録</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label>名前：<input type="text" name="name" value="{{ old('name') }}"></label><br>
    <label>メール：<input type="email" name="email" value="{{ old('email') }}"></label><br>
    <label>パスワード：<input type="password" name="password"></label><br>
    <label>確認用パスワード：<input type="password" name="password_confirmation"></label><br>
    <button type="submit">登録</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $e)
            <li style="color:red">{{ $e }}</li>
        @endforeach
    </ul>
@endif

<p>すでにアカウントをお持ちの方は <a href="{{ route('login.form') }}">ログイン</a></p>