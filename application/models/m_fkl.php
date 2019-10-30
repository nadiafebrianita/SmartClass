<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fkl extends CI_Model {
	public function tampil(){
        $this->db->select('*');
		$this->db->from('fakultas');
		$query = $this->db->get();
		return $query->result ();
	}
}