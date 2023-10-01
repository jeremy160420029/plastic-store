<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'image' => 'LLDPE INNOPLUS LL7410A.jpg',
            'name' => 'LLDPE INNOPLUS LL7410A',
            'description' => 'LLDPE INNOPLUS LL7410A',
            'price' => 3636000,
            'stock' => 100,
            'brands_id' => 1,
            'categories_id' => 1,
            'sub_categories_id' => 3,
            'sub_processes_id' => 20,
            'manufacturer' => 'PTT Global Chemical Group',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
