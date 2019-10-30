<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kls extends CI_Model {
	public function tampilkls(){
        $this->db->select('*');
		$this->db->from('kelas');
		$query = $this->db->get();
		return $query->result ();
	}
}