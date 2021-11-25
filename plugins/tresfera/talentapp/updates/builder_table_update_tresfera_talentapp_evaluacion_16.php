<?php namespace Tresfera\Talentapp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTresferaTalentappEvaluacion16 extends Migration
{
    public function up()
    {
        Schema::table('tresfera_talentapp_evaluacion', function($table)
        {
            $table->string('lang')->default('es');
        });
    }
    
    public function down()
    {
        Schema::table('tresfera_talentapp_evaluacion', function($table)
        {
            $table->dropColumn('lang');
        });
    }
}
