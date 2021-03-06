<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo',10)->unique();
			$table->string('rif',20)->unique();
			$table->string('nombre');
			$table->enum('rol', ['Nacional', 'Internacional']);
			$table->string('direccion', 150);
			$table->string('telefono', 50);
			$table->string('email')->nullable();
			$table->string('notas',1000)->nullable();
			$table->integer('user_id')->unsigned();			
            $table->timestamps();

              
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
               
   		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	/**public function down()
	{
		Schema::drop('clientes');
	}
	*/
	public function down()
{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('clientes');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
}

}
