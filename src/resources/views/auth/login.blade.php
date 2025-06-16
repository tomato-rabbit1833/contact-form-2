<h2>ログイン</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>メール：<input type="email" name="email" value="{{ old('email') }}"></label><br>
    <label>パスワード：<input type="password" name="password"></label><br>
    <button type="submit">ログイン</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $e)
            <li style="color:red">{{ $e }}</li>
        @endforeach
    </ul>
@endif

<p>アカウントがない方は <a href="{{ route('register.form') }}">ユーザー登録</a></p>