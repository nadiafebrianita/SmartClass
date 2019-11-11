<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fkl extends CI_Model {
	public function tampil(){
        $this->db->select('*');
		$this->db->from('fakultas')->where('del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
}