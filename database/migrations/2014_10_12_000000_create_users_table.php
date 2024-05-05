<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('fullName');
            $table->string('phone');
            $table->string('dob');
            $table->integer('houseNumber');
            $table->string('street');
            $table->integer('villageId');
            $table->integer('roleId');
            $table->string('avatarUrl');
            $table->string('provider');
            $table->string('provider_id');
            //references orders table
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->index('userId');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
