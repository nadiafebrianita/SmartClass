<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model {
	public function show_matkul(){
        $this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->order_by("matkul.kode_matkul", "asc");
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	
	public function dropdown()
	{
		$query = $this->db->get('prodi');
		return $query;
	}

	public function search($keyword){
		$this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->like('matkul.kode_matkul', $keyword);
		$this->db->or_like('matkul.nama_matkul', $keyword);
		$this->db->or_like('prodi.nama_prodi', $keyword);
		$query = $this->db->get();
		return $query->result ();
	  }
}