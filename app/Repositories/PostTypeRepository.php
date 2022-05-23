<?php

namespace App\Repositories;

use App\Models\PostType;

class PostTypeRepository extends BaseRepository
{
    public function __construct(PostType $model)
    {
        parent::__construct($model);
    }
}
