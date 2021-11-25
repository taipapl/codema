<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->truncate();

        DB::table('topics')->insert([
            ['id' => 1, 'name' => 'Temat nr 1'],
            ['id' => 2, 'name' => 'Temat nr 2'],
            ['id' => 3, 'name' => 'Temat nr 3'],
        ]);
    }
}