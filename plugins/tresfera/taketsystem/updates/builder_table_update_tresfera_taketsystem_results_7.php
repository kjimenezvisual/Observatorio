<?php namespace Tresfera\Taketsystem\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTresferaTaketsystemResults7 extends Migration
{
    public function up()
    {
        Schema::table('tresfera_taketsystem_results', function($table)
        {
            $table->boolean('uncompleted')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('tresfera_taketsystem_results', function($table)
        {
            $table->dropColumn('uncompleted');
        });
    }
}
