<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('types')->insert([
                'name' => Str::random(10),
            ]);
        }
    }
}
