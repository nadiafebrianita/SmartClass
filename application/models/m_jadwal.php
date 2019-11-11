<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
	public function show_jadwal(){
        $this->db->select('jadwal.id_jadwal, smt.nama_smt, smt.status, jadwal.hari, jadwal.waktu, jadwal.akhir, jadwal.id_dosen2, matkul.nama_matkul, kelas.nama_kls, u.alias');
		$this->db->from('smt');
		$this->db->join('jadwal', 'smt.id_smt=jadwal.id_smt');
		$this->db->join('kelas', 'kelas.id_kls=jadwal.id_kls');
		$this->db->join('matkul', 'jadwal.id_matkul=matkul.id_matkul');
		$this->db->join('dosen a', 'jadwal.id_dosen=a.id_dosen', 'jadwal.id_dosen2=a.id_dosen');
		$this->db->join('user_scan u', 'u.id_scan=a.id_scan')->where('jadwal.del',NULL);
		$this->db->order_by("jadwal.hari", "desc");
		$this->db->order_by("jadwal.waktu", "asc");
		$this->db->order_by("kelas.nama_kls", "asc");
		$this->db->where("smt.status", "Aktif");
		$query = $this->db->get();
		return $query->result ();
	}
	public function ddsmt()
	{
		$query = $this->db->get_where('smt', array('status' => "aktif"));
		return $query;
	}
	public function ddmatkul()
	{
		$this->db->order_by("nama_matkul", "asc");
		$query = $this->db->get('matkul');
		return $query;
	}
	public function dddosen()
	{
		$this->db->select('dosen.id_dosen,dosen.nama_dosen,user_scan.id_scan,user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'user_scan.id_scan=dosen.id_scan');
		$this->db->order_by("user_scan.alias", "asc");
		$query = $this->db->get();
		return $query;
	}
	public function ddkelas()
	{
		$query = $this->db->get('kelas');
		return $query;
	}
}