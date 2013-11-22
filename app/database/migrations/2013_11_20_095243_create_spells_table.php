<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpellsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spells', function(Blueprint $table) {
			$table->string('uniqueId', 10);
			$table->primary('uniqueId');
			$table->string('spell_class_id', 10)->index();
			$table->string('name');
			$table->string('keyName')->index()->nullable();
			$table->text('description')->nullable();
			$table->integer('difficultyLevel');
			$table->integer('masteryLevel');
			$table->boolean('lostSpellFlag')->default(0)->index();
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
		Schema::drop('spells');
	}

}
