<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	public function show_dashboard(){
        $this->db->select('nama_dosen, nip, nidn, scan_dosen');
		$this->db->from('dosen');
		$query = $this->db->get();
		return $query->result ();
    }
}