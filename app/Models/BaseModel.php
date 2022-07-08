<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditMethods;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model implements AuditMethods
{
    //auditing
    use Auditable;
    //helpers
    use ModelHelper;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    //atributos a serem auditados
    protected $auditInclude = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->primaryKey} = Uuid::uuid4();
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

}
