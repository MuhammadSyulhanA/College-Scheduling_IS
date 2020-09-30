<?php

class M_Guru extends CI_Model
{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct()
	{

		parent::__construct();
	}

	function GetGuru($data)
	{
		$query = $this->db->get_where('guru', $data);
		return $query;
	}

	function get()
	{
		/*
      
      "SELECT kode," +
                "       nip as nip," +
                "       nama as Nama," +
                "       alamat as Alamat," +
                "       telp as Telp " +
                "FROM guru " +
                "ORDER BY kode");
      */
		$rs = $this->db->query("SELECT kode, " .
			"		 nip," .
			"		 nama," .
			"		 telp, " .
			"		 alamat " .
			"FROM guru " .
			"ORDER BY $this->sort $this->order " .
			"LIMIT $this->offset,$this->limit");

		return $rs;
	}

	function get_all()
	{

		$rs = $this->db->query("SELECT kode, " .
			"		 nip," .
			"		 nama," .
			"		 telp, " .
			"		 alamat " .
			"FROM guru " .
			"ORDER BY nama");

		return $rs;
	}

	function get_by_kode($kode)
	{
		$rs = $this->db->query("SELECT kode, " .
			"		 nip," .
			"		 nama," .
			"		 telp, " .
			"		 alamat, " .
			"		 password " .
			"FROM guru " .
			"WHERE kode = $kode");
		return $rs;
	}

	function get_search($search)
	{
		$rs = $this->db->query("SELECT kode, " .
			"		 nip," .
			"		 nama," .
			"		 telp, " .
			"		 alamat " .
			"FROM guru " .
			"WHERE nama LIKE '%$search%'");
		return $rs;
	}

	function num_page()
	{

		$result = $this->db->from('guru')
			->count_all_results();
		return $result;
	}

	function insert($data)
	{
		$this->db->insert('guru', $data);
	}

	function update($kode, $data)
	{
		$this->db->where('kode', $kode);
		$this->db->update('guru', $data);
	}

	function delete($kode)
	{
		$this->db->query("DELETE FROM guru WHERE kode='$kode'");
	}

	function cek_for_insert($nama)
	{
		/*
		
		var check = string.Format("SELECT CAST(COUNT(*) AS CHAR(1)) " +
                                          "FROM guru " +
                                          "WHERE kode={0} OR nip='{1}'",
                                          int.Parse(txtKode.Text), txtnip.Text);
                var i = int.Parse(_dbConnect.ExecuteScalar(check));
		*/
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt " .
			"FROM guru " .
			"WHERE nama='$nama'");
		return $rs->row()->cnt;
	}

	function cek_for_update($kode_baru, $nip, $kode_lama)
	{
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt " .
			"FROM guru " .
			"WHERE (kode=$kode_baru OR nip='$nip') AND kode <> $kode_lama");
		return $rs->row()->cnt;
	}
}
