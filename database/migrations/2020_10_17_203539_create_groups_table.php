<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->string('logo')->nullable()->default('group.png');
            $table->text('description')->nullable();
            $table->integer('score')->default(0);
            $table->string('adminName', 50)->nullable();
            $table->boolean('active')->default(true);
            $table->bigInteger('parent_id')->default(0);
           // $table->string('about', 20)->default('haymacproduction');
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
        Schema::dropIfExists('groups');
    }
}
