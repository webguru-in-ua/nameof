<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Global for All content
 * Class Frontend_controller
 */
class Frontend_controller extends CI_Controller
{
    public $data = array();

    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(true);

        $this->load->library('nativeSession');

        $this->data['user'] = array(
            'login' => $this->nativesession->userdata('authcl'),
            'type' => $this->nativesession->userdata('type'),
            'cart' => $this->nativesession->userdata('cart')
        );

        $this->load->model('taobao/frontend/taobao_categories_model');
        $this->data['taobao_categories'] = $this->taobao_categories_model->getChildCategories();

        /*if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'You must be an admin to view this page');
                redirect('auth/index');
            }*/
    }
}


/**
 * Global for Taobao
 * Class Frontend_taobao_controller
 */
class Frontend_taobao_controller extends Frontend_controller
{

    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(true);

        $this->data['active_page'] = 'taobao';
    }
}

/* Main Admin */
class Admin_controller extends CI_Controller
{
    public $data = array();

    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(true);

        $this->load->library('nativeSession');

        if (!$this->nativesession->userdata('uid') || $this->nativesession->userdata('type') != 1) {
            redirect('login');
        }


        $this->twig->set_layout('admin');
    }
}

/* Taobao Admin */
class Admin_taobao_controller extends Admin_controller
{

    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(true);

        $this->data['navigation'] = array(
            array('cpanel/index', 'Dashboard'),
        );
        $this->data['active_page'] = 'index';
    }
}


/* Main Admin */
class Cpanel_controller extends CI_Controller
{
    public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(true);

        $this->load->library('nativeSession');

/*        if (!$this->nativesession->userdata('uid') || $this->nativesession->userdata('type') != 1) {
            redirect('login');
        }*/


        $this->twig->set_layout('cpanel');
    }
}


/* UserPanel */
/*class UserPanelController extends CI_Controller
{
    public $global_data = array();

    function __construct()
    {
        parent::__construct();

        //$this->output->enable_profiler();

        if (!$this->ion_auth->in_group('users')) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('auth/login');
        }

        $this->layout->setLayout('userPanel');

        $this->layout->addStyleSheet('bootstrap_2.2.2/css/bootstrap.min.css');
        $this->layout->addStyleSheet('bootstrap_2.2.2/style.css');
        $this->layout->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext', false);

        $this->layout->addScript('jquery-ui-1.9.2.custom/js/jquery-1.8.3.js', true);
        $this->layout->addScript('bootstrap_2.2.2/js/bootstrap.min.js', true);
        $this->layout->addScript('jquery.cookie.js', true);

        $this->layout->setCustomeVar('user', $this->ion_auth->user()->row());
        //var_dump($this->ion_auth->user()->row());

        urlhistory_set();
    }
}*/


/* ClientPanel */
/*class ClientPanelController extends CI_Controller
{
    public $global_data = array();

    function __construct()
    {
        parent::__construct();

        //$this->output->enable_profiler();

        if (!$this->ion_auth->in_group('users')) {
            $this->session->set_flashdata('message', 'You must be an client to view this page');
            redirect('auth/login');
        }

        $this->layout->setLayout('clientPanel');

        $this->layout->addStyleSheet('bootstrap_2.2.2/css/bootstrap.min.css');
        $this->layout->addStyleSheet('bootstrap_2.2.2/style.css');
        $this->layout->addScript('jquery-ui-1.9.2.custom/js/jquery-1.8.3.js', true);
        $this->layout->addScript('bootstrap_2.2.2/js/bootstrap.min.js', true);
        $this->layout->addScript('jquery.cookie.js', true);

        $this->layout->setCustomeVar('user', $this->ion_auth->user()->row());
        //var_dump($this->ion_auth->user()->row());

        urlhistory_set();
    }
}*/


/* Auth */
/*class AuthController extends CI_Controller
{
    public $global_data = array();

    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler();

        $this->layout->setLayout('auth');

        $this->layout->addStyleSheet('bootstrap_2.2.2/css/bootstrap.min.css');
        $this->layout->addStyleSheet('bootstrap_2.2.2/style.css');
        $this->layout->addScript('jquery-ui-1.9.2.custom/js/jquery-1.8.3.js', true);
        $this->layout->addScript('bootstrap_2.2.2/js/bootstrap.min.js', true);

        //urlhistory_set();
    }
}*/