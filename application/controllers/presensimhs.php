<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensimhs extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_presensimhs');
        $this->load->helper('url');
    }

	public function index()
	{
		$data['u']=$this->m_presensimhs->show();
        $this->load->view('header');
        $this->load->view('v_presensimhs',$data);
        $this->load->view('footer');
		
	}
}
