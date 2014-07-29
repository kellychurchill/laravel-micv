<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToPolicies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('policies', function($table) {
 			$table->foreign('policy_holder_id')->references('id')->on('policies');
 		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('policies', function($table) {
		$table->dropForeign('policy_holder_id');
	});
	}

}
