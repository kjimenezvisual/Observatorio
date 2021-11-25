<?php namespace Tresfera\Skillyouup\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTresferaSkillyouupUserGestor extends Migration
{
    public function up()
    {
        Schema::create('tresfera_skillyouup_user_gestor', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tresfera_skillyouup_user_gestor');
    }
}