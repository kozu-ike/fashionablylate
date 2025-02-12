<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Category;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryIds = Category::pluck('id')->toArray();

        Contact::create([
            'last_name' => '田中',
            'first_name' => '太郎',
            'gender' => 1,
            'email' => 'tanaka@example.com',
            'tel' => '08012345678',
            'address' => '東京都渋谷区',
            'building' => '渋谷ビル',
            'detail' => 'delivery',
            'content' => '商品が届かない',
            'category_id' => $categoryIds[array_rand($categoryIds)], // ランダムにカテゴリーを設定
        ]);
    }
}
