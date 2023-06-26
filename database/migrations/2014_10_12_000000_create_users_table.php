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
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('rol');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('rol')->references('id')->on('role');
        });

         Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('src_img');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('status');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('category');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('user_id');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('publication_id')->references('id')->on('publications');
        });

        Schema::create('save_publication', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('publication_id');
            $table->string('status')->default('saved');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('publication_id')->references('id')->on('publications');
        });

        Schema::create('complaint', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('description');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('reaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('publication_id');
            $table->string('type_reaction');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('publication_id')->references('id')->on('publications');
        });

        Schema::create('tag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('tag_publication', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('publication_id');
            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('tag');
            $table->foreign('publication_id')->references('id')->on('publications');
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('role');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('save_publication');
        Schema::dropIfExists('complaint');
        Schema::dropIfExists('reaction');
        Schema::dropIfExists('tag');
        Schema::dropIfExists('tag_publication');
        Schema::dropIfExists('category');
        
    }
};