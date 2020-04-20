<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{	
	public function cek($username, $password){
		$this->db->select('*')
		->from('admin')
		->where('username',$username)
		->where('password', $password);
		$all=$this->db->get()->result();
		if(!empty($all[0]->id_prodi)){
			$this->db->select('admin.username, admin.password, admin.id_prodi, prodi.nama_prodi');
			$this->db->from('admin')->join('prodi','admin.id_prodi=prodi.id_prodi')->where('username',$username)->where('password', $password);
			$query = $this->db->get();
			return $query->result ();
		}
		else{
			return $all;
		}
	}	
	public function admin(){
        $this->db->select('admin.id_admin, admin.username, admin.id_prodi, prodi.nama_prodi')
		->from('admin')->join('prodi','prodi.id_prodi=admin.id_prodi','left');
		$query = $this->db->get();
		return $query->result ();
	}
	public function adminprodi($prodi){
        $this->db->select('admin.id_admin, admin.username, admin.id_prodi, prodi.id_prodi, prodi.nama_prodi');
		$this->db->from('admin')->join('prodi','prodi.id_prodi=admin.id_prodi')->where('prodi.id_prodi',$prodi);
		$query = $this->db->get();
		return $query->result ();
	}
	public function ddprodi(){
        $this->db->select('*');
		$this->db->from('prodi');
		$query = $this->db->get();
		return $query;
	}
	public function input_data($data){
		$this->db->select('*')->from('admin')->where('username',$data['username']);
		$query = $this->db->get()->result ();
		if(empty($query)){
			$this->db->insert('admin', $data);
			return true;
		}
		else{
			return false;
		}
	}
	public function edit_data($id_admin){
		$this->db->select('admin.id_admin, admin.username, admin.id_prodi, prodi.nama_prodi')
		->from('admin')->join('prodi','prodi.id_prodi=admin.id_prodi','left')
		->where('admin.id_admin',$id_admin);
		$query = $this->db->get();
		return $query->result ();
	}
}