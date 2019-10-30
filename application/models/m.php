<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Model {
	public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}