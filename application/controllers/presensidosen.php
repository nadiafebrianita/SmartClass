<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensidosen extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_presensidosen');
        $this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }
	public function index()
	{
		$data['u']=$this->m_presensidosen->show();
		$data['ddprodi']=$this->m_presensidosen->ddprodi();
		$data['p']=1;
        $this->load->view('header');
        $this->load->view('v_presensidosen',$data);
        $this->load->view('footer');
	}
	public function prodi()
	{
		$id_prodi = $this->input->post('id_prodi');
        if($id_prodi=="0"){
            redirect('presensidosen');
        }
        else{
            //$where = array('id_prodi' => $id_prodi);
			$data['u']=$this->m_presensidosen->selected($id_prodi);
			$data['ddprodi']=$this->m_presensidosen->ddprodi();
			$this->load->view('header');
			$this->load->view('v_presensidosen',$data);
			$this->load->view('footer');	
			}
	}
}
