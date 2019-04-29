<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_apoteker extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listApoteker()
	{
		$query=$this->db->query("SELECT * FROM apoteker");
		return $query->result();
	}

	public function getApoteker()
	{
		$this->db->select('apoteker.*, user.username as uname');
        $this->db->from('apoteker');
        $this->db->join('user','apoteker.id_user=user.id');
        $query = $this->db->get();
        return $query->result();
	}

	public function getApotekerWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM apoteker WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'id_user' => $value->id_user,
					'nip' => $value->nip,
					'nama' => $value->nama,
					'alamat' => $value->alamat,
					'no_tlp' => $value->no_tlp,
					'jk' => $value->jk
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('apoteker', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('apoteker', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM apoteker where id='$where'");
	}
}
?>