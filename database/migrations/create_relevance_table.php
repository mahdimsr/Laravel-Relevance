<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create(config('relevance.database.relevance_table_name', 'relevance_table'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(config('relevance.database.relevance_user_foreign_key_column_name', 'user_id'));
            $table->morphs(config('relevance.database.relevance_column_name', 'relevance'));
            $table->string(config('relevance.database.relevance_relation_column_name', 'relation_name'));
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
