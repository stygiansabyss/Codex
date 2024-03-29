<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCareersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('careers', function(Blueprint $table) {
			$table->string('uniqueId', 10);
			$table->primary('uniqueId');
			$table->string('class_id')->index();
			$table->string('name');
			$table->string('keyName')->index();
			$table->string('fullName')->nullable();
			$table->text('description')->nullable();
			$table->boolean('gmApprovalFlag')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('careers');
	}

}
