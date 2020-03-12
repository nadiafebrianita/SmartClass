<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prodi extends CI_Model {
	public function tampil(){
        $this->db->select('prodi.id_prodi, prodi.nama_prodi, fakultas.nama_fakultas');
		$this->db->from('prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get('fakultas');
		return $query;
	}
	public function input_data($data){
		$this->db->select('*')
		->from('prodi')
		->where('nama_prodi',$data['nama_prodi'])
		->where('id_fakultas',$data['id_fakultas']);
		$query = $this->db->get()->result();
		if(empty($query)){
			$this->db->insert('prodi', $data);
			return true;
		}
		else{
			return false;
		}
	}
	public function edit_data($id_prodi){		
		$this->db->select('prodi.id_prodi, prodi.nama_prodi, fakultas.id_fakultas, fakultas.nama_fakultas')
		->from('prodi')
		->join('fakultas','prodi.id_fakultas=fakultas.id_fakultas')
		->where('prodi.id_prodi',$id_prodi);
		$query = $this->db->get();
		return $query->result ();
	}

}