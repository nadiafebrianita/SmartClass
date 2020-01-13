<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	public function jadwal(){
		$sql = "SELECT prodi.nama_prodi, jadwal.hari,jadwal.waktu, jadwal.akhir, matkul.nama_matkul, u.alias dosen1, s.alias dosen2, kelas.nama_kls
		FROM jadwal
		JOIN kelas ON kelas.id_kls=jadwal.id_kls 
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul 
		JOIN prodi ON prodi.id_prodi=matkul.id_prodi 
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE (jadwal.waktu < jadwal.akhir AND NOW() BETWEEN jadwal.waktu AND jadwal.akhir AND jadwal.hari = DAYNAME(NOW()))";
        $query=$this->db->query($sql);
		//$query = $this->db->get();
		return $query->result ();
	}
	public function jadwalprodi($prodi){
		$sql = "SELECT prodi.nama_prodi, jadwal.hari,jadwal.waktu, jadwal.akhir, matkul.nama_matkul, u.alias dosen1, s.alias dosen2, kelas.nama_kls
		FROM jadwal
		JOIN kelas ON kelas.id_kls=jadwal.id_kls 
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul 
		JOIN prodi ON prodi.id_prodi=matkul.id_prodi 
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE prodi.id_prodi=$prodi and (jadwal.waktu < jadwal.akhir AND NOW() BETWEEN jadwal.waktu AND jadwal.akhir AND jadwal.hari = DAYNAME(NOW()))";
        $query=$this->db->query($sql);
		//$query = $this->db->get();
		return $query->result ();
	}
	public function matkul(){
		$this->db->select("*")->from("matkul")->where("del",NULL);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function matkulprodi($prodi){
		$this->db->select("*")->from("matkul")->where("del",NULL)->where("id_prodi",$prodi);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function smt(){
		$this->db->select("*")->from("smt")->where("status","Aktif");
		$query = $this->db->get();
		return $query->result ();
	}
	public function kls(){
		$this->db->select("*")->from("kelas")->where("del",NULL);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function mhsmatkul(){
		$this->db->select("*")->from("mhsmatkul")->where("del",NULL);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function mhsmatkulprodi($prodi){
		$this->db->select("*")->from("mhsmatkul")
		->join("jadwal", "mhsmatkul.id_jadwal=jadwal.id_jadwal")
		->join("matkul", "matkul.id_matkul=jadwal.id_matkul")
		->where("mhsmatkul.del",NULL)->where("jadwal.del",NULL)->where("matkul.del",NULL)->where("matkul.id_prodi",$prodi);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function prodi(){
		$this->db->select("*")->from("prodi")->where("del",NULL);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function fkl(){
		$this->db->select("*")->from("fakultas")->where("del",NULL);
		$query = $this->db->count_all_results();
		return $query;
	}
	
}