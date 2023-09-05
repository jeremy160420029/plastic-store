<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PE
        DB::table('sub_categories')->insert([
            'name' => 'HDPE',
            'categories_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'LLDPE',
            'categories_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'LDPE',
            'categories_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'MLLDPE',
            'categories_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PP
        DB::table('sub_categories')->insert([
            'name' => 'PP Homo',
            'categories_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'PP Block Copo',
            'categories_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'PP Random Copo',
            'categories_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PS
        DB::table('sub_categories')->insert([
            'name' => 'GPPS',
            'categories_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'HIPS',
            'categories_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'EPS',
            'categories_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PET
        DB::table('sub_categories')->insert([
            'name' => 'PET',
            'categories_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PC
        DB::table('sub_categories')->insert([
            'name' => 'PC',
            'categories_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //ABS
        DB::table('sub_categories')->insert([
            'name' => 'PA 6',
            'categories_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //EVA
        DB::table('sub_categories')->insert([
            'name' => 'ABS',
            'categories_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //NYLON
        DB::table('sub_categories')->insert([
            'name' => 'EVA',
            'categories_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PVC
        DB::table('sub_categories')->insert([
            'name' => 'PVC Resin',
            'categories_id' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //FILM
        DB::table('sub_categories')->insert([
            'name' => 'BOPP',
            'categories_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'BOPET',
            'categories_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        DB::table('sub_categories')->insert([
            'name' => 'BOPA',
            'categories_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
