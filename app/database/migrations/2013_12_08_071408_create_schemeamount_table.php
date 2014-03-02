<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchemeamountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schemeamount', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('amount');
			$table->timestamps();
			$table->engine = 'MyISAM';
		});

		// DB::statement('ALTER TABLE schemeamount ADD FULLTEXT search (id,amount)');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schemeamount');
	}

}
