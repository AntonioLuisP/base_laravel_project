<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTheme;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{

    public function run()
    {
        $user = User::where('created_at', '!=', null)->select('id')->first();
        $post = PostTheme::where('created_at', '!=', null)->select('id')->first();
        Post::create([
            'title' => 'Novo projeto rodando',
            'subtitle' => 'Lubbuck',
            'text' => 'antonioluisp97@gmail.com',
            'id_user' => $user->id,
            'id_post_theme' => $post->id,
        ]);
        Post::create([
            'title' => 'Nova newsletter do lubbuck',
            'subtitle' => 'Lubbuck lança nessa sexta uma nova newsletter',
            'text' => 'A nova newsletter do antonio se chama LubbLetters devido ao seu apelido Lubbuck. Na LubbLetters os usuários vão poder postar suas noticias e acompanhar as de outros usuários.',
            'id_user' => $user->id,
            'id_post_theme' => $post->id,
        ]);
    }
}
