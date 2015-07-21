<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailerDispatchesClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('mailer_dispatches_clients', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->nullable()->unsigned()->index();
            $table->integer('dispatch_id')->nullable()->unsigned()->index();

            $table->foreign('client_id')->references('id')->on('mailer_clients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('mailer_dispatches_clients');
	}

}
