<?php namespace Rebel59\Calendar\FormWidgets;

use Backend\Classes\FormWidgetBase;
use HTML;

class Address extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */

    public function widgetDetails()
    {
        return [
            'name'        => 'Address Widget',
            'description' => 'Renders a Google places dropdown'
        ];
    }

    protected $fieldMap;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->fieldMap = $this->getConfig('fieldMap', []);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('address');
    }

    /**
     * Prepares the list data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['field'] = $this->formField;
    }

    public function getFieldMapAttributes()
    {
        $widget = $this->controller->formGetWidget();
        $fields = $widget->getFields();
        $result = [];
        foreach ($this->fieldMap as $map => $fieldName) {

            if (!$field = array_get($fields, $fieldName))
                continue;

            $result['data-input-'.$map] = '#'.$field->getId();
        }

        return HTML::attributes($result);
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addJs('http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false');
        $this->addJs('js/location-autocomplete.js', 'core');
    }
}
