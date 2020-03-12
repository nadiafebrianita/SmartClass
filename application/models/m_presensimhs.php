<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensimhs extends CI_Model {
	public function show(){
		$this->db->select('*');
		$this->db->from('presensi_mhs');
		$query = $this->db->get();
		return $query->result ();
	}
	public function matkul($id_matkul){
		// var_dump($id_matkul);die;
		if(!empty($id_matkul)){
			$sql = "SELECT nim, nama_mhs, id_matkul, nama_matkul, COUNT(IF(id_matkul = '$id_matkul', id_matkul, NULL)) as presensi 
			FROM presensi_mhs WHERE id_matkul = '$id_matkul' GROUP BY nama_mhs";
			$query=$this->db->query($sql);
			return $query->result ();	
		}
	}
	public function ddmatkul($id_prodi)
	{
		$sql = "SELECT id_matkul, nama_matkul
		FROM presensi_mhs WHERE id_prodi = '$id_prodi' GROUP BY id_matkul";
		$query=$this->db->query($sql);
		return $query;
	}
	public function showprodi($prodi){
		$this->db->select('*')
		->from('presensi_mhs')
		->where('nama_prodi',$prodi)
		->order_by("nama_matkul", "asc");
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
		$sql = "SELECT id_prodi, nama_prodi
		FROM presensi_mhs GROUP BY id_prodi";
		$query=$this->db->query($sql);
		return $query;
	}
}



		