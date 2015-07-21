<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailerDispatchesGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('mailer_dispatches_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->nullable()->unsigned()->index();
            $table->integer('dispatch_id')->nullable()->unsigned()->index();

            $table->foreign('group_id')->references('id')->on('mailer_groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dispatch_id')->references('id')->on('mailer_dispatches')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('mailer_dispatches_groups');
	}

}
