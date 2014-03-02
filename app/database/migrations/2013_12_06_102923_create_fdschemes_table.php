<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFdschemesTable extends Migration {

	/**
	 * Run the migrations. 
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fdschemes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('description')->nullable();
			$table->string('year_name')->nullable();
			$table->integer('years')->nullable();
			$table->float('interest')->nullable();
			$table->timestamps();
			$table->engine = 'MyISAM';
		});

		DB::statement('ALTER TABLE fdschemes ADD FULLTEXT search (name)');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fdschemes');
	}

}
