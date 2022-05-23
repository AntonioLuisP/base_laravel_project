<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostType extends BaseModel
{
    use HasFactory;

    protected $table = 'post_types';

    protected $fillable = [
        'name',
        'description',

    ];

    protected $itensUpperCase = [
    ];

    protected $searchable = [
        'name' => 'like',
        'description' => 'like',

    ];

    protected static $cascade_relations = [
    ];
}
