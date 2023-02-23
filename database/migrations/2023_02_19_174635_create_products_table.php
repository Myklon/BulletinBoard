<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->string('short_description');
            $table->text('description');
            $table->decimal('price');
            $table->string('cover')->default('covers/default.png');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->softDeletes();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            $table->index('user_id', 'product_user_idx');
            $table->index('category_id', 'product_category_idx');

            $table->foreign('user_id', 'product_user_fk')->references('id')->on('users');
            $table->foreign('category_id', 'product_category_fk')->references('id')->on('categories');
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
};
