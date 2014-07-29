<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->integer('id')->nullable()->index('`transactions_id`');
			$table->date('transactionDate')->default('0000-00-00');
			$table->time('transactionTime')->default('00:00:00');
			$table->string('description')->nullable();
			$table->float('amount', 10, 0)->nullable();
			$table->string('authorName')->nullable();
			$table->integer('policyID')->nullable();
			$table->float('allocated', 10, 0)->nullable();
			$table->string('premiumType')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
