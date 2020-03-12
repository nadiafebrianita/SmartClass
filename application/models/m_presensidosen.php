<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensidosen extends CI_Model {
	public function show(){
		$this->db->select('*');
		$this->db->from('presensi_dosen');
		$query = $this->db->get();
		return $query->result ();
	}
	public function showprodi($prodi){
		$this->db->select('*')
		->from('presensi_dosen')
		->where('nama_prodi',$prodi);
		$query = $this->db->get();
		return $query->result ();
	}
	public function selected($id_prodi){
		$this->db->select('*');
		$this->db->from('presensi_dosen')->where('id_prodi',$id_prodi);
		$query = $this->db->get();
		return $query->result ();
	}
	public function ddprodi()
	{
		$sql = "SELECT id_prodi, nama_prodi
		FROM presensi_mhs GROUP BY id_prodi";
		$query=$this->db->query($sql);
		return $query;
	}
}



		