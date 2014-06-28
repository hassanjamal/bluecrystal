<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolicyCollectorCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy_collector_commission', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('payment_id')->unsigned()->index();
            $table->integer('policy_id')->unsigned()->index();
            $table->integer('collector_id')->unsigned()->index();
            $table->float('deposit_amount')->nullable();
            $table->float('collection_commission')->nullable();
            $table->boolean('collection_commission_paid')->default(FALSE);
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
		Schema::drop('policy_collector_commission');
	}

}
