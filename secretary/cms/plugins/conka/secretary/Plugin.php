<?php namespace Conka\Secretary;

use Backend\Facades\Backend;
use System\Classes\PluginBase;

/**
 * Secretary Plugin Information File
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
            'name' => 'Secretary',
            'description' => 'No description provided yet...',
            'author' => 'Conka',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Conka\Secretary\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'conka.secretary.some_permission' => [
                'tab' => 'Secretary',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'employee' => [
                'label' => 'Employee',
                'url' => Backend::url('conka/secretary/employee'),
                'icon' => 'icon-user',
                'order' => 500,
            ],
            'subject' => [
                'label' => 'Subject',
                'url' => Backend::url('conka/secretary/subject'),
                'icon' => 'icon-archive',
                'order' => 700,
            ],
            'studygroup' => [
                'label' => 'Study Group',
                'url' => Backend::url('conka/secretary/studygroup'),
                'icon' => 'icon-users',
                'order' => 800,
            ],
            'worklabel' => [
                'label' => 'Work Label',
                'url' => Backend::url('conka/secretary/worklabel'),
                'icon' => 'icon-tags',
                'order' => 900,
            ]
        ];
    }
}
