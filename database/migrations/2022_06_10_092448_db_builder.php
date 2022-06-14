<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbBuilder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('status', 20);
            $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories');
            $table->foreignId('tag_id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->contrained('tags');
            $table->foreignId('ingredient_id')
                    ->contrained('ingredients');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('discription');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 12);
            $table->timestamps();
        });
        Schema::create('category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('locale')->index();
            $table->string('title');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 12);
            $table->timestamps();
        });
        Schema::create('tag_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id');
            $table->string('locale')->index();
            $table->string('title');
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 12);
            $table->timestamps();
        });
        Schema::create('ingredient_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredient_id');
            $table->string('locale')->index();
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('meal_translations');
        Schema::dropIfExists('category_translations');
        Schema::dropIfExists('tag_translations');
        Schema::dropIfExists('ingredient_translations');
    }
}
