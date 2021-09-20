<?php namespace Frukt\SubSites\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktSubsitesSites extends Migration
{
    public function up()
    {
        Schema::create('frukt_subsites_sites', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('domain')->nullable();
            $table->string('theme')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('frukt_subsites_sites');
    }
}
