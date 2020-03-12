<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kls extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_kls');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }
	public function show_kls()
	{
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$data['u']=$this->m_kls->klsprodi($prodi);
			$this->load->view('header2');
		}
		else{
			$data['u']=$this->m_kls->kls();
			$this->load->view('header');
		}
		$this->load->view('v_aturkls',$data);
		$this->load->view('footer');
	}
	public function edit($id_kls)
	{
		//$where = array('id_kls' => $id_kls);
		$data['u'] = $this->m_kls->edit_data($id_kls);
		$data['dd'] = $this->m_kls->dd();
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
		$this->load->view('v_editkls',$data);
		$this->load->view('footer');	
	}
	public function update(){
		$id_kls = $this->input->post('id_kls');
		$nama_kls = $this->input->post('nama_kls');
		$ket = $this->input->post('ket');
		
		$data = array(
			'nama_kls' => $nama_kls,
			'ket' => $ket);
	
		$where = array('id_kls' => $id_kls);
		
		$res = $this->m->update_data($where,$data,'kelas');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Data"); 
			redirect('kls/show_kls');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengubah Data");
			redirect('kls/show_kls');
		}
	}
	public function tambah(){
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$data['ddsn'] = $this->m_kls->ddsn();
			$this->load->view('header2');
			$this->load->view('v_tambahkls',$data);
		}
		else{
			$data['dd'] = $this->m_kls->dd();
			$data['ddsn'] = $this->m_kls->ddsn();
			$this->load->view('header');
			$this->load->view('v_tambahkls',$data);
		}
		$this->load->view('footer');	
	}
	public function tambah_aksi(){
		$sn = $this->input->post('sn');
		$nama_kls = $this->input->post('nama_kls');
		$ket = $this->input->post('ket');
		$id_prodi = $this->input->post('id_prodi');
 
		$data = array(
			'sn' => $sn,
			'nama_kls' => $nama_kls,
			'ket' => $ket,
			'id_prodi' => $id_prodi
			);
		
		$res = $this->m_kls->input_data($data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
			redirect('kls/show_kls');
		}else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data");
			redirect('kls/show_kls');
		}
	}
	public function hapus($id_kls)
	{
        $where = array('id_kls' => $id_kls);
		$res=$this->m->hapus_data($where,'kelas');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
			redirect('kls/show_kls');
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
			redirect('kls/show_kls');
		}
	}
}
