<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasuries', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->string('banque',30)->nullable();
            $table->string('code_delivery')->nullable();
            $table->string('client')->nullable();
            $table->bigInteger('total');

            $table->enum('type',['recipes','depenses'])->default('recipes');
            $table->longText('designation');

            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->bigInteger('delivery_id')->unsigned()->nullable();
            $table->bigInteger('command_id')->unsigned()->nullable();

            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('command_id')->references('id')->on('commands');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('treasuries');
    }
}
