<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_processes')->insert([
            'name' => 'Film',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Injection',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Blow',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Monofilament',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Rotational Moulding',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Lamination',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Thermoforming',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Yarn',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Extrusion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'EPS Breads',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Bottle Grade',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Sheet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Pipe and Rigid',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Print Lamination',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Garment Bag',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Thermal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Adhesive Tape',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Tape',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Printing Lamination',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sub_processes')->insert([
            'name' => 'Blown Film',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
