<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.last_name'  => ['required', 'string', 'max:255'],
            'name.first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', 'in:1,2,3'],
            'email'           => ['required', 'email', 'max:255'],
            'tel.part1'       => ['required', 'digits_between:2,4'],
            'tel.part2'       => ['required', 'digits_between:3,4'],
            'tel.part3'       => ['required', 'digits_between:3,4'],
            'address'         => ['required', 'string', 'max:255'],
            'detail'          => ['required', 'string', 'max:120'],
            'content'         => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.last_name.required'  => '姓を入力してください',
            'name.first_name.required' => '名を入力してください',
            'gender.required'          => '性別を選択してください',
            'gender.in'                => '性別は「1:男性, 2:女性, 3:その他」から選択してください',
            'email.required'           => 'メールアドレスを入力してください',
            'email.email'              => 'メールアドレスはメール形式で入力してください',
            'tel.part1.required'       => '電話番号を入力してください',
            'tel.part1.digits_between' => '電話番号の最初の部分は2～4桁の数字で入力してください',
            'tel.part2.required'       => '電話番号を入力してください',
            'tel.part2.digits_between' => '電話番号の中央部分は3～4桁の数字で入力してください',
            'tel.part3.required'       => '電話番号を入力してください',
            'tel.part3.digits_between' => '電話番号の最後の部分は3～4桁の数字で入力してください',
            'address.required'         => '住所を入力してください',
            'detail.required'          => 'お問い合わせ内容を入力してください',
            'detail.max'               => 'お問い合わせ内容は120文字以内で入力してください',
            'content.required'         => 'お問い合わせ内容を入力してください',
            'content.max'              => 'お問い合わせ内容は255文字以内で入力してください',
        ];
    }
}
