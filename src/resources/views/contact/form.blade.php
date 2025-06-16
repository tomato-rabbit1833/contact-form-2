<!-- resources/views/contact/form.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <h1>お問い合わせフォーム</h1>

    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf

        <div>
            <label>姓</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <div>
            <label>名</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required>
        </div>

        <div>
            <label>性別</label>
            <select name="gender" required>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>電話番号</label>
            <input type="text" name="tel" value="{{ old('tel') }}" required>
        </div>

        <div>
            <label>住所</label>
            <input type="text" name="address" value="{{ old('address') }}" required>
        </div>

        <div>
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building') }}">
        </div>

        <div>
            <label>お問い合わせの種類</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>お問い合わせ内容</label>
            <textarea name="detail" required>{{ old('detail') }}</textarea>
        </div>

        <button type="submit">確認画面へ</button>
    </form>
</body>
</html>