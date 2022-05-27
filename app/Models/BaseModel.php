<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditMethods;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model implements AuditMethods
{
    //basic
    use SoftDeletes;
    //auditing
    use Auditable;
    //helpers
    use ModelHelper;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $dates = ['deleted_at'];

    //atributos a serem auditados
    protected $auditInclude = [];

    //array com  o nome das funçoes que fazem relacionamento
    //e que representem tabelas que possuem como chave
    //estrangeira um id da tabela atual
    protected static $cascade_relations = [];

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

    //array de chave/valor com os atributos
    //da tabela e sua forma de pesquisa no banco
    protected $searchable = [];

    public function searchable()
    {
        return $this->searchable;
    }

    //atributos a serem salvos em uppercanse
    protected $itensUpperCase = [];

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

    public static function deleteRelations($model, $relations = [])
    {
        foreach ($relations as $relation) {
            $model->{$relation}()->delete();
        }
    }

    public static function restoreRelations($model, $relations = [])
    {
        foreach ($relations as $relation) {
            $model->{$relation}()->onlyTrashed()->restore();
        }
    }
}
