<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolicyTeamCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy_team_commission', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('payment_id')->unsigned()->index();
			$table->integer('policy_id')->unsigned()->index();
			$table->integer('associate_id')->unsigned()->index();
			$table->integer('rank_id')->unsigned()->index();
			$table->integer('rank_no')->unsigned()->index();
			$table->float('deposit_amount')->nullable();			
			$table->float('team_commision')->nullable();			
			$table->boolean('team_commision_paid')->default(FALSE);			
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
		Schema::drop('policy_team_commission');
	}

}
