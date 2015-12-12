<?php
if (!defined('BASEPATH')){
    exit('No direct script access allowed');
}

class Template {
    protected $CI;
    private $configs;
    private $data;
    private $js;
    private $css;
    private $table;
    private $id;
    private $name;
    private $default_id;
    private $default_name;
    private $message;
    private $panel;
    private $menu;
    private $usuario_activo;
    
    
    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->config('templates');
        $this->configs = $this->CI->config->item('templates');
        $this->data = [];
        $this->js = [];
        $this->css = [];
        $this->table = 'templates';
        $this->id = null;
        $this->name = null;
        $this->default_id = null;
        $this->default_name = null;
        $this->panel = $this->CI->adminPanel() ? 'b' : 'f';
        
        //Carga el Menu segun el Rol
        if (isset($this->CI->session->userdata['user_id'])){
            $id_usuario = $this->CI->session->userdata['user_id'];
            $this->CI->load->library('usuario');
        $role = $this->CI->usuario->role;
               
        $this->CI->load->model('modelmenu', 'menu');
        $this->menu = $this->CI->menu->get_tree($role);       
        
        $this->CI->load->model('Catalogos/usuarios', 'mUsuarios');
        $oUsuario = $this->CI->mUsuarios->buscarPorId($id_usuario);
        $this->usuario_activo = $oUsuario;
                
        }
        
    }

    public function set($key, $value) {
        if (!empty($key)) {
            $this->data[$key] = $value;
        }
    }

    public function add_js($type, $value, $charset = null, $defer = null, $async = null) {
        $this->_add_asset($type, $value, ['charset' => $charset, 'defer' => $defer, 'async' => $async], 'script');
    }

    public function add_css($type, $value, $media = null) {
        $this->_add_asset($type, $value, ['media' => $media], 'style');
    }

    public function add_message($message, $type = null) {
        $this->_add_message($message, $type);
    }

    public function set_flash_message(array $message) {
        if (sizeof($message) > 0) {
            $this->CI->session->set_flashdata('_message_', $message);
        }
    }

    public function render($view = null, $datosVista = null) {
        if ($datosVista == null){
             $datosVista['tituloContenido']="Vista Sin Nombre";
       $datosVista['descContenido'] = "Vista Sin Descripcion";
        $datosVista['breadCrumb'] = null;
       
        
        }
        $template = $this->_route();
        $routes = [];

        if (!empty($view)) {
            if (!is_array($view)) {
                $view = [$view];
            }

            foreach ($view as $file) {
                $route = $this->panel == 'b' ? 'admin/' : '';
                $route .= $this->name . '/html/' . str_replace('admin/', '', $file);

                if (file_exists(APPPATH . "views/templates/{$route}.php")) {
                    $routes[] = APPPATH . "views/templates/{$route}.php";
                } elseif (file_exists(APPPATH . "views/{$file}.php")) {
                    $routes[] = APPPATH . "views/{$file}.php";
                } else {
                    show_error('View error');
                }
            }
        }

        $this->_set_asset();
        $this->_set_message();
        $this->data['_AbreviacionIdioma'] = "es";
        $this->data['_metaData'] = [
            0 => '<meta charset="utf-8">',
            1 => '<meta http-equiv="X-UA-Compatible" content="IE=edge">'
        ];
        $this->CI->load->config('yps');        
        $this->data['_tituloAplicacion'] = $this->CI->config->item('yps_appname');
        $RightSide = $this->CI->load->view("templates/default/RightSide.php",[], true);
        $Footer = $this->CI->load->view("templates/default/Footer.php",[], true);
        $menu_str = '<ul class="sidebar-menu">';
        
        foreach ($this->menu as $item){
            
            switch($item['tipo']){
                case 'header':
                    $menu_str .= '<li class="header">'. 
                    $item['nombre'] . '</li>';
                    break;            
                case 'treeview':
                    $menu_str .= '<li class="' . $item['tipo'] . '">' .
                    '<a href="' . $item['url'] . '">' .
                    '<i class="' . $item['icon'] . '"></i> '
                        . '<span>'. $item['nombre'] .'</span>'
                        . '<i class="fa fa-angle-left pull-right">&nbsp;</i>'
                        . '</a>';
//            
                    if (!empty($item['hijos'])){
                        $menu_str .= '<ul class="treeview-menu">';
                        foreach ($item['hijos'] as $hijo){
                            $menu_str .= '<li><a href="' . $hijo['url'] . '">'
                                    . '<i class="' . $hijo['icon'] . '"> </i> '
                                    . '<span> ' . $hijo['nombre'] . ' </span>'
                                    . '</a></li>';
                        }
                        $menu_str .= '</ul>';
                    }
                    $menu_str .= '</li>';
                    break;
                default:
                    
                    $menu_str .= '<li class="'. $item['class'] .'">'. 
                    '<a href="' . $item['url'] . '">'
                    . '<i class="' . $item['icon'] . '"></i>&nbsp;'
                    . '<span>' . $item['nombre'] . '</span></a></li>';
                break;
            }            
            
        }
        $menu_str .= "</ul>";
        //$_menu= ['menu'=>$menu_str];
        $datos_usuario = '';
        //$_usuario_activo['url_photo'] = 'assets/images/templates/default/user2-160x160.jpg';
//$_usuario_activo['nombre_corto'] = 'Ing. Guido Q.';
//$_usuario_activo['estado'] = 'Online';
        $LeftSide = $this->CI->load->view(
                "templates/default/LeftSide.php",
                [ '_menu'=>$menu_str,
                  '_usuario_activo' => $this->usuario_activo
                ], true);
        $Header = $this->CI->load->view("templates/default/Header.php",[], true);
        $this->set('_Componentes', [
            'Header' => $Header,
            'LeftSide' => $LeftSide,
            'Footer' => $Footer,
            'RightSide' => $RightSide
        ]);
        
        $this->set('_content', $routes);
        $this->set('_tituloContenido', $datosVista['tituloContenido']);
        $this->set('_descContenido', $datosVista['descContenido']);
        $this->set('_breadCrumb', $this->_dondeEstoy($datosVista['breadCrumb']));
        $this->CI->load->view($template, $this->data);
    }

    private function _dondeEstoy($pasos){
        return '<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li><li class="active">Here</li>';
    }
    
    private function _route() {
        $route = 'templates/';
        if (empty($this->name)) {
            $template = $this->CI->db->select(['id', 'name'])
                    ->get_where($this->table, ['panel' => $this->panel, 'default' => 1])
                    ->row();

            if (sizeof($template) == 0 || empty($template->name)) {
                show_error('Template error');
            }

            $this->name = $template->name;
        }

        $route .= $this->panel == 'b' ? 'admin/' : '';
        $route .= "{$this->name}/template.php";

        if (!file_exists(APPPATH . "views/{$route}")) {
            show_error('No template found');
        }
        return $route;
    }

    private function _add_asset($type, $value, $options = array(), $asset_type) {
        if (!empty($type)) {
            $asset = [];

            if (is_array($value)) {
                foreach ($value as $val) {
                    $asset[] = ['type' => $type, 'value' => $val, 'options' => $options];
                }
            } else {
                $asset[] = ['type' => $type, 'value' => $value, 'options' => $options];
            }
        }
        if ($asset_type == 'script') {
            $this->js = array_merge($this->js, $asset);
        } elseif ($asset_type == 'style') {
            $this->css = array_merge($this->css, $asset);
        }
    }

    private function _set_asset() {
        if (!empty($this->name)) {
            $panel = $this->panel == 'b' ? 'admin' : 'front';

            if (isset($this->configs[$panel][$this->name]['scripts']) && sizeof($this->configs[$panel][$this->name]['scripts']) > 0) {
                $scripts = $this->js;
                $this->js = [];
                foreach ($this->configs[$panel][$this->name]['scripts'] as $script)
                    $this->_add_asset($script['type'], $script['value'], isset($script['options']) ? $script['options'] : [], 'script');
                $this->js = array_merge($this->js, $scripts);
            }


            if (isset($this->configs[$panel][$this->name]['styles']) && sizeof($this->configs[$panel][$this->name]['styles']) > 0) {
                $styles = $this->css;
                $this->css = [];
                foreach ($this->configs[$panel][$this->name]['styles'] as $style)
                    $this->_add_asset($style['type'], $style['value'], isset($style['options']) ? $style['options'] : [], 'style');
                $this->css = array_merge($this->css, $styles);
            }
        }

        $_css = $_js = '';

        $panel = $this->panel == 'b' ? 'admin/' : '';

        if (sizeof($this->js) > 0) {
            foreach ($this->js as $js) {
                $defer = $async = $charset = '';

                if (isset($js['options'])) {
                    $defer = isset($js['options']['defer']) ? 'defer' : '';
                    $async = isset($js['options']['async']) ? 'async' : '';
                    $charset = isset($js['options']['charset']) ? 'charset=' . $js['options']['charset'] . '"' : '';
                }
                $src = base_url() . 'assets/scripts/';

                switch ($js['type']) {
                    case 'base':
                        $src .= $js['value'] . '.js';
                        break;
                    case 'template':
                        $src .= 'templates/' . $panel . $this->name . '/' . $js['value'] . '.js';
                        break;
                    case 'view':
                        $src .= 'views/' . $js['value'] . '.js';
                        break;
                    case 'url':
                        $src = $js['value'];
                        break;
                    default:
                        $src = '';
                }
                $_js.=sprintf('<script type="text/javascript" src="%s" %s %s %s></script>', $src, $charset, $defer, $async);
            }
        }
        if (sizeof($this->css) > 0) {
            foreach ($this->css as $css) {
                $media = '';

                if (isset($css['options'])) {
                    $media = isset($css['options']['media']) ? 'media=' . $css ['options']['media'] . '"' : '';
                }
                $href = base_url() . 'assets/styles/';

                switch ($css['type']) {
                    case 'base':
                        $href .= $css['value'] . '.css';
                        break;
                    case 'template':
                        $href .= 'templates/' . $panel . $this->name . '/' . $css['value'] . '.css';
                        break;
                    case 'view':
                        $href .= 'views/' . $css['value'] . '.css';
                        break;
                    case 'url':
                        $href = $css['value'];
                        break;
                    default:
                        $href = '';
                }
                $_css.=sprintf('<link type="text/css" rel="stylesheet" href="%s" %s>', $href, $media);
            }
        }
        $this->data['_js'] = $_js;
        $this->data['_css'] = $_css;
    }

    private function _add_message($message, $type = null) {

        if (!empty($message)) {
            $types = ['warning', 'success', 'error', 'info'];

            $check_type = function($_type) use ($types) {
                return (empty($_type) || !in_array($_type, $types)) ? 'warning' : $_type;
            };
            if (is_array($message)) {
                foreach ($message as $type => $msg) {
                    if (!empty($msg)) {

                        $type = $check_type($type);

                        if (is_array($msg)) {

                            foreach ($msg as $_msg) {
                                if (!empty($_msg)) {
                                    $this->message[$type][] = (string) $_msg;
                                }
                            }
                        } else {
                            $this->message[$type][] = (string) $msg;
                        }
                    }
                }
            } else {
                $type = $check_type($type);
                $this->message[$type][] = (string) $message;
            }
        }
    }

    private function _set_message() {
        $this->add_message($this->CI->session->flashdata('_message_'));
        $this->data['_warning'] = isset($this->message['warning']) ? $this->message['warning'] : [];
        $this->data['_success'] = isset($this->message['success']) ? $this->message['success'] : [];
        $this->data['_error'] = isset($this->message['error']) ? $this->message['error'] : [];
        $this->data['_info'] = isset($this->message['info']) ? $this->message['info'] : [];
    }

}

/* End of file Template.php */
/* Location: ./application/libreries/Template.php */