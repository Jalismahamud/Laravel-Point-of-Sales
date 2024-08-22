<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'electronics',
            'user_id' => 1
        ]);DB::table('categories')->insert([
            'name' => 'electronics',
            'user_id' => 1
        ]);DB::table('categories')->insert([
            'name' => 'electronics',
            'user_id' => 1
        ]);DB::table('categories')->insert([
            'name' => 'electronics',
            'user_id' => 1
        ]);

    }
}
