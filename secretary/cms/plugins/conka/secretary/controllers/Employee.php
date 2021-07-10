<?php namespace Conka\Secretary\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Request;
use October\Rain\Support\Facades\Flash;

/**
 * Employee Back-end Controller
 */
class Employee extends Controller
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

        BackendMenu::setContext('Conka.Secretary', 'employee', 'employee');
    }

    public function formAfterSave(\Conka\Secretary\Models\Employee $employee)
    {
        $this->vars['model'] = $employee;
    }

    public function onUnassignWorkLabel()
    {
        $workLabel = \Conka\Secretary\Models\WorkLabel::findOrFail(\request()->get('id'));

        $this->vars['model'] = $workLabel->employee;

        $workLabel->employee_id = null;

        $workLabel->save();

        Flash::success('Work Label Unassigned');
    }
}
