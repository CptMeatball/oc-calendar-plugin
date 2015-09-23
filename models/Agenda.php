<?php namespace Rebel59\Calendar\Models;

use Model;
use Carbon\Carbon;

/**
 * Agenda Model
 */
class Agenda extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rebel59_calendar_agendas';

    public $dates = ['date'];


     /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['name'];

    public function afterFetch(){
        if(date('Y-m-d') == $this->date->toDateString()){
            $this->today = true;
        }elseif ($this->date->between(Carbon::now(), Carbon::now()->addWeek())) {
            $this->week = true;
        }
    }

}