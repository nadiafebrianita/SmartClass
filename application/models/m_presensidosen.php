<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensidosen extends CI_Model {
	public function show(){
		$sql = "SELECT id_dosen, nama_dosen, kode_matkul, nama_matkul, hari_scan, tanggal_scan, MIN(waktu_scan) AS waktus, hari, waktu, akhir, nama_prodi
		FROM presensi_dosen
		GROUP BY nama_matkul, tanggal_scan
        ORDER BY tanggal_scan DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function showprodi($id_prodi,$id_matkul){
		if(!empty($id_matkul)){
			$sql = "SELECT id_dosen, nama_dosen, kode_matkul, nama_matkul, hari_scan, tanggal_scan, MIN(waktu_scan) AS waktus, hari, waktu, akhir, id_prodi, nama_prodi
			FROM presensi_dosen
			WHERE id_prodi = '$id_prodi' and id_matkul = '$id_matkul'
			GROUP BY nama_matkul, tanggal_scan
			ORDER BY tanggal_scan DESC";	
		}
		else{
			$sql = "SELECT id_dosen, nama_dosen, kode_matkul, nama_matkul, hari_scan, tanggal_scan, MIN(waktu_scan) AS waktus, hari, waktu, akhir, id_prodi, nama_prodi
			FROM presensi_dosen
			WHERE id_prodi = '$id_prodi'
			GROUP BY nama_matkul, tanggal_scan
			ORDER BY tanggal_scan DESC";	
		}
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function ddprodi()
	{
		$sql = "SELECT id_prodi, nama_prodi
		FROM presensi_dosen GROUP BY id_prodi";
		$query=$this->db->query($sql);
		return $query;
	}
	public function ddmatkul($id_prodi)
	{
		$sql = "SELECT id_matkul, nama_matkul
		FROM presensi_dosen WHERE id_prodi = '$id_prodi' GROUP BY id_matkul";
		$query=$this->db->query($sql);
		return $query;
	}
}