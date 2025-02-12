<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param array<string, string> $input
     */
    public function update(User $user, array $input): void
    {
        // バリデーションルールの定義
        $validator = Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password'],
            'password' => $this->passwordRules(), // トレイト内のパスワードルール
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ]);

        // バリデーションエラーがあれば処理終了
        $validator->validate();

        // ユーザーのパスワード更新
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
