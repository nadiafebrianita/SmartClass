<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_dosen');
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$this->load->view('header');
		$data['dosen']=$this->m_dosen->show_dosen();
		$this->load->view('v_dosen',$data);
		$this->load->view('footer');
		
	}
	public function editcoba($id_dosen)
	{
		$id_scan = $this->input->post('id_scan');
		$where = array('id_dosen' => $id_dosen);
		$where1 = array('id_scan' => $id_scan);
		$data['dd'] = $this->m_dosen->dd();
		$data['u'] = $this->m->edit_data($where,'dosen')->result();
		//$data['a'] = $this->m->edit_data($where1,'dosen')->result();
		
		$this->m_dosen->alias($id_scan);
		$data['a'] = $this->m_dosen->alias();
		$this->load->view('header');
		$this->load->view('v_editdosen',$data);
	    $this->load->view('footer');
	}

	public function edit($id_dosen)
	{
		$where = array('id_dosen' => $id_dosen);
		
		$data['dd'] = $this->m_dosen->dd();
		$data['u'] = $this->m->edit_data($where,'dosen')->result();
		$this->load->view('header');
		$this->load->view('v_editdosen',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_dosen = $this->input->post('id_dosen');
		$nama_dosen = $this->input->post('nama_dosen');
		$nip = $this->input->post('nip');
		$nidn = $this->input->post('nidn');
		$scan_dosen = $this->input->post('scan_dosen');
		
		$data = array(
			'nama_dosen' => $nama_dosen,
			'nip' => $nip,
			'nidn' => $nidn,
			'scan_dosen' => $scan_dosen);
	
		$where = array('id_dosen' => $id_dosen);
		
		$this->m->update_data($where,$data,'dosen');
		redirect('dosen/index');
	}

	public function tambah(){
		$this->load->view('header');
		$this->load->view('v_tambahdosen');
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$alias = $this->input->post('alias');
		$id_scan = $this->input->post('id_scan');
		$nama_dosen = $this->input->post('nama_dosen');
		$nip = $this->input->post('nip');
		$nidn = $this->input->post('nidn');
		$datascan = array(
			'id_scan' => $id_scan,
			'alias' => $alias
			);
		$data = array(
			'nama_dosen' => $nama_dosen,
			'nip' => $nip,
			'nidn' => $nidn,
			'id_scan' => $id_scan
			);
		$this->m_dosen->insert($data, $datascan);
		redirect('dosen/index');
	}
	public function hapus($id_dosen){
		$where = array('id_dosen' => $id_dosen);
		$this->m->hapus_data($where,'dosen');
		redirect('dosen/index');
	}
}
