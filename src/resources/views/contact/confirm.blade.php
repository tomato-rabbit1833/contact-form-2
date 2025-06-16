<form action="{{ route('contact.submit') }}" method="POST">
    @csrf

    <p>名前：{{ $data['name'] }}</p>
    <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
    <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">

    <p>メール：{{ $data['email'] }}</p>
    <input type="hidden" name="email" value="{{ $data['email'] }}">

    <p>メッセージ：{{ $data['detail'] }}</p>
    <input type="hidden" name="detail" value="{{ $data['detail'] }}">

    <input type="hidden" name="gender" value="{{ $data['gender'] }}">
    <input type="hidden" name="tel" value="{{ $data['tel'] }}">
    <input type="hidden" name="address" value="{{ $data['address'] }}">
    <input type="hidden" name="building" value="{{ $data['building'] }}">
    <input type="hidden" name="category_id" value="{{ $data['category_id'] }}">

    <button type="submit">送信</button>
    <button type="button" onclick="history.back()">戻る</button>
</form>