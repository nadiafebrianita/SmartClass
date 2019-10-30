<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhs');
        $this->load->model('m');
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$this->load->view('header');
		$data['mhs']=$this->m_mhs->show_mhs();
		$this->load->view('v_mhs',$data);
		$this->load->view('footer');
		
	}
	public function edit($id_mhs)
	{
		$where = array('id_mhs' => $id_mhs);
		$data['u'] = $this->m->edit_data($where,'mhs')->result();
		$this->load->view('header');
		$this->load->view('v_editmhs',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_mhs = $this->input->post('id_mhs');
		$nama_mhs = $this->input->post('nama_mhs');
		$nim = $this->input->post('nim');
		$scan_mhs = $this->input->post('scan_mhs');
		
		$data = array(
			'nama_mhs' => $nama_mhs,
			'nim' => $nim,
			'scan_mhs' => $scan_mhs);
	
		$where = array('id_mhs' => $id_mhs);
		
		$this->m->update_data($where,$data,'mhs');
		redirect('mhs/index');
	}

	public function tambah(){
		$this->load->view('header');
		$this->load->view('v_tambahmhs');
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$alias = $this->input->post('alias');
		$id_scan = $this->input->post('id_scan');
		$nama_mhs = $this->input->post('nama_mhs');
		$nim = $this->input->post('nim');
		$datascan = array(
			'id_scan' => $id_scan,
			'alias' => $alias
			);
 
		$data = array(
			'nama_mhs' => $nama_mhs,
			'nim' => $nim,
			'id_scan' => $id_scan
			);
		$this->m_mhs->insert($data, $datascan);
		redirect('mhs/index');
	}
	public function hapus($id_mhs){
		$where = array('id_mhs' => $id_mhs);
		$this->m->hapus_data($where,'mhs');
		redirect('mhs/index');
	}
}
