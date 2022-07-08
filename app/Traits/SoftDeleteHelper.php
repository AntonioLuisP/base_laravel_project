<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;

trait SoftDeleteHelper
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            static::deleteRelations($model, static::$cascade_relations);
        });

        static::restored(function ($model) {
            static::restoreRelations($model, static::$cascade_relations);
        });
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
