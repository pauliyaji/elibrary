<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->unsignedBigInteger('book_category_id')->nullable();
            $table->foreign('book_category_id', 'book_category_fk_10200213')->references('id')->on('book_categories');
            $table->unsignedBigInteger('resource_category_id')->nullable();
            $table->foreign('resource_category_id', 'resource_category_fk_10200214')->references('id')->on('resource_categories');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_10200218')->references('id')->on('users');
        });
    }
}
