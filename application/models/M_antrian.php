<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_antrian extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getPendaftaran()
	{
		$this->db->select('pendaftaran.*, pasien.nama as pasien, klinik.nama as klinik');
        $this->db->from('pendaftaran');
        $this->db->join('pasien','pendaftaran.id_pasien=pasien.id_pasien');
        $this->db->join('klinik','pendaftaran.id_klinik=klinik.id_klinik');
        $this->db->where("pendaftaran.status", "antri");
        $query = $this->db->get();
        return $query->result();
	}


	public function updateStatus($id){
		$this->db->set("status", "pemeriksaan");
		$this->db->where("id_pendaftaran", $id);
		$this->db->update('pendaftaran');
	}

}
?>