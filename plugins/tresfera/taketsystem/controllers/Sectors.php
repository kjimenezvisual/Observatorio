<?php namespace Tresfera\Taketsystem\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Sectors Back-end Controller
 */
class Sectors extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Tresfera.Taketsystem', 'taketsystem', 'sectors');
    }
}