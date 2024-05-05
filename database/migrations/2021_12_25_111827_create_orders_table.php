<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->integer('userId');
            $table->integer('peopleNumber');
            $table->date('organizationDate');
            $table->string('note');
            $table->integer('paymentId');
            $table->integer('status');
            $table->integer('serviceId');
            $table->integer('packageId');
            //references service table
            $table->foreign('serviceId')->references('id')->on('services')->onDelete('cascade');
            $table->index('serviceId');
            //references payment table
            $table->foreign('paymentId')->references('id')->on('payments')->onDelete('cascade');
            $table->index('paymentId');
            //references package table
            $table->foreign('packageId')->references('id')->on('packages')->onDelete('cascade');
            $table->index('packageId');
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
        Schema::dropIfExists('orders');
    }
}
