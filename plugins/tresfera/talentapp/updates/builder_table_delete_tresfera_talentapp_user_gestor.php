<?php namespace Tresfera\Talentapp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteTresferaTalentappUserGestor extends Migration
{
    public function up()
    {
        Schema::dropIfExists('tresfera_talentapp_user_gestor');
    }
    
    public function down()
    {
        Schema::create('tresfera_talentapp_user_gestor', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id');
        });
    }
}
