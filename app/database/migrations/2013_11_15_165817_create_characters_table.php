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
			$table->string('user_id', 10)->index();
			$table->string('name');
			$table->string('color');
			$table->string('alias')->nullable();
			$table->integer('damage')->nullable();
			$table->integer('spellPointsUsed')->nullable();
			$table->boolean('hiddenFlag')->default(0)->index();
			$table->boolean('activeFlag')->default(0)->index();
			$table->boolean('approvedFlag')->default(0)->index();
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
