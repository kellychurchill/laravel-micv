<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policies', function(Blueprint $table)
		{
			$table->integer('id')->index('`policies_id`');
			$table->integer('policy_holder_id')->nullable();
			$table->string('policyNumber', 40)->nullable();
			$table->date('effectiveDate')->nullable();
			$table->date('expirationDate')->nullable();
			$table->float('premium', 10, 0)->nullable();
			$table->string('state', 2)->nullable();
			$table->date('createdDate')->nullable();
			$table->time('createdTime')->nullable();
			$table->date('cancellationDate')->nullable();
			$table->string('policyStatus')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('policies');
	}

}
