<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {
	public function show_dosen(){
        $this->db->select('dosen.id_dosen, dosen.nama_dosen, dosen.nip, dosen.nidn, user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'dosen.id_scan=user_scan.id_scan', 'left')->where('dosen.del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get('user_scan');
		return $query;
	}
	public function edit_data($where){		
		$this->db->select('user_scan.id_scan, user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'dosen.id_scan=user_scan.id_scan')->where($where);

		return $this->db->get();
	}
	public function insert($data, $datascan)
	{
		$this->db->trans_start();
		$this->db->insert('user_scan', $datascan); 
		$id_scan = $this->db->insert_id(); 

		$data['id_scan'] = $id_scan;
		$this->db->insert('dosen', $data);

		$this->db->trans_complete(); 

		return $this->db->insert_id(); 
	}
}