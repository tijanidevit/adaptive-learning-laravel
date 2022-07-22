<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'fullname' => "Admin",
        //     'email' => "admin@cs.com",
        //     'image' => "default.jpg",
        //     'role' => 0,
        //     'password' => Hash::make("admin@cs.com"),
        // ]);
    }
}
