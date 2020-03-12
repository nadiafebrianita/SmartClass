<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kls extends CI_Model {
	public function kls(){
        $this->db->select('*');
		$this->db->from('kelas')->order_by("nama_kls", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function klsprodi($prodi){
        $this->db->select('*');
		$this->db->from('kelas')->order_by("nama_kls", "asc")->where('id_prodi',$prodi);
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get('prodi');
		return $query;
	}
	public function ddsn()
	{
		$sql = "SELECT sn FROM att_log GROUP BY sn";
		$query=$this->db->query($sql);
		return $query;
	}
	public function edit_data($id_kls){		
		$this->db->select('kelas.id_kls, kelas.nama_kls, kelas.sn, kelas.ket, prodi.id_prodi, prodi.nama_prodi')
		->from('kelas')
		->join('prodi','prodi.id_prodi=kelas.id_prodi')
		->where('kelas.id_kls',$id_kls);
		$query = $this->db->get();
		return $query->result ();
	}

	public function input_data($data){
		$this->db->select('*')
		->from('kelas')
		->where('sn',$data['sn'])
		->where('nama_kls',$data['nama_kls'])
		->where('id_prodi',$data['id_prodi']);
		$query = $this->db->get()->result();
		if(empty($query)){
			$this->db->insert('kelas', $data);
			return true;
		}
		else{
			return false;
		}
	}
}