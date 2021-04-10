<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('descripcion');
            $table->string('image');
            $table->string('extract');
            //declaramos nuestras llaves foraneas
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('category_id');
            // configurar llave foranea 
            $table->foreign('user_id')->reference('id')->on('users');
            $table->foreign('tag_id')->reference('id')->on('catogories');
            $table->foreign('category_id')->reference('id')->on('tags');
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
        Schema::dropIfExists('posts');
    }
}
