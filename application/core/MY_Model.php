<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

    /**
     * Taobao tables
     * @var string
     */


    public $t_cpanel_clients = 'clients';
    public $t_cpanel_rememail = 'rememail';
    public $t_basket = 'baskets';

    public $t_taobao_categories = 'taobao_categories';
    public $t_taobao_items = 'taobao_items';
    public $t_taobao_tmp = 'taobao_tmp';
    public $t_taobao_dictionary = 'taobao_dictionary';

    public function __construct()
    {
        parent::__construct();

    }

}
// End of Taobao_Model class


/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */