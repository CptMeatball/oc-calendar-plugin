<?php namespace Rebel59\Calendar\Components;

use Cms\Classes\ComponentBase;
Use Rebel59\Calendar\Models\Agenda;
use Carbon\Carbon;

class Agendas extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'rebel59.calendar::lang.components.overview.name',
            'description' => 'rebel59.calendar::lang.components.overview.description'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->prepareVars();
        $this->loadAssets();
    }

    protected function prepareVars(){
        $this->page['agendas'] = Agenda::where('date', '>=', date('Y-m-d'))->orderBy('date', 'ASC')->get();
        $this->page['today'] = Agenda::where('date', '=', date('Y-m-d'))->count();
        $this->page['week'] = Agenda::whereBetween('date', array(Carbon::now(), Carbon::now()->addWeek()))->count();
        $this->page['other_weeks'] = Agenda::where('date', '>', Carbon::now()->addWeeks(2   ))->count();
    }

    protected function loadAssets(){
        $this->addCss('/plugins/rebel59/calendar/assets/css/overview-component.css');
    }

}