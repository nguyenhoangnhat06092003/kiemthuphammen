<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->decimal('price');
            $table->string('background');
            $table->string('detail');
            $table->integer('serviceId');
            $table->integer('menuId');
            //references services table
            $table->foreign('serviceId')->references('id')->on('services')->onDelete('cascade');
            $table->index('serviceId');
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
        Schema::dropIfExists('packages');
    }
}
