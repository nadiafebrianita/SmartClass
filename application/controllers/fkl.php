<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fkl extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_fkl');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function index()
	{
		$this->load->view('header');
		$data['u']=$this->m_fkl->tampil();
		$this->load->view('v_fkl',$data);
		$this->load->view('footer');
		
	}
	public function edit($id_fakultas)
	{
		$where = array('id_fakultas' => $id_fakultas);
		$data['u'] = $this->m->edit_data($where,'fakultas')->result();
		$this->load->view('header');
		$this->load->view('v_editfkl',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_fakultas = $this->input->post('id_fakultas');
		$nama_fakultas = $this->input->post('nama_fakultas');
		$singkat = $this->input->post('singkat');
		
		$data = array(
			'nama_fakultas' => $nama_fakultas,
			'singkat' => $singkat
			);
	
		$where = array('id_fakultas' => $id_fakultas);
		
		$this->m->update_data($where,$data,'fakultas');
		redirect('fkl');
	}

	public function tambah(){
		$this->load->view('header');
		$this->load->view('v_tambahfkl');
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$nama_fakultas = $this->input->post('nama_fakultas');
		$singkat = $this->input->post('singkat');
 
		$data = array(
			'nama_fakultas' => $nama_fakultas,
			'singkat' => $singkat
			);
		$this->m->input_data($data,'fakultas');
		redirect('fkl');
	}
	public function hapus($id_fakultas)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_fakultas' => $id_fakultas);
        $this->m->update_data($where,$data,'fakultas');
        redirect('fkl');
	}
}
