<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getMaxId() {
		$this->db->select_max('id_pasien');
		$this->db->from('pasien');
		$query = $this->db->get();
		return $query->row('id_pasien') + 1;
	}

	public function getIdWhereKeluarga($id_user) {
		$this->db->select('*');
	    $this->db->from('keluarga');
	    $this->db->where('id_user', $id_user);
	    $query = $this->db->get();
		return $hasil = $query->row()->id_pasien;
	}

	public function listPasien()
	{
		$query=$this->db->query("SELECT * FROM pasien");
		return $query->result();
	}

	public function getPasien()
	{
		$this->db->select('*');
        $this->db->from('pasien');
        $query = $this->db->get();
        return $query->result();
	}

	public function getPasienWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM pasien WHERE id_pasien='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_pasien' => $value->id_pasien,
					'no_rm' => $value->no_rm,
					'no_ktp' => $value->no_ktp,
					'nama' => $value->nama,
					'alamat' => $value->alamat,
					'jk' => $value->jk,
					'tempat_lahir' => $value->tempat_lahir,
					'tanggal_lahir' => $value->tanggal_lahir,
					'umur' => $value->umur,
					'status' => $value->status,
					'status' => $value->status,
					'pendidikan' => $value->pendidikan,
					'pekerjaan' => $value->pekerjaan
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('pasien', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_pasien", $where);
		$this->db->update('pasien', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM pasien where id_pasien='$where'");
	}

	public function getIdPasien($no_ktp){
		$this->db->select('id_pasien');
		$this->db->from('pasien');
		$this->db->where('no_ktp', $no_ktp);
        return $this->db->get()->row();
	}
}
?>