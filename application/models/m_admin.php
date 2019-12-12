<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	public function tampiladmin(){
        $this->db->select('admin.id_admin, admin.username, admin.id_prodi, prodi.nama_prodi');
		$this->db->from('admin')->join('prodi','prodi.id_prodi=admin.id_prodi')->where('admin.del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
	public function ddprodi(){
        $this->db->select('*');
		$this->db->from('prodi')->where('del',NULL);
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
			$data['del']=NULL;
			$this->db->where('username',$data['username']);
			$this->db->update('admin',$data);
			return false;
		}
	}
	public function edit_data($id_admin){
		$this->db->select('admin.id_admin, admin.username, admin.id_prodi, prodi.nama_prodi')
		->from('admin')->join('prodi','prodi.id_prodi=admin.id_prodi')
		->where('admin.id_admin',$id_admin);
		$query = $this->db->get();
		return $query->result ();
	}
}