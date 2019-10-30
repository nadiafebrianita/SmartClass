<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kls extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_kls');
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('header');
		$data['u']=$this->m_kls->tampilkls();
		$this->load->view('v_kls',$data);
		$this->load->view('footer');
		
	}
	public function show_kls()
	{
		$this->load->view('header');
		$data['u']=$this->m_kls->tampilkls();
		$this->load->view('v_aturkls',$data);
		$this->load->view('footer');
		
	}
	public function edit($id_kls)
	{
		$where = array('id_kls' => $id_kls);
		$data['u'] = $this->m->edit_data($where,'kelas')->result();
		$this->load->view('header');
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
		
		$this->m->update_data($where,$data,'kelas');
		redirect('kls/show_kls');
	}

	public function tambah(){
		$this->load->view('header');
		$this->load->view('v_tambahkls');
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$nama_kls = $this->input->post('nama_kls');
		$ket = $this->input->post('ket');
 
		$data = array(
			'nama_kls' => $nama_kls,
			'ket' => $ket
			);
		$this->m->input_data($data,'kelas');
		redirect('kls/show_kls');
	}
	public function hapus($id_kls){
		$where = array('id_kls' => $id_kls);
		$this->m->hapus_data($where,'kelas');
		redirect('kls/show_kls');
	}
}
