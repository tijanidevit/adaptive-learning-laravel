<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['level' => "ND 1"]);
        Level::create(['level' => "ND 2"]);
        Level::create(['level' => "HND 1"]);
        Level::create(['level' => "HND 2"]);
    }
}
