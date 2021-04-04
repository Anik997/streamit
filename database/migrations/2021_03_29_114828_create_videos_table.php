<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('language_id');
            $table->string('trailler')->nullable();
            $table->string('vedio_link')->nullable();
            $table->string('slug')->unique();
            $table->enum('vedio_type',['Movies','TV Shows']);
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('quality');
            $table->string('release_year')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video');
            $table->enum('type',['Regular','Threanding','Upcomming']);
            $table->string('duration');
            $table->text('description');
            $table->integer('view')->default('1');
            $table->tinyInteger('status')->default('1')->comment('1=active,2=deactive');
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
        Schema::dropIfExists('videos');
    }
}
