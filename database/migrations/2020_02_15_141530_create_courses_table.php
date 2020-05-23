<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration {
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::create('courses', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('name');
         $table->integer('price');
         $table->string('short_desc');
         $table->text('desc')->nullable();
         $table->string('img')->nullable();
         $table->unsignedBigInteger('cat_id');
         $table->foreign('cat_id')->references('id')->on('cats');
         $table->unsignedBigInteger('trainer_id');
         $table->foreign('trainer_id')->references('id')->on('trainers');
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::dropIfExists('courses');
   }
}
