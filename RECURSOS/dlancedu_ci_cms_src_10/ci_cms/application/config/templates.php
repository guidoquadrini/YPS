<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['templates']['front']['default'] = [
    'regions' => ['header','main_menu','sidebar','footer'],
    'scripts' => [
        ['type' => 'base', 'value' => 'libraries/jquery/jquery-1.10.2.min'],
        ['type' => 'base', 'value' => 'bootstrap/v3/bootstrap.min']
    ],
    'styles' => [
        ['type' => 'base', 'value' => 'bootstrap/v3/css/bootstrap.min'],
        ['type' => 'template', 'value' => 'custom']
    ]
];

$config['templates']['admin']['default'] = [
    'regions' => ['header','main_menu','sidebar','footer']
];

/* End of file templates.php */
/* Location: ./application/config/templates.php */