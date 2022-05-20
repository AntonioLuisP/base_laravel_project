<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ModelHelper;

    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->primaryKey} = Uuid::uuid4();
        });

        static::deleting(function ($model) {
            static::deleteRelations($model, static::$cascade_relations);
        });

        static::restored(function ($model) {
            static::restoreRelations($model, static::$cascade_relations);
        });
    }

    protected static $cascade_relations = [];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $searchable = [
        'name' => 'like',
        'email' => 'like',
    ];

    public function searchable()
    {
        return $this->searchable;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public static function deleteRelations($model, $relations = [])
    {
        foreach ($relations as $relation) {
            $model->{$relation}()->delete();
        }
    }

    public static function restoreRelations($model, $relations = [])
    {
        foreach ($relations as $relation) {
            $model->{$relation}()->withTrashed()->restore();
        }
    }
}
