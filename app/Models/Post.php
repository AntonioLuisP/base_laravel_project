<?php

namespace App\Models;

use App\Traits\SoftDeleteHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends BaseModel
{
    use HasFactory, SoftDeleteHelper;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'id_post_theme',
        'id_user',
    ];

    protected $dates = ['deleted_at'];

    protected $itensUpperCase = [
    ];

    protected $searchable = [
        'title' => 'like',
        'subtitle' => 'like',
        'text' => 'like',
        'id_post_theme' => '=',
        'id_user' => '=',
    ];

    protected static $cascade_relations = [
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function theme()
    {
        return $this->belongsTo(PostTheme::class, 'id_post_theme');
    }
}
