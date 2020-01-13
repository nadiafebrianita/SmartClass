<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensimhs extends CI_Model {
	public function show(){
		$this->db->select('*');
		$this->db->from('presensi_mhs');
		$query = $this->db->get();
		return $query->result ();
	}
	public function showprodi($prodi){
		$this->db->select('*')
		->from('presensi_mhs')
		->where('nama_prodi',$prodi);
		$query = $this->db->get();
		return $query->result ();
	}
	public function selected($id_prodi){
		$this->db->select('*');
		$this->db->from('presensi_mhs')->where('id_prodi',$id_prodi);
		$query = $this->db->get();
		return $query->result ();
	}
	public function ddprodi()
	{
		$query = $this->db->get('prodi');
		return $query;
	}
}



		