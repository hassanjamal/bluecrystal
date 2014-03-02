<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRdSelfCommisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rd_self_commision', function(Blueprint $table) {
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
			// $table->foreign('rank_id')
			// 		->references('id')->on('ranks')
			// 		->onDelete('cascade');
			// 		// ->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rd_self_commision');
	}

}
