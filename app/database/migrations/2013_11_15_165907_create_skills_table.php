<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skills', function(Blueprint $table) {
			$table->string('uniqueId', 10);
			$table->primary('uniqueId');
			$table->string('skill_list_id', 10)->index();
			$table->string('base_id', 10)->index();
			$table->string('name');
			$table->string('keyName')->index();
			$table->string('fullName')->nullable();
			$table->text('description')->nullable();
			$table->integer('percentageStart');
			$table->integer('percentageEnd');
			$table->string('trainTime');
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
		Schema::drop('skills');
	}

}
