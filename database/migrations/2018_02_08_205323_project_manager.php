<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_project', function($table) {
            $table->increments('id');
            $table->integer('manager_id')->unsigned();
            $table->integer('project_id')->unsigned();
        });

        Schema::table('manager_project', function($table) {
            $table->foreign('manager_id')->references('id')->on('projects');
            $table->foreign('project_id')->references('id')->on('managers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
