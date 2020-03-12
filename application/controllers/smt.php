<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smt extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_smt');
        $this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function index()
	{
		$data['dd'] = $this->m_smt->dd();
		$this->load->view('header');
		$data['u']=$this->m_smt->tampil();
		$data['a']=$this->m_smt->a();
		//var_dump($data['a'][0]->nama_smt);die;
		$this->load->view('v_smt',$data);
		$this->load->view('footer');
		
	}
	public function reset()
	{
		$id_smt = "0";
		$data = array(
			'status' => $id_smt);
		$this->m_smt->update_data($data,'smt');
		redirect('smt/aktif');	
	}
	public function aktif($id_smt)
	{
		$data = array(
			'status' => "");
		$this->m_smt->update_data($data,'smt');
		
		$status = "Aktif";
		$data = array(
			'status' => $status
			);
		$where = array('id_smt' => $id_smt);
		$res=$this->m->update_data($where,$data,'smt');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Semester Aktif"); 
			redirect('smt');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengubah Semester Aktif");
			redirect('smt');
		}
	}
	public function tambah(){
		$this->load->view('header');
		$this->load->view('v_tambahsmt');
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$nama_smt = $this->input->post('nama_smt');
		$tahun = $this->input->post('tahun');
 
		$data = array(
			'nama_smt' => $nama_smt,
			'tahun' => $tahun,
			'status' => ""
			);
		
		$res = $this->m_smt->input_data($data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Semester"); 
			redirect('smt');
		}else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Semester, Semester Sudah Ada");
			redirect('smt');
		}
		
	}
	public function edit($id_smt)
	{
		//$where = array('id_smt' => $id_smt);
		$data['u'] = $this->m_smt->edit_data($id_smt);
		$data['dd'] = $this->m_smt->dd();
		$this->load->view('header');
		$this->load->view('v_editsmt',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_smt = $this->input->post('id_smt');
		$nama_smt = $this->input->post('nama_smt');
		$tahun = $this->input->post('tahun');
		
		$data = array(
			'nama_smt' => $nama_smt,
			'tahun' => $tahun
			);
	
		$where = array('id_smt' => $id_smt);
		$res = $this->m->update_data($where,$data,'smt');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Data"); 
			redirect('smt');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengubah Data");
			redirect('smt');
		}
	}
	public function hapus($id_smt)
	{
        $where = array('id_smt' => $id_smt);
		$res=$this->m->hapus_data($where,'smt');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
			redirect('smt');
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
			redirect('smt');
		}
	}
}
