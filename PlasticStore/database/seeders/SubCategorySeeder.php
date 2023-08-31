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
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'LLDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'LDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'MLLDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PP
        DB::table('sub_categories')->insert([
            'name' => 'PP Homo',
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'PP Block Copo',
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'PP Random Copo',
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PS
        DB::table('sub_categories')->insert([
            'name' => 'GPPS',
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'HIPS',
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'EPS',
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PET
        DB::table('sub_categories')->insert([
            'name' => 'PET',
            'category_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PC
        DB::table('sub_categories')->insert([
            'name' => 'PC',
            'category_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //ABS
        DB::table('sub_categories')->insert([
            'name' => 'PA 6',
            'category_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //EVA
        DB::table('sub_categories')->insert([
            'name' => 'ABS',
            'category_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //NYLON
        DB::table('sub_categories')->insert([
            'name' => 'EVA',
            'category_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PVC
        DB::table('sub_categories')->insert([
            'name' => 'PVC Resin',
            'category_id' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //FILM
        DB::table('sub_categories')->insert([
            'name' => 'BOPP',
            'category_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'BOPET',
            'category_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        DB::table('sub_categories')->insert([
            'name' => 'BOPA',
            'category_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
