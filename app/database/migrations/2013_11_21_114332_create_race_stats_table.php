<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRaceStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('race_stats', function(Blueprint $table) {
			$table->increments('id');
			$table->string('race_id', 10)->index();
			$table->string('stat_id', 10)->index();
			$table->integer('startingDice');
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
		Schema::drop('race_stats');
	}

}
