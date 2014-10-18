<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddReceiptAndCertificateToFdSchemePayment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fd_scheme_payment', function(Blueprint $table)
		{
		    $table->string('receipt_no')->nullable();
            $table->string('certificate_no')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fd_scheme_payment', function(Blueprint $table)
		{
		    $table->dropColumn(['receipt_no', 'certificate_no']);
		});
	}

}
