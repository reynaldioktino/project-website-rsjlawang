<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_resep extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getMaxId() {
		$this->db->select_max('id_resep');
		$this->db->from('resep');
		$query = $this->db->get();
		return $query->row('id_resep') + 1;
	}

	public function listRuang()
	{
		$query=$this->db->query("SELECT * FROM ruang");
		return $query->result();
	}

	public function getResepWhereId($id_resep)
	{
		$this->db->select('resep.*, pasien.no_rm as no_rm, pasien.nama as pasien, periksa.tgl_periksa as tgl_periksa, dokter.nama as dokter');
        $this->db->from('resep');
        $this->db->join('periksa','periksa.id_periksa=resep.id_periksa');
        $this->db->join('dokter','dokter.id_dokter=periksa.id_dokter');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=periksa.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $this->db->where('resep.kode', $id_resep);
        $query = $this->db->get();
        return $query->result();
	}

	function getIdResep($kode_resep) {
		$this->db->select('id_resep');
		$this->db->from('resep');
		$this->db->where('kode', $kode_resep);
		return $this->db->get()->row();
	}

	function getResep() {
		$this->db->select('resep.*, pasien.nama as pasien, periksa.kode as kp, dokter.nama as dokter');
        $this->db->from('resep');
        $this->db->join('periksa','periksa.id_periksa=resep.id_periksa');
        $this->db->join('dokter','dokter.id_dokter=periksa.id_dokter');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=periksa.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $this->db->order_by('status', 'desc');
        $query = $this->db->get();
        return $query->result();
	}

	public function getResepWhereIdEdit($where)
	{
		// $query=$this->db->query("SELECT * FROM resep INNER JOIN periksa ON periksa.id_periksa=resep.id_periksa WHERE id_resep='$where'");
		$this->db->select('resep.*, pasien.nama as pasien, periksa.kode as kp, dokter.nama as dokter');
        $this->db->from('resep');
        $this->db->join('periksa','periksa.id_periksa=resep.id_periksa');
        $this->db->join('dokter','dokter.id_dokter=periksa.id_dokter');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=periksa.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $this->db->where('resep.id_resep', $where);
        //$this->db->order_by('status', 'desc');
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_resep' => $value->id_resep,
					'kp' => $value->kp,
					'pasien' => $value->pasien,
					'dokter' => $value->dokter,
					'kode' => $value->kode,
					'keterangan' => $value->keterangan,
					'status' => $value->status
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('resep', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_resep", $where);
		$this->db->update('resep', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM resep where id_resep='$where'");
	}
}
?>