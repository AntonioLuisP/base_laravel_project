<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostType;

class PostTypeSeeder extends Seeder
{

    public function run()
    {
        PostType::create([
            'name' => 'Inovation',
            'description' => 'Lubbuck',
        ]);
    }
}
