<?php namespace Rebel59\Calendar\Models;

use Model;

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
    public $translatable = ['name', 'location'];

}