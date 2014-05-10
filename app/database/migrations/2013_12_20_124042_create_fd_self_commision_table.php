<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFdSelfCommisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fd_self_commision', function(Blueprint $table) {
			$table->increments('id');
			$table->float('one');
			$table->float('two');
			$table->float('three');
			$table->float('four');
			$table->float('five');
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
		Schema::drop('fd_self_commision');
	}

}
