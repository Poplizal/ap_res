<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            'name' => "table1",
        ]);
        DB::table('tables')->insert([
            'name' => "table2",
        ]);
        DB::table('tables')->insert([
            'name' => "table3",
        ]);
        DB::table('tables')->insert([
            'name' => "table4",
        ]);
        DB::table('tables')->insert([
            'name' => "table5",
        ]);
    }
}
