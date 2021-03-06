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
	
		$cek = $this->m_fkl->cek($data);
		if($cek==true){
			$where = array('id_fakultas' => $id_fakultas);
			$this->m->update_data($where,$data,'fakultas');
			$this->session->set_flashdata('true', "Berhasil Mengedit Data"); 
			redirect('fkl');
		}
		else{
			$this->session->set_flashdata('err', "Gagal Mengedit Data, Fakultas Sudah Terdaftar");
			redirect('fkl');
		}		

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
		$cek = $this->m_fkl->cek($data);
		if($cek==true){
			$this->m->input_data($data,'fakultas');
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
			redirect('fkl');
		}
		else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data, Fakultas Sudah Terdaftar");
			redirect('fkl');
		}		
	}
	public function hapus($id_fakultas)
	{
        $where = array('id_fakultas' => $id_fakultas);
		$res=$this->m->hapus_data($where,'fakultas');
		if($res==true){
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
			redirect('fkl');
		}
		else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
			redirect('fkl');
		}		

	}
}
