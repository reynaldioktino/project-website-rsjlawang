<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getObat()
	{
		$this->db->select('*');
        $this->db->from('obat');
        $query = $this->db->get();
        return $query->result();
	}

	public function getObatWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM obat WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'nama' => $value->nama
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('obat', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('obat', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM obat where id='$where'");
	}
}
?>