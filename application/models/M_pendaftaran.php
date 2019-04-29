<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftaran extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getMaxId() {
		$this->db->select_max('id_pendaftaran');
		$this->db->from('pendaftaran');
		$query = $this->db->get();
		return $query->row('id_pendaftaran') + 1;
	}

	public function listPendaftaran()
	{
		$query=$this->db->query("SELECT pendaftaran.*, pasien.nama as nps FROM pendaftaran INNER JOIN pasien ON pendaftaran.id_pasien=pasien.id_pasien");
		return $query->result();
	}

	public function getPendaftaran()
	{
		$this->db->select('pendaftaran.*, pasien.nama as pasien, klinik.nama as klinik');
        $this->db->from('pendaftaran');
        $this->db->join('pasien','pendaftaran.id_pasien=pasien.id_pasien');
        $this->db->join('klinik','pendaftaran.id_klinik=klinik.id_klinik');
        $query = $this->db->get();
        return $query->result();
	}

	function getIdPendaftaran($no_pendaftaran) {
		$this->db->select('id_pendaftaran');
		$this->db->from('pendaftaran');
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		return $this->db->get()->row();
	}

	function getPendaftaranId($id_pendaftaran) {
		$this->db->select('pendaftaran.*, pasien.nama as np');
		$this->db->from('pendaftaran');
		$this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
		$this->db->where('id_pendaftaran', $id_pendaftaran);
		return $this->db->get()->row();
	}


	public function getPendaftaranWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM pendaftaran WHERE id_pendaftaran='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_pendaftaran' => $value->id_pendaftaran,
					'no_pendaftaran' => $value->no_pendaftaran,
					'id_pasien' => $value->id_pasien,
					'rujukan' => $value->rujukan,
					'id_klinik' => $value->id_klinik,
					'tgl_masuk' => $value->tgl_masuk,
					'status' => $value->status,
					'no_antrian' => $value->no_antrian
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('pendaftaran', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_pendaftaran", $where);
		$this->db->update('pendaftaran', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM pendaftaran where id_pendaftaran='$where'");
	}
}
?>