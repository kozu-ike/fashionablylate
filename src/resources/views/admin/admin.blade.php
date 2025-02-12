<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header>
        <h2>Admin Panel</h2>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </header>

    <main>
        <form action="/admin/search" method="POST">
            @csrf
            <div class="filter-container">
                <input type="text" name="name_or_email" placeholder="名前またはメールアドレスで検索" value="{{ request('name_or_email') }}">
                <select name="gender">
                    <option value="性別">性別</option>
                    <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ old('gender') == '3' ? 'selected' : '' }}>その他</option>
                </select>
                <select name="detail">
                    <option value="お問い合わせの種類">お問い合わせの種類</option>
                    <option value="商品の交換について" {{ old('detail') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                    <option value="返品について" {{ old('detail') == '返品について' ? 'selected' : '' }}>返品について</option>
                    <option value="その他" {{ old('detail') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>
                <input type="date" name="date" value="{{ old('date') }}">
                <button type="submit" class="search">検索</button>
                <button type="reset" class="reset">リセット</button>
            </div>
        </form>

        <form action="/admin/export" method="POST">
            @csrf
            <button type="submit" class="export">エクスポート</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th>詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>{{ $contact->gender == 1 ? '男性' : '女性' }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->detail }}</td>
                    <td><a href="{{ route('admin.contacts.show', $contact->id) }}" class="detail">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </main>
</body>

</html>