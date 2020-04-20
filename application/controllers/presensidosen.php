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
		$id_prodi=$this->session->userdata('id_prodi');
		if(!empty($id_prodi)){
			//admin prodi
			$id_matkul=$this->input->post('id_matkul');

			if(!empty($id_matkul)){
				//sudah pilih dd matkul
				$data['id_matkul']=$id_matkul;
			}
			$data['ddmatkul']=$this->m_presensidosen->ddmatkul($id_prodi);
			$data['u']=$this->m_presensidosen->showprodi($id_prodi,$id_matkul);
			$this->load->view('header2');
			$this->load->view('v2_presensidosen',$data);	
		}
		else{
			//admin fakultas
			$data['u']=$this->m_presensidosen->show();
			$data['ddprodi']=$this->m_presensidosen->ddprodi();
			$data['p']=1;
			$this->load->view('header');
			$this->load->view('v_presensidosen',$data);	
		}
        $this->load->view('footer');
	}
	public function prodi()
	{
		$id_prodi = $this->input->post('id_prodi');
        if($id_prodi=="0"){
            redirect('presensidosen');
        }
        else{
			$data['u']=$this->m_presensidosen->showprodi($id_prodi,0);
			$data['ddprodi']=$this->m_presensidosen->ddprodi();
			$this->load->view('header');
			$this->load->view('v_presensidosen',$data);
			$this->load->view('footer');	
			}
	}
}
