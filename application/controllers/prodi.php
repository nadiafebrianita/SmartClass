<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_prodi');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function index()
	{
		$this->load->view('header');
		$data['u']=$this->m_prodi->tampil();
		$this->load->view('v_prodi',$data);
		$this->load->view('footer');
		
	}
	
	public function edit($id_prodi)
	{
		$where = array('id_prodi' => $id_prodi);
		$data['dd'] = $this->m_prodi->dd();
		$data['u'] = $this->m->edit_data($where,'prodi')->result();
		$this->load->view('header');
		$this->load->view('v_editprodi',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_prodi = $this->input->post('id_prodi');
		$nama_prodi = $this->input->post('nama_prodi');
		$id_fakultas = $this->input->post('id_fakultas');
		
		$data = array(
			'nama_prodi' => $nama_prodi,
			'id_fakultas' => $id_fakultas);
	
		$where = array('id_prodi' => $id_prodi);
		
		$this->m->update_data($where,$data,'prodi');
		redirect('prodi');
	}

	public function tambah(){
		$data['dd'] = $this->m_prodi->dd();
		$this->load->view('header');
		$this->load->view('v_tambahprodi',$data);
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$nama_prodi = $this->input->post('nama_prodi');
		$id_fakultas = $this->input->post('id_fakultas');
 
		$data = array(
			'nama_prodi' => $nama_prodi,
			'id_fakultas' => $id_fakultas
			);
		$this->m->input_data($data,'prodi');
		redirect('prodi');
	}
	public function hapus($id_prodi)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_prodi' => $id_prodi);
        $this->m->update_data($where,$data,'prodi');
        redirect('prodi');
	}
}
