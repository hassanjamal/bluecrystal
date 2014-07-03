<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMisSchemeReturnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mis_scheme_return', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('policy_id')->unsigned()->index();
			$table->integer('mis_scheme_payment_id')->unsigned()->index();
			$table->float('deposit_amount')->nullable();
			$table->float('monthly_installment')->nullable();
			$table->integer('total_installment')->nullable();
			$table->integer('paid_installment')->nullable();
			$table->string('payment_mode')->nullable();
			$table->string('drawee_bank')->nullable();
			$table->string('drawee_branch')->nullable();
			$table->date('drawn_date')->nullable();
			$table->date('maturity_date')->nullable();
			$table->date('next_installment_date')->nullable();
			$table->string('cheque_no')->nullable();
			$table->string('paid');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mis_scheme_return');
	}

}
