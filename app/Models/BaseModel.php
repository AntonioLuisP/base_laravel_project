<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\ModelHelper;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{
    use SoftDeletes, ModelHelper;

    //array de chave/valor com os atributos
    //da tabela e sua forma de pesquisa no banco
    protected $searchable = [];

    //array com  o nome das funçoes que fazem relacionamento
    //e que representem tabelas que possuem como chave
    //estrangeira um id da tabela atual
    protected static $cascade_relations = [];

    protected $primaryKey = 'id';

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

    public function searchable()
    {
        return $this->searchable;
    }

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

    public function setUpperCaseItensModel($data)
    {
        if (is_null($this->itensUpperCase)) {
            return $data;
        }

        $itensUpperCase = $this->itensUpperCase;

        foreach ($itensUpperCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtoupper(mb_strtolower($data[$item]));
            }
        }

        return $data;
    }

    public function setLowerCaseItensModel($data)
    {
        if (is_null($this->itensLowerCase)) {
            return $data;
        }

        $itensLowerCase = $this->itensLowerCase;

        foreach ($itensLowerCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtolower(mb_strtoupper($data[$item]));
            }
        }

        return $data;
    }

    public static function deleteRelations ($model, $relations=[]){
        foreach ($relations as $relation) {
            $model->{$relation}()->delete();
        }
    }

    public static function restoreRelations ($model, $relations=[]){
        foreach ($relations as $relation) {
            $model->{$relation}()->onlyTrashed()->restore();
        }
    }
}
