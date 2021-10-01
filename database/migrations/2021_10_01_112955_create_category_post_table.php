<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            if (Schema::hasTable('posts')){
                $table->foreignId('post_id')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
            }

            if (Schema::hasTable('categories')){
                $table->foreignId('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
