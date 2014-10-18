<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMatureDateToFdSchemePayment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fd_scheme_payment', function(Blueprint $table)
		{
		    $table->date('mature_date')->nullable();
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

            $table->dropColumn(['mature_date']);
		});
	}

}
