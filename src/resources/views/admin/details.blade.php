<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細情報</title>
    <link rel="stylesheet" href="{{ asset('css/admin.details.css') }}">
</head>

<body>
    <header>
        <h2>詳細情報</h2>
    </header>

    <main>
        <div class="detail-info">
            <h3>お名前: {{ $contact->last_name }} {{ $contact->first_name }}</h3>
            <p>性別: {{ $contact->gender == 1 ? '男性' : '女性' }}</p>
            <p>メールアドレス: {{ $contact->email }}</p>
            <p>電話番号: {{ $contact->tel }}</p>
            <p>住所: {{ $contact->address }}</p>
            <p>お問い合わせ内容: {{ $contact->detail }}</p>
            <p>お問い合わせ種類: {{ $contact->category->content }}</p>
            <p>日付: {{ $contact->created_at }}</p>
        </div>

        <!-- 削除ボタン -->
        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">削除</button>
        </form>

        <!-- モーダルウィンドウを閉じるボタン -->
        <button class="close-btn" onclick="window.history.back();">×</button>
    </main>

    <script>
        // モーダルウィンドウを閉じる機能（右上×ボタン）
        const closeModal = document.querySelector('.close-btn');
        closeModal.addEventListener('click', () => {
            window.history.back(); // 1つ前のページに戻る
        });
    </script>
</body>

</html>