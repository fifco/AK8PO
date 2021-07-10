<?php namespace Conka\Secretary\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Conka\Secretary\Services\GenerateWorkLabels;
use Illuminate\Support\Facades\Redirect;
use October\Rain\Support\Facades\Flash;

/**
 * Work Label Back-end Controller
 */
class WorkLabel extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Conka.Secretary', 'worklabel', 'worklabel');
    }

    public function onGenerateWorkLabels()
    {
        /** @var GenerateWorkLabels $generateWorkLabels */
        $generateWorkLabels = app()->make(GenerateWorkLabels::class);

        $generateWorkLabels->generate();

        Flash::success('Work Labels regenerated!');

        return Redirect::refresh();
    }
}
