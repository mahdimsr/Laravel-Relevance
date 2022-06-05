<?php

namespace Msr\LaravelRelevance\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Relevance extends Pivot
{
    public $incrementing = true;

    public function getTable(): string
    {
        return config('relevance.database.relevance_table_name');
    }
}
