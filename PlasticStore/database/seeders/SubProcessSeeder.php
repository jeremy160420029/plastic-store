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
        DB::table('subprocess')->insert([
            'name' => 'Film',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Injection',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Blow',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Monofilament',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Rotational Moulding',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Lamination',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Thermoforming',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Yarn',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Extrusion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'EPS Breads',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Bottle Grade',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Sheet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Pipe and Rigid',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Print Lamination',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Garment Bag',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Thermal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Adhesive Tape',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Tape',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('subprocess')->insert([
            'name' => 'Printing Lamination',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
