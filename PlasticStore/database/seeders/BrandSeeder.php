<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'image' => 'innoplus.png',
            'name' => 'INNOPLUS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('brands')->insert([
            'image' => 'gettel.jpeg',
            'name' => 'Gettel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('brands')->insert([
            'image' => 'bm.png',
            'name' => 'BM',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('brands')->insert([
            'image' => 'billion.png',
            'name' => 'Billion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('brands')->insert([
            'image' => 'polimaxx.jpg',
            'name' => 'Polimaxx',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
