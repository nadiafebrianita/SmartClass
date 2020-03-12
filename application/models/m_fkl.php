<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fkl extends CI_Model {
	public function tampil(){
        $this->db->select('*')
		->from('fakultas');
		$query = $this->db->get();
		return $query->result ();
	}
	public function cek($data){
		$ceknama = $data['nama_fakultas'];
		$sql = "SELECT * FROM fakultas WHERE nama_fakultas = '$ceknama'";
		$query=$this->db->query($sql);
		$db = $query->result();
		if(empty($db)){
			return true;
		}
	}
}