<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //try to follow the migratins order
        $this->call(UserSeeder::class);
        $this->call(PostTypeSeeder::class);
        $this->call(PostSeeder::class);
    }
}
