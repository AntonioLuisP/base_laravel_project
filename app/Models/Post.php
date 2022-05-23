<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends BaseModel
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'id_post_type',
        'id_user',
    ];

    protected $itensUpperCase = [
    ];

    protected $searchable = [
        'title' => 'like',
        'subtitle' => 'like',
        'text' => 'like',
        'id_post_type' => '=',
        'id_user' => '=',
    ];

    protected static $cascade_relations = [
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function type()
    {
        return $this->belongsTo(PostType::class, 'id_post_type');
    }
}
