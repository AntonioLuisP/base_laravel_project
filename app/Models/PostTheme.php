<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostTheme extends BaseModel
{
    use HasFactory;

    protected $table = 'post_themes';

    protected $fillable = [
        'name',
    ];

    protected $itensUpperCase = [
    ];

    protected $searchable = [
        'name' => 'like',
    ];

    protected static $cascade_relations = [
    ];
}
