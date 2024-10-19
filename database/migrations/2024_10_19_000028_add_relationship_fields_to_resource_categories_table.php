<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToResourceCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('resource_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_10200124')->references('id')->on('users');
        });
    }
}
