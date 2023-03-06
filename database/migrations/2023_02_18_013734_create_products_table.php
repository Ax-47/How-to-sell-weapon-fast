<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('users');
        Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name',255)->nullable();
                $table->string('description',1024)->nullable();
                $table->bigInteger('author')->nullable();
                $table->integer('stock')->nullable();
                $table->integer('price')->nullable();
                $table->timestamps();
            });
        Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name',255)->nullable();
                $table->string('password',255)->nullable();
                $table->string('profile',255)->nullable();
                $table->string('bio',255)->nullable();
                $table->integer('money')->default(0);
                $table->boolean('is_admin')->default(false);
                $table->string('remember_token',255)->nullable();
                $table->timestamps();
            });
        Schema::create('product_images', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->bigInteger('product')->nullable();
                $table->string('image',100);
            });
        Schema::create('comments', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->bigInteger('product')->nullable();
                $table->bigInteger('author')->nullable();
                $table->string('comment',512)->nullable();
                $table->integer('review')->default(0);
                $table->timestamps();
            });
        Schema::create('comment_images', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->bigInteger('comment')->unsigned();
                $table->string('image',100);
            });

        Schema::create('maket', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->bigInteger('author')->unsigned();
                $table->bigInteger('product')->unsigned();
                $table->integer('stock')->nullable();
                $table->integer('price')->nullable();
                $table->timestamps();
            });
        }
    
        
    
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('users');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('comment_images');
        Schema::dropIfExists('maket');
    }
};
