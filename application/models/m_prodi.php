<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prodi extends CI_Model {
	public function tampil(){
        $this->db->select('prodi.id_prodi, prodi.nama_prodi, fakultas.nama_fakultas, fakultas.del');
		$this->db->from('prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas')->where('prodi.del',NULL)->where('fakultas.del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get('fakultas');
		return $query;
	}
}