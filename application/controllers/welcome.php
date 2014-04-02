<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public $data = array();

	public function index()
	{
        $this->twig->display('index.twig');
	}

    public function nameof($uri){
        $this->data['uri'] = $uri;
        $this->twig->display('index.twig', $this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */