<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
	public function show_jadwal(){
        $sql = "SELECT jadwal.id_jadwal, smt.nama_smt, smt.status, smt.del, jadwal.hari, jadwal.waktu, jadwal.akhir, matkul.nama_matkul, matkul.del, kelas.nama_kls, kelas.del, a.del, jadwal.id_dosen, u.alias dosen1, s.alias dosen2, prodi.del, fakultas.del
		FROM smt
		JOIN jadwal ON smt.id_smt=jadwal.id_smt
		JOIN kelas ON kelas.id_kls=jadwal.id_kls
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul
		JOIN prodi ON matkul.id_prodi=prodi.id_prodi
		JOIN fakultas ON fakultas.id_fakultas=prodi.id_fakultas
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE jadwal.del is null and a.del is NULL and smt.del is NULL and matkul.del is NULL and kelas.del is NULL and prodi.del is NULL and fakultas.del is NULL and smt.status='Aktif'
		ORDER BY FIELD(jadwal.hari, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'), jadwal.waktu asc, kelas.nama_kls asc";
        $query=$this->db->query($sql);
		return $query->result ();
	}
	public function selected($id_prodi){
        $sql = "SELECT jadwal.id_jadwal, smt.nama_smt, smt.status, smt.del, jadwal.hari, jadwal.waktu, jadwal.akhir, matkul.nama_matkul, matkul.del, kelas.nama_kls, kelas.del, a.del, jadwal.id_dosen, u.alias dosen1, s.alias dosen2, prodi.del, prodi.nama_prodi, fakultas.del
		FROM smt
		JOIN jadwal ON smt.id_smt=jadwal.id_smt
		JOIN kelas ON kelas.id_kls=jadwal.id_kls
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul
		JOIN prodi ON matkul.id_prodi=prodi.id_prodi
		JOIN fakultas ON fakultas.id_fakultas=prodi.id_fakultas
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE prodi.id_prodi = ".$id_prodi." and jadwal.del is null and a.del is NULL and smt.del is NULL and matkul.del is NULL and kelas.del is NULL and prodi.del is NULL and fakultas.del is NULL and smt.status='Aktif'
		ORDER BY FIELD(jadwal.hari, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'), jadwal.waktu asc, kelas.nama_kls asc";
        $query=$this->db->query($sql);
		return $query->result ();
	}
	public function ddsmt()
	{
		$query = $this->db->get_where('smt', array('status' => "aktif"));
		return $query;
	}
	public function ddmatkul()
	{
		$this->db->order_by("nama_matkul", "asc");
		$query = $this->db->get('matkul');
		return $query;
	}
	public function dddosen()
	{
		$this->db->select('dosen.id_dosen,dosen.nama_dosen,user_scan.id_scan,user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'user_scan.id_scan=dosen.id_scan');
		$this->db->order_by("user_scan.alias", "asc");
		$query = $this->db->get();
		return $query;
	}
	public function ddkelas()
	{
		$query = $this->db->get('kelas');
		return $query;
	}
	public function ddprodi()
	{
		$query = $this->db->get('prodi');
		return $query;
	}
	public function insert_multiple($datasmt,$datamatkul,$datadosen1,$datadosen2,$datakls,$data)
	{
		$this->db->trans_start();
		for($i = 0; $i < count($datamatkul); $i++){
			//cek smt
			$ceksmt = strtolower("Aktif");
			$this->db->select('id_smt, status')->from('smt')->where('status',$ceksmt);
			$smt=$this->db->get()->result();
			//cek matkul
			$cekmatkul = strtolower($datamatkul[$i]['nama_matkul']);
			$this->db->select('id_matkul, nama_matkul')->from('matkul')->where('nama_matkul',$cekmatkul);
			$matkul=$this->db->get()->result();
			$dbmatkul = strtolower($matkul[0]->nama_matkul);
			//cek dosen1
			$cekdosen = strtolower($datadosen1[$i]['alias']);
			$this->db->select('user_scan.alias, dosen.id_scan, dosen.id_dosen')->from('user_scan')->join('dosen','user_scan.id_scan=dosen.id_scan')
			->where('alias',$cekdosen);
			$dosen=$this->db->get()->result();
			$dbdosen = strtolower($dosen[0]->alias);
			//cek kelas
			$cekkls = strtolower($datakls[$i]['nama_kls']);
			$this->db->select('id_kls, nama_kls')->from('kelas')->where('nama_kls',$cekkls);
			$kls=$this->db->get()->result();
			$dbkls = strtolower($kls[0]->nama_kls);
			//cek dosen2
			$cekdosen2 = strtolower($datadosen2[$i]['alias']);
			$this->db->select('user_scan.alias, dosen.id_scan, dosen.id_dosen')->from('user_scan')->join('dosen','user_scan.id_scan=dosen.id_scan')
			->where('alias',$cekdosen2);
			$dosen2=$this->db->get()->result();
			
			if(!empty($dosen2)){
				$dbdosen2 = strtolower($dosen2[0]->alias);
				if(!empty($smt) && !empty($matkul) && $dbmatkul==$cekmatkul && !empty($dosen) && $dbdosen==$cekdosen && !empty($dosen2) && $dbdosen2==$cekdosen2 && !empty($kls) && $dbkls==$cekkls){
					$id_smt = $smt[0]->id_smt;
					$data[$i]['id_smt'] = $id_smt;
					$id_matkul = $matkul[0]->id_matkul;
					$data[$i]['id_matkul'] = $id_matkul;
					$id_dosen = $dosen[0]->id_dosen;
					$data[$i]['id_dosen'] = $id_dosen;
					$id_dosen2 = $dosen2[0]->id_dosen;
					$data[$i]['id_dosen2'] = $id_dosen2;
					$id_kls = $kls[0]->id_kls;
					$data[$i]['id_kls'] = $id_kls;
					
					// $sql = "SELECT * FROM JADWAL WHERE waktu <= '$cekwkt' and akhir >= '$cekwkt' and id_kls = $datakls[$i]['nama_kls'] and hari = '$cekhari'";
					// $query=$this->db->query($sql);
					// $db = $query->result();
		

					$this->db->select('*')->from('jadwal')->where('hari',$data[$i]['hari'])->where('waktu'<=$data[$i]['waktu'])
					->where('akhir'>=$data[$i]['akhir'])->where('id_kls',$id_kls)->where('id_smt',$id_smt);
					$ada=$this->db->get()->result();
					if(empty($ada)){
						$this->db->insert('jadwal', $data[$i]);
						// $n++;
						// return $n;
					}			
				}
			}
			else {
				if(!empty($smt) && !empty($matkul) && $dbmatkul==$cekmatkul && !empty($dosen) && $dbdosen==$cekdosen && !empty($kls) && $dbkls==$cekkls){
					$id_smt = $smt[0]->id_smt;
					$data[$i]['id_smt'] = $id_smt;
					$id_matkul = $matkul[0]->id_matkul;
					$data[$i]['id_matkul'] = $id_matkul;
					$id_dosen = $dosen[0]->id_dosen;
					$data[$i]['id_dosen'] = $id_dosen;
					$data[$i]['id_dosen2'] = NULL;
					$id_kls = $kls[0]->id_kls;
					$data[$i]['id_kls'] = $id_kls;
					
					$this->db->select('*')->from('jadwal')->where('hari',$data[$i]['hari'])->where('waktu',$data[$i]['waktu'])
					->where('akhir',$data[$i]['akhir'])->where('id_matkul',$id_matkul)->where('id_dosen',$id_dosen)
					->where('id_kls',$id_kls)->where('id_smt',$id_smt);
					$ada=$this->db->get()->result();
					if(empty($ada)){
						$this->db->insert('jadwal', $data[$i]);
					}	
				}
			}
		}
		$this->db->trans_complete();
	}
	public function cek($data){
		$cekkls = $data['id_kls'];
		$cekwkt = $data['waktu'];
		$cekhari = $data['hari'];
		$sql = "SELECT * FROM JADWAL WHERE waktu <= '$cekwkt' and akhir >= '$cekwkt' and id_kls = $cekkls and hari = '$cekhari'";
		$query=$this->db->query($sql);
		$db = $query->result();
		if(empty($db)){
			$this->db->insert('jadwal', $data);
			return true;
		}
		//var_dump($db);die;
	}
	public function edit_data($where){		
        $sql = "SELECT jadwal.id_jadwal, smt.id_smt, jadwal.hari, jadwal.waktu, jadwal.akhir, jadwal.id_matkul, matkul.nama_matkul, jadwal.id_kls, kelas.nama_kls, jadwal.id_dosen, jadwal.id_dosen2, u.alias dosen1, s.alias dosen2
		FROM smt
		JOIN jadwal ON smt.id_smt=jadwal.id_smt
		JOIN kelas ON kelas.id_kls=jadwal.id_kls
		JOIN matkul ON jadwal.id_matkul=matkul.id_matkul
		JOIN prodi ON matkul.id_prodi=prodi.id_prodi
		JOIN fakultas ON fakultas.id_fakultas=prodi.id_fakultas
		inner join dosen a on jadwal.id_dosen = a.id_dosen 
		left join dosen b on jadwal.id_dosen2 = b.id_dosen
		inner join user_scan u on a.id_scan = u.id_scan 
		left join user_scan s on b.id_scan = s.id_scan
		WHERE jadwal.id_jadwal = $where";
        $query=$this->db->query($sql);
		return $query->result ();
	}
}