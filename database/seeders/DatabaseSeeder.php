<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Antônio',
            'nickname' => 'Lubbuck',
            'email' => 'antonioluisp97@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        Post::create([
            'title' => 'Nova newsletter do lubbuck',
            'subtitle' => 'Lubbuck lança nessa sexta uma nova newsletter',
            'text' => 'A nova newsletter do antonio se chama LubbLetters devido ao seu apelido Lubbuck. Na LubbLetters os usuários vão poder postar suas noticias e acompanhar as de outros usuários.',
            'id_user' => $user->id,
        ]);
    }
}
