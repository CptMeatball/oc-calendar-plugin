<?php namespace Rebel59\Calendar\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Rebel59\Calendar\Models\Agenda;
use Flash;

/**
 * students Back-end Controller
 */
class Agendas extends Controller
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

        BackendMenu::setContext('Rebel59.Calendar', 'Calendar', 'agendas');
    }

    public function index()
    { 
        $this->asExtension('ListController')->index();
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked'))) {
            foreach ($checkedIds as $itemId) {
                if ((!$table = Agenda::find($itemId)))
                    continue;
                $table->delete();
            }
            Flash::success('Successfully deleted those students.');
        }else{
            Flash::error('Something just went wrong! :(');
        }
        return $this->listRefresh();
    }
}