<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ModifySkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('skills', function(Blueprint $table) {
			$table->dropColumn('percentageStart');
			$table->dropColumn('percentageEnd');
			$table->dropColumn('trainTime');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('skills', function(Blueprint $table) {
			$table->integer('percentageStart');
			$table->integer('percentageEnd');
			$table->string('trainTime');
		});
	}

}
