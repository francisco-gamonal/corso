<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataCompaniesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('data_companies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('bar')->nullable();
            $table->string('code')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('phone')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('comment')->nullable();
            $table->date('date_delivered')->nullable();
            $table->date('date_received')->nullable();
            $table->string('amount')->nullable();
            $table->string('address')->nullable();
            $table->string('comment_town')->nullable();
            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('citys')->onDelete('no action');
            $table->integer('observation_id')->unsigned()->nullable()->index();
            $table->foreign('observation_id')->references('id')->on('observations')->onDelete('no action');
            $table->integer('record_id')->unsigned()->index();
            $table->foreign('record_id')->references('id')->on('record')->onDelete('cascade');
            $table->integer('staff_id')->unsigned()->nullable()->index();
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('no action');
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
        Schema::drop('data_companies');
    }

}
