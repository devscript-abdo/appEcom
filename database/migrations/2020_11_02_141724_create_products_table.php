<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->unique();
            $table->string('slug', 150)->unique();
            $table->string('photo')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('quantity')->default(0);
            $table->integer('price')->unsigned()->nullable();

            $table->boolean('active')->default(true);
            $table->boolean('inStock')->default(true);
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->bigInteger('moderator_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('products');
    }
}
