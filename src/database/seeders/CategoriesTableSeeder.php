<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['content' => 'ご意見', 'created_at' => now(), 'updated_at' => now()],
            ['content' => 'お問い合わせ', 'created_at' => now(), 'updated_at' => now()],
            ['content' => '資料請求', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}