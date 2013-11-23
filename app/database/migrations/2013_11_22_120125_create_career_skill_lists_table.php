<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCareerSkillListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('career_skill_lists', function(Blueprint $table) {
			$table->increments('id');
			$table->string('career_id', 10)->index();
			$table->string('skill_list_id', 10)->index();
			$table->integer('cap');
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
		Schema::drop('career_skill_lists');
	}

}
