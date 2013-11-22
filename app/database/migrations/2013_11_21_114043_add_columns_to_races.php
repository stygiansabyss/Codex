<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToRaces extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('races', function(Blueprint $table) {
			$table->integer('hpDice')->after('description');
			$table->string('heightCalculation')->after('hpDice');
			$table->string('wm')->after('heightCalculation');
			$table->integer('lifeSpan')->after('wm');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('races', function(Blueprint $table) {
			$table->dropColumn('hpDice');
			$table->dropColumn('heightCalculation');
			$table->dropColumn('wm');
			$table->dropColumn('lifeSpan');
		});
	}

}
