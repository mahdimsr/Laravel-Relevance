<?php

namespace Msr\LaravelRelevance\Pivot;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method whereRelationName(string $relationName)
 */
class Relevance extends Pivot
{
    public $incrementing = true;

    public function getTable(): string
    {
        return config('relevance.database.relevance_table_name');
    }

    /*********************** scope -- start ***********************/

    public function scopeWhereRelationName(Builder $query, string $relationName): Builder
    {
        return $query->where(config('relevance.database.relevance_relation_column_name', 'relationName'), $relationName);
    }

    public function scopeWhereModel(Builder $query, Model $model)
    {
        return $query->where(config('relevance.database.relevance_column_name', 'relevance') .'_type', get_class($model))
                     ->where(config('relevance.database.relevance_column_name', 'relevance').'_id', $model->getKey());
    }

    /*********************** scope -- end ***********************/
}
