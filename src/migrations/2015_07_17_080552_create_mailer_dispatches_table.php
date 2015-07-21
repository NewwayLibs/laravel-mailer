<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailerDispatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('mailer_dispatches', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->unsigned();
            $table->integer('template_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('content');
            $table->string('description');
            $table->string('type');

            $table->foreign('template_id')->references('id')->on('mailer_templates')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('mailer_dispatches');
    }

}
