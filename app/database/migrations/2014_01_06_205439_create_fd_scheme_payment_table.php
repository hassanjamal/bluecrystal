<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFdSchemePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fd_scheme_payment', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('policy_id')->unsigned()->index();
			$table->float('deposit_amount')->nullable();
			$table->float('mature_amount')->nullable();
			$table->string('payment_mode')->nullable();
			$table->string('drawee_bank')->nullable();
			$table->string('drawee_branch')->nullable();
			$table->date('drawn_date')->nullable();
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
		Schema::drop('fd_scheme_payment');
	}

}
