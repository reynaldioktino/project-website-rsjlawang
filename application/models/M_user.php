<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listUser()
	{
		$query=$this->db->query("SELECT * FROM user");
		return $query->result();
	}

	public function getIdUser($username) {
		$this->db->select('*');
	    $this->db->from('user');
	    $this->db->where('username', $username);
	    $query = $this->db->get();
		return $hasil = $query->row()->id;
	}

	public function getUser()
	{
		$this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
	}

	public function getUserWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM user WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'username' => $value->username,
					'password' => $value->password,
					'level' => $value->level
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('user', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('user', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM user where id='$where'");
	}
	
}
?>