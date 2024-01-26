<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Створюємо 20 коментарів
        for ($i = 1; $i <= 20; $i++) {
            DB::table('comments')->insert([
                'post_id' => rand(1, 10), // Припускаючи, що у вас є 10 постів
                'content' => 'Коментар: ' . Str::random(100), // Випадковий текст
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
