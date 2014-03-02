<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssociatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('associates', function(Blueprint $table) {
			$table->increments('id');
			$table->string('associate_no');
			$table->string('name');
			$table->integer('age');
			$table->string('guardian_type')->nullable();
			$table->string('guardian_name')->nullable();
			$table->string('sex')->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('mobile');
			$table->string('address');
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('pincode')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_address')->nullable();
			$table->string('account_no')->nullable();
			$table->string('pan_no')->nullable();
			$table->string('payment_mode')->nullable();
			$table->integer('associate_fees');
			$table->string('drawee_bank')->nullable();
			$table->string('drawee_branch')->nullable();
			$table->date('drawn_date')->nullable();
			$table->string('cheque_no')->nullable();
			$table->string('paid');
			$table->string('nominee_name')->nullable();
			$table->string('nominee_add')->nullable();
			$table->string('nominee_relation')->nullable();
			$table->string('nominee_age')->nullable();
			$table->integer('branch_id')->unsigned()->index();
			$table->integer('introducer_id');
			$table->integer('rank_id')->unsigned()->index();
			$table->date('start_date');
			$table->boolean('activate');
			$table->boolean('company')->default(FALSE);
			$table->timestamps();
			$table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
			$table->engine = 'MyISAM';
		});
		
		DB::statement('ALTER TABLE associates ADD FULLTEXT search (associate_no,name)');

		
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('associates');
	}

}
