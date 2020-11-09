<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->string('command_number')->unique();
            $table->unsignedInteger('command_quantity');
            $table->string('product');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->boolean('payment_status')->default(1);
            $table->string('payment_method')->nullable();
            $table->string('code')->unique()->nullable();
            $table->longText('notes')->nullable();

            $table->string('nom', 80);
            $table->string('prenom', 80);
            $table->string('nomcomplet', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('tele', 20);
            $table->string('ville', 40);
            $table->string('address', 100);

            $table->bigInteger('lead_id')->unsigned()->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->bigInteger('moderator_id')->unsigned()->nullable();
            $table->bigInteger('delivery_id')->unsigned()->nullable();
            $table->foreign('lead_id')->references('id')->on('leads');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('moderator_id')->references('id')->on('moderators');
            $table->foreign('delivery_id')->references('id')->on('moderators');

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
        Schema::dropIfExists('commands');
    }
}
