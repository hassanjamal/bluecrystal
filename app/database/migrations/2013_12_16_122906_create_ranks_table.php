<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ranks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('rank_no')->unsigned()->index();
			$table->string('rankname');
			$table->boolean('company')->default(FALSE);
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
		Schema::drop('ranks');
	}

}
