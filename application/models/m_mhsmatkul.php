<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhsmatkul extends CI_Model {
	public function show_mhsmatkul(){
        $this->db->select('mhsmatkul.id_mhsmatkul, mhs.nama_mhs, matkul.nama_matkul');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.id_mhs=mhsmatkul.id_mhs');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('matkul', 'jadwal.id_matkul=matkul.id_matkul');
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get('mhsmatkul');
		return $query;
	}
}
		