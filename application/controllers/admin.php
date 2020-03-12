<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
		parent::__construct();		
		$this->load->model('m_admin');
		$this->load->model('m');
 
	}
	public function atur()
	{
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$data['u']=$this->m_admin->adminprodi($prodi);
			$this->load->view('header2');
		}
		else{
			$data['u']=$this->m_admin->admin();
			$this->load->view('header');
		}
		$this->load->view('v_admin',$data);
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('v_login');
	}
	
    function aksi_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$cek = $this->m_admin->cek($username, $password);
		//var_dump($cek);die;
		if(!empty($cek)){
			if(!empty($cek[0]->id_prodi)){
				$data_session = array(
					'nama' => $username,
					'id_prodi' => $cek[0]->id_prodi,
					'nama_prodi' => $cek[0]->nama_prodi,
					'status' => "login"
					);
				$this->session->set_userdata($data_session);
				redirect(site_url("dashboard/prodi"));
			}
			else{
				$data_session = array(
					'nama' => $username,
					'id_prodi' => $cek[0]->id_prodi,
					'status' => "login"
					);
				$this->session->set_userdata($data_session);
				redirect(site_url("dashboard/admin"));
			}
		}
		else{
			$this->session->set_flashdata('err', "Username atau Password Salah");
			redirect('admin/login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('admin/login'));
	}

	public function tambah(){
		$prodi=$this->session->userdata('id_prodi');

		if(!empty($prodi)){
			$this->load->view('header2');	
			$this->load->view('v_tambahadmin');
		}
		else{
			$data['dd']=$this->m_admin->ddprodi();
			$this->load->view('header');
			$this->load->view('v_tambahadmin',$data);	
		}
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$prodi = $this->session->userdata('id_prodi');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(!empty($prodi)){
			$id_prodi = $prodi;
		}
		$id_prodi = $this->input->post('id_prodi');
 
		$data = array(
			'username' => $username,
			'password' => md5($password),
			'id_prodi' => $id_prodi
			);
		$res = $this->m_admin->input_data($data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
			redirect('admin/atur');	
		}
		else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data"); 
			redirect('admin/atur');	
		}
	}
	public function edit($id_admin)
	{
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$data['u'] = $this->m_admin->edit_data($id_admin);
			$this->load->view('header2');
		}
		else{
			$data['dd'] = $this->m_admin->ddprodi();
			$data['u'] = $this->m_admin->edit_data($id_admin);
			$this->load->view('header');	
		}
		$this->load->view('v_editadmin',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$prodi=$this->session->userdata('id_prodi');

		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(!empty($prodi)){
			$id_prodi = $prodi;
		}
		$id_prodi = $this->input->post('id_prodi');
		
		$data = array(
			'username' => $username,
			'password' => md5($password),
			'id_prodi' => $id_prodi
		);
	
		$where = array('id_admin' => $id_admin);
		
		$res = $this->m->update_data($where,$data,'admin');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Data"); 
			redirect('admin/atur');	
		}
		else{
			$this->session->set_flashdata('err', "Gagal Mengubah Data"); 
			redirect('admin/atur');
		}
	}
	public function hapus($id_admin)
	{
		$where = array('id_admin' => $id_admin);
		$res=$this->m->hapus_data($where,'admin');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Admin"); 
			redirect('admin/atur');	
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Admin");
			redirect('admin/atur');	
		}
	}
}