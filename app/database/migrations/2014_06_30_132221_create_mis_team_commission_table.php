<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMisTeamCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mis_team_commission', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('one');
			$table->float('two');
			$table->float('three');
			$table->float('four');
			$table->float('five');
			$table->float('six');
			$table->integer('rank_id')->unsigned()->index();
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
		Schema::drop('mis_team_commission');
	}

}
