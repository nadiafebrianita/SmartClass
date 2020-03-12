<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_dosen');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function index()
	{
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
		$data['dosen']=$this->m_dosen->show_dosen();
		$this->load->view('v_dosen',$data);
		$this->load->view('footer');
	}
	public function edit($id_dosen)
	{
		$prodi = $this->session->userdata("id_prodi");
		$where = array('id_dosen' => $id_dosen);
		$data['u'] = $this->m->edit_data($where,'dosen')->result();
		$data['a'] = $this->m_dosen->edit_data($where)->result();
		
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
		$this->load->view('v_editdosen',$data);
		$this->load->view('footer');
	}
	
	public function update(){
		$id_dosen = $this->input->post('id_dosen');
		$nama_dosen = $this->input->post('nama_dosen');
		$nip = $this->input->post('nip');
		$nidn = $this->input->post('nidn');
		$id_scan = $this->input->post('id_scan');
		$alias = $this->input->post('alias');

		$data = array(
			'nama_dosen' => $nama_dosen,
			'nip' => $nip,
			'nidn' => $nidn,
			'id_scan' => $id_scan
			);
		$datascan = array(
			'alias' => $alias
			);
		$where = array('id_dosen' => $id_dosen);
		$where1 = array('id_scan' => $id_scan);
		
		$res1=$this->m->update_data($where,$data,'dosen');
		$res2=$this->m->update_data($where1,$datascan,'user_scan');
		if(!empty($res1 && $res2))
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Dosen"); 
			redirect('dosen/index');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengubah Dosen");
			redirect('dosen/index');
		}
	}
	public function tambah(){
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
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
		$res=$this->m_dosen->insert($data, $datascan);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambah Dosen"); 
			redirect('dosen/index');
		}else{
			$this->session->set_flashdata('err', "Gagal Menambah Dosen");
			redirect('dosen/index');
		}
	}
	public function hapus($id_dosen)
	{
        $where = array('id_dosen' => $id_dosen);
		$res=$this->m->hapus_data($where,'dosen');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Dosen"); 
			redirect('dosen/index');
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Dosen");
			redirect('dosen/index');
		}

	}
}
