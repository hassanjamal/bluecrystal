<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRdTeamCommisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rd_team_commision', function(Blueprint $table) {
			$table->increments('id');
			$table->float('one');
			$table->float('two');
			$table->float('three');
			$table->float('four');
			$table->float('five');
			$table->float('six');
			$table->float('seven');
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
		Schema::drop('rd_team_commision');
	}

}
