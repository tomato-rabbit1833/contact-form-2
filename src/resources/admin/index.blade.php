<h2>お問い合わせ一覧</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>メール</th>
            <th>カテゴリ</th>
            <th>送信日時</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content ?? '未分類' }}</td>
            <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
            <td><a href="{{ route('admin.contacts.show', $contact->id) }}">表示</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links() }}