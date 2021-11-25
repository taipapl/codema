<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tickets')->truncate();
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table('tickets')->insert([
                'topic_id' => $faker->numberBetween(1, 3),
                'email' => $faker->email(),
                'text' => $faker->text(400),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}