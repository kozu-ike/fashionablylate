<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリのダミーデータを追加
        $this->call(CategoriesTableSeeder::class);

        // 35件のContactダミーデータを作成
        Contact::factory(35)->create();
    }
}
