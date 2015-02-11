<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMelodiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('melodies', function(Blueprint $table)
		{
			$table->string('parent_melody');
			$table->string('class');
			$table->string('time');
			$table->string('primary_note');
			$table->string('secondary_note');
			$table->string('forbidden_note');
			$table->string('ascending_scale');
			$table->string('descening_scale');
			$table->string('characteristic_scale');
			$table->string('information');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('melodies', function(Blueprint $table)
		{
			//
		});
	}

}