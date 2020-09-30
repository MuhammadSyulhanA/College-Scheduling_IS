<?php

class M_Matapelajaran extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
	
	/*
	function get_by_semester_type($semester_type){
		$rs = $this->db->query(
								"SELECT * ".
								"FROM matapelajaran ".
								"WHERE semester%2=$semester_type ".
								"ORDER BY nama");
		return $rs;
	}
	*/
	
	
	
	function get(){
		$rs = $this->db->query(
							   "SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matapelajaran ".
								"ORDER BY $this->sort $this->order ".
								"LIMIT $this->offset,$this->limit");
		return $rs;		
	}
	
	function get_all(){
		$rs = $this->db->query(
							   "SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matapelajaran ");
					
		return $rs;		
	}
	
	function get_by_semester($semester){
		$rs = $this->db->query(
							   "SELECT kode,".								
								"       nama ".								
								"FROM matapelajaran ".
								"WHERE semester%2=$semester ORDER BY nama");
		return $rs;		
	}
	
	function get_by_kode($kode){
		$rs = $this->db->query(
							   "SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matapelajaran ".
								"WHERE kode= $kode");
		return $rs;		
	}
	
	function get_search($search){
		$rs = $this->db->query(	"SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matapelajaran ".								
								"WHERE nama LIKE '%$search%'");
		return $rs;		
	}
	
	function num_page(){
    	
    	$result = $this->db->from('matapelajaran')
                           ->count_all_results();
        return $result;
    }
	
	function cek_for_update($kode_mk,$nama,$kode){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM matapelajaran ".
							   "WHERE (kode_mk=$kode_mk OR nama='$nama') AND kode <> $kode");
		return $rs->row()->cnt;
	}
	
	function cek_for_insert($kode_mk,$nama){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM matapelajaran ".
							   "WHERE kode_mk=$kode_mk OR nama='$nama'");
		return $rs->row()->cnt;
	}
	
	function update($kode,$data){
        $this->db->where('kode',$kode);
        $this->db->update('matapelajaran',$data);
    }
	
	function insert($data){
        $this->db->insert('matapelajaran',$data);		
    }
	
	function delete($kode){
		$this->db->query("DELETE FROM matapelajaran WHERE kode = '$kode'");
	}
	
}