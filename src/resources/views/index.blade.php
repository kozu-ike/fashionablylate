<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="header__logo">
            FashionablyLate
        </h1>
    </header>

    <main class="contact-form">
        <h2>Contact</h2>
        <form action="{{ route('confirm') }}" method="post">
            @csrf
            <div class="form__group">
                <span class="form__label">お名前</span>
                <span class="required">※</span>
                <div class="name-group">
                    @php $oldName = old('name', []); @endphp
                    <input type="text" name="name[last_name]" placeholder="例：山田"
                        value="{{ $oldName['last_name'] ?? '' }}" />
                    @error('name.last_name')
                    <div class="form__error">{{ $message }}</div>
                    @enderror

                    <input type="text" name="name[first_name]" placeholder="例：太郎"
                        value="{{ $oldName['first_name'] ?? '' }}" />
                    @error('name.first_name')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <span class="form__label">性別</span>
                <span class="required">※</span>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} />
                    <label for="male">男性</label>

                    <input type="radio" id="female" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} />
                    <label for="female">女性</label>

                    <input type="radio" id="other" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} />
                    <label for="other">その他</label>

                    @error('gender')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <span class="form__label">メールアドレス</span>
                <span class="required">※</span>
                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                @error('email')
                <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <span class="form__label">電話番号</span>
                <span class="required">※</span>
                <div class="phone-group">
                    @php $oldTel = old('tel', []); @endphp
                    <input type="tel" name="tel[part1]" pattern="\d{2,4}" placeholder="例: 080"
                        value="{{ $oldTel['part1'] ?? '' }}" required />
                    @error('tel.part1')
                    <div class="form__error">{{ $message }}</div>
                    @enderror

                    <span>-</span>

                    <input type="tel" name="tel[part2]" pattern="\d{3,4}" placeholder="例: 1234"
                        value="{{ $oldTel['part2'] ?? '' }}" required />
                    @error('tel.part2')
                    <div class="form__error">{{ $message }}</div>
                    @enderror

                    <span>-</span>

                    <input type="tel" name="tel[part3]" pattern="\d{3,4}" placeholder="例: 5678"
                        value="{{ $oldTel['part3'] ?? '' }}" required />
                    @error('tel.part3')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <span class="form__label">住所</span>
                <span class="required">※</span>
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                @error('address')
                <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <span class="form__label">建物名</span>
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101"
                    value="{{ old('building') ?? '' }}" />
            </div>

            <div class="form__group">
                <span class="form__label">お問い合わせの種類</span>
                <span class="required">※</span>
                <select name="detail">
                    <option value="" disabled {{ old('detail') ? '' : 'selected' }}>選択してください</option>
                    <option value="delivery" {{ old('detail') == 'delivery' ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="exchanges" {{ old('detail') == 'exchanges' ? 'selected' : '' }}>商品の交換について</option>
                    <option value="problems" {{ old('detail') == 'problems' ? 'selected' : '' }}>商品トラブル</option>
                    <option value="inquiries" {{ old('detail') == 'inquiries' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="other" {{ old('detail') == 'other' ? 'selected' : '' }}>その他</option>
                </select>
                @error('detail')
                <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <span class="form__label">お問い合わせ内容</span>
                <span class="required">※</span>
                <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content', '') }}</textarea>
                @error('content')
                <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__submit">
                <button type="submit">確認画面へ</button>
            </div>
        </form>
    </main>
</body>

</html>