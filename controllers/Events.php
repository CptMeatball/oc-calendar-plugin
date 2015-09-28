<?php namespace Rebel59\Eventtracker\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Rebel59\Eventtracker\Models\Event;
use Flash;

/**
 * Events Back-end Controller
 */
class Events extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Rebel59.Eventtracker', 'Eventtracker', 'events');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked'))) {
            foreach ($checkedIds as $itemId) {
                if ((!$table = Event::find($itemId)))
                    continue;
                $table->delete();
            }
            Flash::success('Successfully deleted those events.');
        }else{
            Flash::error('Something just went wrong! :(');
        }
        return $this->listRefresh();
    }
}