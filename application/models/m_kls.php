<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kls extends CI_Model {
	public function tampilkls(){
        $this->db->select('*');
		$this->db->from('kelas')->order_by("nama_kls", "asc")->where('del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
}