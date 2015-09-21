<?php namespace Rebel59\Calendar;

use System\Classes\PluginBase;
use Backend;

/**
 * Calendar Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'rebel59.calendar::lang.plugin.name',
            'description' => 'rebel59.calendar::lang.plugin.description',
            'author'      => 'Rebel59',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            'Rebel59\Calendar\Components\Agendas' => 'Agendas',
        ];
    }

    public function registerPermissions()
    {
        return [
            'rebel59.calendar.access_agenda'  => ['tab' => 'rebel59.calendar::lang.model.name', 'label' => 'rebel59.calendar::lang.model.name_plural']
        ];
    }

     public function registerNavigation()
    {
        return [
            'agenda' => [
                'label' => 'rebel59.calendar::lang.models.agenda.name',
                'url' => Backend::url('rebel59/calendar/agendas'),
                'permissions' => ['rebel59.calendar'],
                'icon' => 'icon-table',    
            ]
        ];
    }

}
