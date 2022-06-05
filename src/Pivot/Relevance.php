<?php

namespace Msr\LaravelRelevance\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int    id
 * @property int    user_id
 * @property string relevance_type
 * @property int    relevance_id
 * @property string relation_name
 */
class Relevance extends Pivot
{
    public $incrementing = true;

    public function getTable(): string
    {
        return config('relevance.database.relevance_table_name');
    }
}
