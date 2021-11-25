<?php namespace Tresfera\Talentapp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTresferaTalentappUserEvaluador extends Migration
{
    public function up()
    {
        Schema::create('tresfera_talentapp_user_evaluador', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tresfera_talentapp_user_evaluador');
    }
}
