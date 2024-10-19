<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTagResourcePivotTable extends Migration
{
    public function up()
    {
        Schema::create('content_tag_resource', function (Blueprint $table) {
            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id', 'resource_id_fk_10200212')->references('id')->on('resources')->onDelete('cascade');
            $table->unsignedBigInteger('content_tag_id');
            $table->foreign('content_tag_id', 'content_tag_id_fk_10200212')->references('id')->on('content_tags')->onDelete('cascade');
        });
    }
}
