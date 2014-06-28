<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRdCollectorCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rd_collector_commission', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('rdschemes_id')->unsigned()->index();
            $table->float('commission');
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
		Schema::drop('rd_collector_commission');
	}

}
