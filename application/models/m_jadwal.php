<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
	public function show_jadwal(){
        $this->db->select('jadwal.id_jadwal, smt.nama_smt, smt.status, jadwal.hari, jadwal.waktu, matkul.nama_matkul, dosen.nama_dosen, kelas.nama_kls');
		$this->db->from('smt');
		$this->db->join('jadwal', 'smt.id_smt=jadwal.id_smt');
		$this->db->join('kelas', 'kelas.id_kls=jadwal.id_kls');
		$this->db->join('matkul', 'jadwal.id_matkul=matkul.id_matkul');
		$this->db->join('dosen', 'jadwal.id_dosen=dosen.id_dosen');
		$this->db->order_by("jadwal.hari", "desc");
		$this->db->order_by("jadwal.waktu", "asc");
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
		$query = $this->db->get('dosen');
		return $query;
	}
	public function ddkelas()
	{
		$query = $this->db->get('kelas');
		return $query;
	}
}