<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_type')->insert([
            ['id' => 1, 'description' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'description' => 'User', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
