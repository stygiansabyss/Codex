<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharactersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('characters', function(Blueprint $table) {
			$table->string('uniqueId', 10);
			$table->primary('uniqueId');
			$table->string('class_id', 10)->nullable()->index();
			$table->string('career_id', 10)->nullable()->index();
			$table->string('race_id', 10)->nullable()->index();
			$table->string('name');
			$table->string('alias')->nullable();
			$table->integer('damage')->nullable();
			$table->integer('spellPointsUsed')->nullable();
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
		Schema::drop('characters');
	}

}
