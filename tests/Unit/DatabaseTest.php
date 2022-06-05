<?php

it('check relevance table exists', function () {
    $this->assertDatabaseCount(config('relevance.database.relevance_table_name'), 0);
});

it('insert basic relevance record', function () {
    $model = \Msr\LaravelRelevance\Pivot\Relevance::query()->create([
        'user_id' => 1,
        config('relevance.database.relevance_column_name') .'_type' => 'testRecord',
        config('relevance.database.relevance_column_name') .'_id' => 1,
        config('relevance.database.relevance_relation_column_name') => 'testRelation',
    ]);

    $this->assertModelExists($model);
});
