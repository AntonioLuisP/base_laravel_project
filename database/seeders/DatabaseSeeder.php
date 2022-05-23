<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user =  User::create([
            'name'=> 'Antônio',
            'nickname'=> 'Lubbuck',
            'email'=> 'antonioluisp97@gmail.com',
            'password'=>  Hash::make('123456789'),
        ]);
        PostType::create([
            'name'=> 'Inovation',
            'description'=> 'Lubbuck',
        ]);
        Post::create([
            'title'=> 'Novo projeto rodando',
            'subtitle'=> 'Lubbuck',
            'text'=> 'antonioluisp97@gmail.com',
            'id_user'=> $user->id,
        ]);
    }
}
