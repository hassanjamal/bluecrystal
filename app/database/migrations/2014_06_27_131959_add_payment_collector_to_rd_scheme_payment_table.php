<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPaymentCollectorToRdSchemePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rd_scheme_payment', function(Blueprint $table)
		{
            $table->integer('payment_collector_id')->after('paid')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rd_scheme_payment', function(Blueprint $table)
		{
		    $table->dropColumn('payment_collector_id');
		});
	}

}
