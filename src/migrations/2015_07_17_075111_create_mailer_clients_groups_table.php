<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailerClientsGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('mailer_clients_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->nullable()->unsigned()->index();
            $table->integer('group_id')->nullable()->unsigned()->index();

            $table->foreign('client_id')->references('id')->on('mailer_clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('mailer_groups')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('mailer_clients_groups');
    }

}
