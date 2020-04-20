<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensimhs extends CI_Model {
	public function show(){
		$sql = "SELECT * FROM presensi_mhs 
		JOIN jadwal ON presensi_mhs.id_matkul = jadwal.id_matkul
		JOIN smt ON jadwal.id_smt = smt.id_smt
		WHERE smt.status = 'Aktif'
		GROUP BY nama_mhs,nama_matkul
		ORDER BY nim,nama_matkul";
		$query=$this->db->query($sql);
		return $query->result ();	
	}
	public function matkul($id_matkul,$id_prodi){
		if(!empty($id_matkul)){
			$sql = "SELECT p.nim, p.nama_mhs, p.id_matkul, p.nama_matkul, p.id_prodi, COUNT(IF(p.id_matkul = '$id_matkul', p.id_matkul, NULL)) as presensi 
			FROM presensi_mhs as p
			JOIN jadwal ON p.id_matkul = jadwal.id_matkul
			JOIN smt ON jadwal.id_smt = smt.id_smt
			WHERE smt.status = 'Aktif' and p.id_matkul = '$id_matkul' and p.id_prodi = '$id_prodi' 
			GROUP BY nama_mhs 
			ORDER BY nim";
		}
		else{
			$sql = "SELECT nim, nama_mhs, p.id_matkul, nama_matkul, p.id_prodi, COUNT(*) as presensi 
			FROM presensi_mhs as p
			JOIN jadwal ON p.id_matkul = jadwal.id_matkul
			JOIN smt ON jadwal.id_smt = smt.id_smt
			WHERE smt.status = 'Aktif' and p.id_prodi = '$id_prodi' 
			GROUP BY nama_mhs,nama_matkul 
			ORDER BY nim,nama_matkul";
		}
		$query=$this->db->query($sql);
		return $query->result ();	
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



		