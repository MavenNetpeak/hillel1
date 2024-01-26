<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            [
                'text'=>'he',
                'user_name'=>'Zane',
                'create_at'=>now(),
            ],
            [
                'text'=>'Hi',
                'user_name'=>'Finik',
                'create_at'=>now(),
            ]
        ]);
    }
}
