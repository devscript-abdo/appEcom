<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email')->unique();
            $table->string('tele', 20)->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('avatar')->default('deliverie.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('city_id')->references('id')->on('cities')->nullable();
            $table->boolean('approved')->default(true);
            $table->string('addedBy', 50)->nullable();
            $table->enum('locale',['ar','fr','en'])->default('fr');
            $table->timestamps();
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
