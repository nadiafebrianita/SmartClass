<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_dashboard');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(site_url('admin/login'));
		}
    }
	public function index()
	{
	$data['jadwal']=$this->m_dashboard->jadwal();
	$data['smt']=$this->m_dashboard->smt();
	$data['kls']=$this->m_dashboard->kls();
	$data['matkul']=$this->m_dashboard->matkul();
	$data['mhsmatkul']=$this->m_dashboard->mhsmatkul();
	$data['prodi']=$this->m_dashboard->prodi();
	$data['fkl']=$this->m_dashboard->fkl();
	$this->load->view('header');
	$this->load->view('v_dashboard',$data);
	$this->load->view('footer');
	}
}
