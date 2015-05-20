<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('staff_id')->nullable()->unsigned()->index();
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('no action');
            $table->integer('busines_id')->nullable()->unsigned()->index();
            $table->foreign('busines_id')->references('id')->on('business')->onDelete('no action');
            $table->integer('type_user_id')->unsigned()->index();
            $table->foreign('type_user_id')->references('id')->on('type_users')->onDelete('no action');
            $table->engine = 'InnoDB';
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
