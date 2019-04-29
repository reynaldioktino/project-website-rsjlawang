<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_icd10 extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listIcd10()
	{
		$query=$this->db->query("SELECT * FROM icd10");
		return $query->result();
	}

	public function getIcd10()
	{
		$this->db->select('*');
        $this->db->from('icd10');
        $query = $this->db->get();
        return $query->result();
	}

	public function getIcd10WhereId($where)
	{
		$query=$this->db->query("SELECT * FROM icd10 WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'icd_kode' => $value->icd_kode,
					'jenis_penyakit' => $value->jenis_penyakit,
					'sebabpenyakit' => $value->sebabpenyakit
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('icd10', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('icd10', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM icd10 where id='$where'");
	}
}
?>