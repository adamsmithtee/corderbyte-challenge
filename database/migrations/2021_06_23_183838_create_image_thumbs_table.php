<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageThumbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_thumbs', function (Blueprint $table) {
            $table->id();
            $table->string('image_thumbnail');
            $table->unsignedInteger('product_owner');
            $table->unsignedInteger('product_request_id');
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
        Schema::dropIfExists('image_thumbs');
    }
}
