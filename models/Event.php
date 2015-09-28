<?php namespace Rebel59\Eventtracker\Models;

use Model;
use Carbon\Carbon;

/**
 * Event Model
 */
class Event extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rebel59_eventtracker_events';

    public $dates = ['date'];
    use \October\Rain\Database\Traits\Purgeable;
    public $purgeable = ['week', 'today'];


     /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['name'];

    /**
     * @var array Fields that are required. Uses Rain's Validation Trait.
     */
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'name'                  => 'required',
        'date'                 => 'required',
        'start'    => 'required',
        'end'    => 'required',
        'location'    => 'required',
    ];
    public $customMessages = [
        'required' => 'The :attribute field is required.'
    ];

    public function afterFetch(){
        if(date('Y-m-d') == $this->date->toDateString()){
            $this->today = true;
        }elseif ($this->date->between(Carbon::now(), Carbon::now()->addWeek())) {
            $this->week = true;
        }
    }

}