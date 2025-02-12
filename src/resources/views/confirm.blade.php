<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ内容確認</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="header__logo">FashionablyLate</h1>
    </header>

    <main class="confirm">
        <h2>Confirm</h2>
        <form class="form" action="{{ route('thanks') }}" method="post">
            @csrf
            <table class="confirm__table">
                <tr>
                    <th>お名前</th>
                    <td><input type="text" name="name" value="{{ old('name', $contact['name']) }}" readonly /></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <input type="text" name="gender"
                            value="{{ old('gender', $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他')) }}"
                            readonly />
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="email" name="email" value="{{ old('email', $contact['email']) }}" readonly /></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td><input type="text" name="tel" value="{{ old('tel', $contact['tel']) }}" readonly /></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td><input type="text" name="address" value="{{ old('address', $contact['address']) }}" readonly /></td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td><input type="text" name="building" value="{{ old('building', $contact['building'] ?? 'なし') }}" readonly /></td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td><input type="text" name="detail" value="{{ old('detail', $contact['detail']) }}" readonly /></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td><textarea name="content" readonly>{{ old('content', $contact['content']) }}</textarea></td>
                </tr>
            </table>

            <div class="confirm__buttons">
                <button type="submit">送信</button>
                <!-- 修正ボタンをフォームに戻るように変更 -->
                <a href="{{ route('index') }}" class="btn">修正</a>
            </div>
        </form>
    </main>
</body>

</html>