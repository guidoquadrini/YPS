<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config['templates']['front']['default'] = [
    'regions' => ['header', 'mainMenu', 'sideBarA', 'sideBarB', 'footer'],
    'scripts' => [
    ['type' => 'base', 'value' => 'libreries/jquery/jQuery-2.1.4.min'],
    ['type' => 'base', 'value' => 'bootstrap/v3/bootstrap.min'],
    ['type' => 'template', 'value' => 'app.min'],
    ['type' => 'template', 'value' => 'jquery.highlight'],
        ['type' => 'template', 'value' => 'plantilla']
    ],
    'styles' => [
        ['type' => 'base', 'value' => 'bootstrap/v3/css/bootstrap.min'],
        ['type' => 'template', 'value' => 'custom'],        
        ['type' => 'base', 'value' => 'font-awesome/4.4.0/css/font-awesome.min'],
        ['type' => 'base', 'value' => 'ionicons/2.0.1/css/ionicons.min'],
        ['type' => 'template', 'value' => 'AdminLTE'],
        ['type' => 'base', 'value' => '../plugins/jvectormap/jquery-jvectormap-1.2.2'],
        ['type' => 'template', 'value' => 'skins/skin-purple.min']
    ]
];
$config['templates']['admin']['default'] = [
    'regions' => ['header', 'mainMenu', 'sideBar', 'footer']
];


/* End of file templates.php */
/* Location: ./application/config/templates.php */