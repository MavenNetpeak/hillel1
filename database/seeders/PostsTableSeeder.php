<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Створюємо 10 постів
        for ($i = 1; $i <= 10; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1, 5), // Припускаючи, що у вас є 5 категорій
                'title' => 'Пост №' . $i,
                'content' => Str::random(200), // Випадковий текст
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
