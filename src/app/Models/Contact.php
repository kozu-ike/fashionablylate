<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // データベースに保存できるカラムを指定
    protected $fillable = [
        'name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        'content',
    ];

    // 型変換
    protected $casts = [
        'gender' => 'integer',
    ];

    // 性別を日本語に変換するアクセサ
    public function getGenderTextAttribute()
    {
        $genderMap = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        return $genderMap[$this->gender] ?? '不明';
    }
}
