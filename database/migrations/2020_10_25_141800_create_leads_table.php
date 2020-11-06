<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 80);
            $table->string('prenom', 80);
            $table->string('nomcomplet', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('tele', 20);
            $table->string('ville', 40);
            $table->string('address', 100);
            $table->string('source')->nullable();
            $table->string('addedby', '80')->nullable();
            $table->string('produit');
            $table->boolean('active')->default(true);
            $table->string('code')->unique()->nullable();
            $table->longText('description')->nullable();

            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->bigInteger('moderator_id')->unsigned()->nullable();
            $table->foreign('moderator_id')->references('id')->on('moderators');

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
        Schema::dropIfExists('leads');
    }
}
