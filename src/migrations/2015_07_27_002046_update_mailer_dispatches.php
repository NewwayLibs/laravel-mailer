<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMailerDispatches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('mailer_dispatches', function(Blueprint $table) {
            $table->string('subject');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('mailer_dispatches', function(Blueprint $table) {
            $table->dropColumn('subject');
        });
	}

}
