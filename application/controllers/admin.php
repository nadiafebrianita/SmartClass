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
		$this->load->view('header');
		$data['u']=$this->m_admin->tampiladmin();
		$this->load->view('v_admin',$data);
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('v_login');
    }
    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_admin->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(site_url("dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('admin/login'));
	}

	public function tambah(){
		$data['dd']=$this->m_admin->ddprodi();
		$this->load->view('header');
		$this->load->view('v_tambahadmin',$data);
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_prodi = $this->input->post('id_prodi');
 
		$data = array(
			'username' => $username,
			'password' => md5($password),
			'id_prodi' => $id_prodi,
			'del' => NULL
			);
		$res = $this->m_admin->input_data($data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
			redirect('admin/atur');
		}
		else{
			$this->session->set_flashdata('info', "Data Admin $username Berhasil Dipulihkan"); 
			redirect('admin/atur');
		}
	}
	public function edit($id_admin)
	{
		//$where = array('id_admin' => $id_admin);
		$data['dd'] = $this->m_admin->ddprodi();
		$data['u'] = $this->m_admin->edit_data($id_admin);
		$this->load->view('header');
		$this->load->view('v_editadmin',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_prodi = $this->input->post('id_prodi');
		
		$data = array(
			'username' => $username,
			'password' => md5($password),
			'id_prodi' => $id_prodi
		);
	
		$where = array('id_admin' => $id_admin);
		
		$this->m->update_data($where,$data,'admin');
		redirect('admin/login');
	}
	public function hapus($id_admin)
	{
		// date_default_timezone_set('UTC');
		// $del = date("l , j F Y");
		var_dump($id_admin);die;
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_admin' => $id_admin);
        $res = $this->m->update_data($where,$data,'admin');
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