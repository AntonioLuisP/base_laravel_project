<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use App\Traits\ModelHelper;
use App\Traits\SoftDeleteHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditMethods;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements AuditMethods
{
    //basic
    use HasApiTokens, HasFactory, Notifiable;
    //auditing
    use Auditable;
    //authorisation
    use HasRoles, HasPermissions;
    //helpers
    use ModelHelper, SoftDeleteHelper;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->primaryKey} = Uuid::uuid4();
        });
    }

    protected static $cascade_relations = [
        'posts',
    ];

    protected $fillable = [
        'name',
        'nickname',
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

    protected $dates = ['deleted_at'];

    protected $with = ['permissions', 'roles'];

    //atributos a serem auditados
    protected $auditInclude = [
        'name',
        'nickname',
        'email',
        'password',
    ];

    protected $searchable = [
        'name' => 'like',
        'email' => 'like',
    ];

    public function searchable()
    {
        return $this->searchable;
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('Super Administrador');
    }

    //atributos que devem ser salvos em uppercanse
    protected $itensUpperCase = [
    ];

    public static function create(array $attributes = [])
    {
        $attributes = parent::setUpperCaseItensModel($attributes);

        $model = new static($attributes);

        $model->save();

        return $model;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $attributes = $this->setUpperCaseItensModel($attributes);

        if (!$this->exists) {
            return false;
        }

        return $this->fill($attributes)->save($options);
    }

    //start rellations functions
    public function posts()
    {
        return $this->hasMany(Post::class, 'id_user');
    }
    //end rellations functions

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
