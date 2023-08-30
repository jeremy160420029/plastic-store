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
        DB::table('subcategories')->insert([
            'name' => 'HDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'LLDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'LDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'MLLDPE',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PP
        DB::table('subcategories')->insert([
            'name' => 'PP Homo',
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'PP Block Copo',
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'PP Random Copo',
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PS
        DB::table('subcategories')->insert([
            'name' => 'GPPS',
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'HIPS',
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'EPS',
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PET
        DB::table('subcategories')->insert([
            'name' => 'PET',
            'category_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PC
        DB::table('subcategories')->insert([
            'name' => 'PC',
            'category_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //ABS
        DB::table('subcategories')->insert([
            'name' => 'ABS',
            'category_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //EVA
        DB::table('subcategories')->insert([
            'name' => 'EVA',
            'category_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //NYLON
        DB::table('subcategories')->insert([
            'name' => 'PA 6',
            'category_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //PVC
        DB::table('subcategories')->insert([
            'name' => 'PVC Resin',
            'category_id' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //FILM
        DB::table('subcategories')->insert([
            'name' => 'BOPP',
            'category_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subcategories')->insert([
            'name' => 'BOPET',
            'category_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        DB::table('subcategories')->insert([
            'name' => 'BOPA',
            'category_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
