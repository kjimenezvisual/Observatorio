<?php namespace Tresfera\Organizaciones\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTresferaOrganizacionesPuesto extends Migration
{
    public function up()
    {
        Schema::create('tresfera_organizaciones_puesto', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('client_id');
            $table->integer('parent_id');
            $table->text('name');
            $table->integer('familia_puesto_id');
            $table->integer('organizacion_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tresfera_organizaciones_puesto');
    }
}
