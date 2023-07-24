<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('products')->insert([
        'name' => 'Iphone',
        'image' => 'a.jpg',
        'mota' => 'aaaaaaaaaa',
        'gia' => '9'

     ]);
    }
}
