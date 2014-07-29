<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolicyHoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy_holders', function(Blueprint $table)
		{
			$table->integer('id')->index('`policy_holders_id`');
			$table->string('status', 20)->nullable();
			$table->string('street_address', 80)->nullable();
			$table->string('street_addres_2', 80)->nullable();
			$table->string('city', 120)->nullable();
			$table->string('state', 2)->nullable();
			$table->string('postal_code', 5)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('policy_holders');
	}

}
