<?php namespace Rebel59\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateAgendaTable extends Migration
{

    public function up()
    {
        Schema::create('rebel59_calendar_agendas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->string('location');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('rebel59_calendar_agendas');
    }

}
