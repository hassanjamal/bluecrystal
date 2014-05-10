<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSpecialCaseToPoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('policies', function(Blueprint $table) {
		    $table->boolean('special_case');
            $table->string('description_special_case');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('policies', function(Blueprint $table) {
		    $table->dropColumn('special_case');
            $table->dropColumn('description_special_case');    
		});
	}

}
