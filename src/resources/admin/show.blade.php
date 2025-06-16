<h2>お問い合わせ詳細</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <td>{{ $contact->id }}</td>
    </tr>
    <tr>
        <th>氏名</th>
        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>
            @if ($contact->gender == 1)
                男性
            @elseif ($contact->gender == 2)
                女性
            @else
                その他
            @endif
        </td>
    </tr>
    <tr>
        <th>メール</th>
        <td>{{ $contact->email }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{ $contact->tel }}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{ $contact->address }}</td>
    </tr>
    <tr>
        <th>建物名</th>
        <td>{{ $contact->building }}</td>
    </tr>
    <tr>
        <th>お問い合わせの種類</th>
        <td>{{ $contact->category->content ?? '未分類' }}</td>
    </tr>
    <tr>
        <th>お問い合わせ内容</th>
        <td>{{ $contact->detail }}</td>
    </tr>
    <tr>
        <th>送信日時</th>
        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
    </tr>
</table>

<p><a href="{{ route('admin.contacts.index') }}">← 一覧に戻る</a></p>

<form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
    @csrf
    @method('DELETE')
    <button type="submit">このお問い合わせを削除する</button>
</form>