<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policies', function(Blueprint $table) {
		$table->increments('id');
		$table->string('policy_no');
	    $table->integer('branch_id');
        $table->string('associate_no');
        $table->integer('associate_id');
        $table->string('scheme_type');
        $table->string('scheme_name');
        $table->integer('scheme_id');
        $table->string('name');
        $table->integer('age');
        $table->string('guardian_type');
        $table->string('guardian_name');
        $table->string('pan_no');
        $table->string('sex');
        $table->date('date_of_birth');
        $table->string('mobile');
        $table->string('address');
        $table->string('city');
        $table->string('state');
        $table->integer('pincode');
        $table->string('nominee_name');
        $table->string('nominee_add');
        $table->string('nominee_relation');
        $table->string('nominee_age');
		$table->timestamps();
		$table->engine = 'MyISAM';
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('policies');
	}

}
