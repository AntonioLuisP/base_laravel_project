<?php

namespace App\Repositories;

use App\Models\PostTheme;

class PostThemeRepository extends BaseRepository
{
    public function __construct(PostTheme $model)
    {
        parent::__construct($model);
    }
}
