<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_criterias', function (Blueprint $table) {
            $table->integer('packageId');
            $table->integer('criteriaId');
            //references package table
            $table->foreign('packageId')->references('id')->on('packages')->onDelete('cascade');
            $table->index('packageId');
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
        Schema::dropIfExists('package_criterias');
    }
}
