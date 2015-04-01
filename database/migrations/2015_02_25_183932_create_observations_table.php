<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('observations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('statu_id')->unsigned()->index();
            $table->foreign('statu_id')->references('id')->on('status')->onDelete('no action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('observations');
    }

}