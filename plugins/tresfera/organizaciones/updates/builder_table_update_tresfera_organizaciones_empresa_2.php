<?php namespace Tresfera\Organizaciones\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTresferaOrganizacionesEmpresa2 extends Migration
{
    public function up()
    {
        Schema::table('tresfera_organizaciones_empresa', function($table)
        {
            $table->integer('localizacion_id');
        });
    }
    
    public function down()
    {
        Schema::table('tresfera_organizaciones_empresa', function($table)
        {
            $table->dropColumn('localizacion_id');
        });
    }
}
