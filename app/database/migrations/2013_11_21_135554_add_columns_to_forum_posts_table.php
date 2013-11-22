<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToForumPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forum_posts', function(Blueprint $table) {
			$table->dropColumn('character_id');
			$table->string('morph_id', 10)->index()->after('user_id');
			$table->string('morph_type')->index()->after('morph_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('forum_posts', function(Blueprint $table) {
			$table->string('character_id', 10)->index()->after('user_id');
			$table->dropColumn('morph_id');
			$table->dropColumn('morph_type');
		});
	}

}
