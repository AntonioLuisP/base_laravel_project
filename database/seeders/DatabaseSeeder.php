<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=> 'Antônio',
            'nickname'=> 'Lubbuck',
            'email'=> 'antonioluisp97@gmail.com',
            'password'=>  Hash::make('123456789'),
        ]);
    }
}
