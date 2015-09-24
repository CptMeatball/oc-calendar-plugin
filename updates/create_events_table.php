<?php namespace Rebel59\Eventtracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateAgendaTable extends Migration
{

    public function up()
    {
        Schema::create('rebel59_eventtracker_events', function($table)
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
        Schema::dropIfExists('rebel59_eventtracker_agendas');
    }

}
