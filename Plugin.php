<?php namespace Rebel59\Eventtracker;

use System\Classes\PluginBase;
use Backend;

/**
 * Event Tracker Plugin Information File
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
            'name'        => 'rebel59.eventtracker::lang.plugin.name',
            'description' => 'rebel59.eventtracker::lang.plugin.description',
            'author'      => 'Rebel59',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Rebel59\Eventtracker\FormWidgets\Address' => [
                'label' => 'Address Widget',
                'alias'  => 'address'
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'Rebel59\Eventtracker\Components\EventList' => 'EventList',
        ];
    }

    public function registerPermissions()
    {
        return [
            'rebel59.eventtracker.access_event'  => ['tab' => 'rebel59.eventtracker::lang.model.name', 'label' => 'rebel59.eventtracker::lang.model.name_plural']
        ];
    }

     public function registerNavigation()
    {
        return [
            'eventtracker' => [
                'label' => 'rebel59.eventtracker::lang.models.event.name',
                'url' => Backend::url('rebel59/eventtracker/events'),
                'permissions' => ['rebel59.eventtracker'],
                'icon' => 'icon-table',    
            ]
        ];
    }



}
