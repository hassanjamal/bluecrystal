<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRdSchemePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rd_scheme_payment', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('policy_id')->unsigned()->index();
			$table->float('deposit_amount')->nullable();
			$table->float('mature_amount')->nullable();
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
		Schema::drop('rd_scheme_payment');
	}

}
