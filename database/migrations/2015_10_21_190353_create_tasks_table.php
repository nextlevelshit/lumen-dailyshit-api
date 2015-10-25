<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->enum('repetition', ['daily', 'weekly', 'monthly'])
                  ->default('daily');
            $table->timestamps();
        });

        Schema::create('task_done', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->boolean('done')
                  ->default(true);
            $table->integer('task_id')->unsigned();
            $table->timestamps();

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
        Schema::drop('task_done');
    }
}
