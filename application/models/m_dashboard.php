<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	public function jadwal(){
		$sql = "SELECT prodi.nama_prodi, jadwal.hari,jadwal.waktu, jadwal.akhir, matkul.nama_matkul, u.alias dosen1, s.alias dosen2, kelas.nama_kls
		FROM jadwal
		JOIN kelas ON kelas.id_kls=jadwal.id_kls 
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul 
		JOIN prodi ON prodi.id_prodi=matkul.id_prodi 
		JOIN smt ON smt.id_smt=jadwal.id_smt 
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE smt.status='Aktif' and (jadwal.waktu < jadwal.akhir AND NOW() BETWEEN jadwal.waktu AND jadwal.akhir AND jadwal.hari = DAYNAME(NOW()))";
        $query=$this->db->query($sql);
		return $query->result ();
	}
	public function jadwalprodi($prodi){
		$sql = "SELECT prodi.nama_prodi, jadwal.hari,jadwal.waktu, jadwal.akhir, matkul.nama_matkul, u.alias dosen1, s.alias dosen2, kelas.nama_kls
		FROM jadwal
		JOIN smt ON smt.id_smt=jadwal.id_smt 
		JOIN kelas ON kelas.id_kls=jadwal.id_kls 
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul 
		JOIN prodi ON prodi.id_prodi=matkul.id_prodi 
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE smt.status='Aktif' and prodi.id_prodi=$prodi and (jadwal.waktu < jadwal.akhir AND NOW() BETWEEN jadwal.waktu AND jadwal.akhir AND jadwal.hari = DAYNAME(NOW()))";
        $query=$this->db->query($sql);
		//$query = $this->db->get();
		return $query->result ();
	}
	public function matkul(){
		$this->db->select("*")->from("matkul");
		$query = $this->db->count_all_results();
		return $query;
	}
	public function matkulprodi($prodi){
		$this->db->select("*")->from("matkul")->where("id_prodi",$prodi);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function smt(){
		$this->db->select("*")->from("smt")->where("status","Aktif");
		$query = $this->db->get();
		return $query->result ();
	}
	public function kls(){
		$this->db->select("*")->from("kelas");
		$query = $this->db->count_all_results();
		return $query;
	}
	public function mhsmatkul(){
		$this->db->select("*")
		->from("mhsmatkul")
		->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal')
		->join('smt', 'jadwal.id_smt=smt.id_smt')
		->where("smt.status",'Aktif');
		$query = $this->db->count_all_results();
		return $query;
	}
	public function mhsmatkulprodi($prodi){
		$this->db->select("*")->from("mhsmatkul")
		->join("jadwal", "mhsmatkul.id_jadwal=jadwal.id_jadwal")
		->join("matkul", "matkul.id_matkul=jadwal.id_matkul")
		->where("matkul.id_prodi",$prodi);
		$query = $this->db->count_all_results();
		return $query;
	}
	public function prodi(){
		$this->db->select("*")->from("prodi");
		$query = $this->db->count_all_results();
		return $query;
	}
	public function fkl(){
		$this->db->select("*")->from("fakultas");
		$query = $this->db->count_all_results();
		return $query;
	}
	
}