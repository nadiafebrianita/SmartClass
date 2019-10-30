<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	// function __construct()
	// {
    //     parent::__construct();
    //     $this->load->model('m_dashboard');
    //     $this->load->helper(array('form', 'url'));
    // }
	public function index()
	{
	// $data['u']=$this->m_dashboard->show_dashboard();
	$this->load->view('header');
	$this->load->view('v_dashboard');
	$this->load->view('footer');
	}
}
