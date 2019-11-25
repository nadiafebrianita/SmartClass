<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensimhs extends CI_Model {
	public function show_presensimhs(){
        $this->db->select('matkul.nama_matkul, mhs.nama_mhs, presensi.waktu');
		$this->db->from('mhs');
		$this->db->join('presensi', 'mhs.id_mhs=presensi.id_mhs');
		$this->db->join('jadwal', 'jadwal.id_jadwal=presensi.id_jadwal');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul');
		$query = $this->db->get();
		return $query->result ();
	}
	public function show(){
		$this->db->select('*');
		$this->db->from('viewpresensi');
		$query = $this->db->get();
		return $query->result ();
	}
}



		