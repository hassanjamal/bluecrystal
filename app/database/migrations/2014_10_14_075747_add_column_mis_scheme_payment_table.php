<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnMisSchemePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mis_scheme_payment', function(Blueprint $table)
		{
			$table->integer('total_installment')->nullable();
            $table->date('maturity_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mis_scheme_payment', function(Blueprint $table)
		{
            $table->dropColumn(['total_installment' , 'maturity_date']);
		});
	}

}
