<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {
	public function show_dosen(){
        $this->db->select('dosen.id_dosen, dosen.nama_dosen, dosen.nip, dosen.nidn, user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'dosen.id_scan=user_scan.id_scan', 'left');
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get('user_scan');
		return $query;
	}
	//COBA//
	public function edit_data($where,$table){		
		$this->db->select('dosen.id_dosen, dosen.nama_dosen, dosen.nip, dosen.nidn, user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'dosen.id_scan=user_scan.id_scan');

		return $this->db->get_where($table,$where);
	}
	public function insert($data, $datascan)
	{
		$this->db->trans_start();
		$this->db->insert('user_scan', $datascan); 
		$id_scan = $this->db->insert_id(); 

		//$this->db->where('no_koor',$no_koor);
		$data['id_scan'] = $id_scan;
		$this->db->insert('dosen', $data);

		$this->db->trans_complete(); 

		return $this->db->insert_id(); 
	}
}