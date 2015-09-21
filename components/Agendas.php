<?php namespace Rebel59\Calendar\Components;

use Cms\Classes\ComponentBase;
Use Rebel59\Calendar\Models\Agenda;

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
        $this->page['agendas'] = Agenda::all();
    }

}