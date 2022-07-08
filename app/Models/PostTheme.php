<?php

namespace App\Models;

use App\Traits\SoftDeleteHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostTheme extends BaseModel
{
    use HasFactory, SoftDeleteHelper;

    protected $table = 'post_themes';

    protected $fillable = [
        'name',
    ];

    protected $dates = ['deleted_at'];

    protected $itensUpperCase = [
    ];

    protected $searchable = [
        'name' => 'like',
    ];

    protected static $cascade_relations = [
        'posts'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_post_theme');
    }
}
