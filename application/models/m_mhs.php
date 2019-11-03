<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {
	public function show_mhs(){
        $this->db->select('mhs.id_mhs, mhs.nama_mhs, mhs.nim, user_scan.alias');
		$this->db->from('mhs');
		$this->db->join('user_scan', 'user_scan.id_scan=mhs.id_scan');
		$this->db->order_by("nim", "asc");
		$this->db->order_by("nama_mhs", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function edit_data($where){		
		$this->db->select('user_scan.id_scan, user_scan.alias');
		$this->db->from('mhs');
		$this->db->join('user_scan', 'mhs.id_scan=user_scan.id_scan')->where($where);

		return $this->db->get();
	}
	public function insert($data, $datascan)
	{
		$this->db->trans_start();
		$this->db->insert('user_scan', $datascan); 
		$id_scan = $this->db->insert_id(); 

		$data['id_scan'] = $id_scan;
		$this->db->insert('mhs', $data);

		$this->db->trans_complete(); 

		return $this->db->insert_id(); 
	}
}