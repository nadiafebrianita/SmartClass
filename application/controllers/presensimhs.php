<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensimhs extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_presensimhs');
        $this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }
	public function index()
	{
		$prodi=$this->session->userdata('nama_prodi');
		$id_prodi=$this->session->userdata('id_prodi');
		$id_matkul = $this->input->post('id_matkul');
		if(!empty($prodi)){
			//admin jurusan
			if(!empty($id_matkul)){
				//sudah pilih dd matkul
				$data['u']=$this->m_presensimhs->matkul($id_matkul);
				$data['ddmatkul']=$this->m_presensimhs->ddmatkul($id_prodi);
				$this->load->view('header2');
				$this->load->view('v2_presensimhs',$data);
			}
			else{
				//belum pilih dd matkul
				$data['ddmatkul']=$this->m_presensimhs->ddmatkul($id_prodi);
				$this->load->view('header2');
				$this->load->view('v2_presensimhs',$data);
			}
		}
		else{
			//admin fakultas
			$data['u']=$this->m_presensimhs->show();
			$data['ddprodi']=$this->m_presensimhs->ddprodi();
			$data['p']=1;
			$this->load->view('header');
			$this->load->view('v_presensimhs',$data);	
		}
        $this->load->view('footer');
	}
	public function logprodi()
	{
		$prodi=$this->session->userdata('nama_prodi');
		$data['u']=$this->m_presensimhs->showprodi($prodi);
		$this->load->view('header2');
		$this->load->view('v2_logmhs',$data);	
        $this->load->view('footer');
	}
	
	public function prodi()
	{
		$id_prodi = $this->input->post('id_prodi');
        if($id_prodi=="0"){
            redirect('presensimhs');
        }
        else{
            $where = array('id_prodi' => $id_prodi);
            $data['u']=$this->m_presensimhs->selected($id_prodi);
            $data['ddprodi']=$this->m_presensimhs->ddprodi();
			$this->load->view('header');
			$this->load->view('v_presensimhs',$data);
			$this->load->view('footer');	
			}
	}
}
