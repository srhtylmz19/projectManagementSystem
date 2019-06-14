<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('project_title');
            $table->text('description')->nullable();
            $table->boolean('is_done')->default(false);
            $table->bigInteger('user_id')->unsigned();
            $table->date('deadline')->nullable();
            $table->float('cost')->default(0);
            $table->integer('percentage')->default(0);
            $table->timestamps();
        });

        Schema::table('projects',function (Blueprint $table){
           $table->foreign('user_id')->references('id')->on('users');
        });
    }
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
