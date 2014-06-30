<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['templates']['front']['default'] = [
    'regions'=> ['header','mainMenu','sideBar','footer'],
    'scripts' => [
        ['type'=>'base', 'value'=>'libreries/jquery/jquery-1.11.1.min'],
        ['type'=>'base', 'value'=>'bootstrap/v3/bootstrap.min']
    ],
    'styles' => [
        ['type'=>'base', 'value'=>'bootstrap/v3/css/bootstrap.min'],
        ['type'=>'template', 'value'=>'custom']
    ]        
];
$config['templates']['admin']['default'] = [
    'regions'=> ['header','mainMenu','sideBar','footer']
];


/* End of file templates.php */
/* Location: ./application/config/templates.php */