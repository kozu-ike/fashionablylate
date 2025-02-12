<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $genderMap = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $contact = [
            'name' => $request->input('name.last_name') . ' ' . $request->input('name.first_name'),
            'gender' => $genderMap[$request->input('gender')] ?? '',
            'email' => $request->input('email'),
            'tel' => $request->input('tel.part1') . '-' .
                $request->input('tel.part2') . '-' .
                $request->input('tel.part3'),
            'address' => $request->input('address'),
            'building' => $request->input('building') ?? 'なし',
            'detail' => $this->convertDetail($request->input('detail')),
            'content' => $request->input('content'),
        ];
        // dd($contact);
        return view('confirm', compact('contact'));
    }

    private function convertDetail($detail)
    {
        $details = [
            'delivery' => '商品のお届けについて',
            'exchanges' => '商品の交換について',
            'problems' => '商品トラブル',
            'inquiries' => 'ショップへのお問い合わせ',
            'other' => 'その他',
        ];

        return $details[$detail] ?? '選択されていません';
    }

    public function thanks(ContactRequest $request)
    {
        $validated = $request->validated();

        // nameをそのまま使用
        $contactData = [
            'name' => $validated['name'], // フルネームをそのまま使用
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'tel' => $validated['tel'], // 電話番号がそのまま1つの文字列で渡されていると仮定
            'address' => $validated['address'],
            'building' => $validated['building'] ?? 'なし',
            'detail' => $this->convertDetail($validated['detail']),
            'content' => $validated['content'],
        ];

        // データをデータベースに保存
        Contact::create($contactData);

        // サンキューページの表示
        return view('thanks');
    }
}