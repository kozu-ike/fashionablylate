<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Contact;

class ContactsExport implements FromCollection, WithHeadings
{
    protected $contacts;

    // コンストラクタでエクスポートするデータを受け取る
    public function __construct($contacts)
    {
        $this->contacts = $contacts;
    }

    // エクスポートするデータのコレクションを返す
    public function collection()
    {
        return $this->contacts;
    }

    // Excel のヘッダー行を定義
    public function headings(): array
    {
        return [
            'お名前',
            '性別',
            'メールアドレス',
            'お問い合わせの種類',
            '作成日',
        ];
    }
}
