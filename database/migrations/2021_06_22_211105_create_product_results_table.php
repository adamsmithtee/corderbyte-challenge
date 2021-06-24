<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_results', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug_title');
            $table->unsignedInteger('product_request_id');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('product_owner');
            $table->string('image_thumbnail');
            $table->string('image');
            $table->tinyInteger('is_approve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_results');
    }
}
