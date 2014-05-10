<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRdschemesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rdschemes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('description')->nullable();
			$table->string('year_name')->nullable();
			$table->integer('years')->nullable();
			$table->float('interest')->nullable();
			$table->float('special_interest')->nullable();
			$table->timestamps();
			$table->engine = 'MyISAM';
		});

		DB::statement('ALTER TABLE rdschemes ADD FULLTEXT search (name)');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rdschemes');
	}

}
