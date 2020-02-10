<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kls extends CI_Model {
	public function kls(){
        $this->db->select('*');
		$this->db->from('kelas')->order_by("nama_kls", "asc")->where('del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
	public function klsprodi($prodi){
        $this->db->select('*');
		$this->db->from('kelas')->order_by("nama_kls", "asc")->where('id_prodi',$prodi)->where('del',NULL);
		$query = $this->db->get();
		return $query->result ();
	}
	public function dd()
	{
		$query = $this->db->get_where('prodi',array('del' => NULL));
		return $query;
	}
	public function ddprodi($prodi)
	{
		$query = $this->db->get_where('prodi',array('id_prodi' => $prodi ,'del' => NULL));
		return $query;
	}
}