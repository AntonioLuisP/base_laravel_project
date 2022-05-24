<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostTheme;

class PostThemeSeeder extends Seeder
{
    public function run()
    {
        PostTheme::create([
            'name' => 'Inovation',
        ]);
    }
}
