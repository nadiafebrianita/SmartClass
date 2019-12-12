<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_smt extends CI_Model {
	public function tampil(){
        $this->db->select('*');
		$this->db->from('smt')->where('del',NULL);
		$this->db->order_by("tahun", "desc");
		$this->db->order_by("nama_smt", "desc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function a(){
		$query = $this->db->get_where('smt', array('status' => "Aktif"));
		return $query;
	}
	public function dd()
	{
		$query = $this->db->get('smt');
		return $query;
	}
	public function input_data($data){
		$this->db->select('*');
		$this->db->from('smt')->where('nama_smt',$data['nama_smt'])->where('tahun',$data['tahun']);
		$db = $this->db->get()->result();
		if(empty($db)){
			$this->db->insert('smt', $data);
			return true;
		}
	}
	public function update_data($data,$table){
		$this->db->update($table,$data);
	}
	public function edit_data($id_smt){		
		$sql = "SELECT * FROM smt
		WHERE id_smt = $id_smt";
        $query=$this->db->query($sql);
		return $query->result ();
	}
}