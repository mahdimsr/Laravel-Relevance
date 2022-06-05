<?php

namespace Msr\LaravelRelevance\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Msr\LaravelRelevance\Pivot\Relevance;

/**
 * @method hasMany(string $class)
 */
trait CanDoRelevance
{
    public function relevance(): HasMany
    {
        return $this->hasMany(Relevance::class, config('relevance.database.relevance_user_foreign_key_column_name', 'user_id'));
    }

    public function createRelevance(string $relationName, Model $model): Model
    {
        return $this->relevance()->create([
            config('relevance.database.relevance_column_name', 'relevance').'_type' => get_class($model),
            config('relevance.database.relevance_column_name', 'relevance').'_id' => $model->getKey(),
            config('relevance.database.relevance_relation_column_name', 'relation_name') => $relationName,
        ]);
    }

    public function getRelevance(string $relationName, Model $model): Model|null
    {
        return $this->relevance()->whereRelationName($relationName)->whereModel($model)->first();
    }
}
