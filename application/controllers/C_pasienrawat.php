<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pasienrawat extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_rawatinap');
		$this->load->model('M_ruangan');
		$this->load->model('M_pendaftaran');
		$this->load->model('M_obat');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_rawatinap->getRawatinapMasuk();
		echo json_encode($data);
	}

	public function getAjax2()
	{
		$data['data'] = $this->M_rawatinap->getRawatinapKeluar();
		echo json_encode($data);
	}


	public function pasienmasuk() {
		$id_ruang = $this->input->post('ruang');
		$kuota = $this->M_ruangan->getKuota($id_ruang);
		if ($kuota > 0) {
			$kuota -= 1;
			$dataruang = array(
				'kapasitas'	=> $kuota
			);
			$updatekuota = $this->M_ruangan->update($dataruang, $id_ruang);
			$data = array(
				'id_rawatinap' => $this->input->post(''),
				'id_ruangan' => $id_ruang,
				'id_pendaftaran' => $this->input->post('pendaftaran'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'tgl_keluar' => "0000-00-00",
				'status' => "Belum Keluar",
				'keterangan' => $this->input->post('keterangan')
			);
			$insert = $this->M_rawatinap->insert($data);
			redirect('C_menuperawat/pasienmasuk');
		} else {
			echo "kapasitas penuh";
		}
	}

	public function pindahruangan() {
		if(isset($_POST['submit'])){
			$id_ruangasal = $this->input->post('ruangasal');
			$id_ruang = $this->input->post('ruang');
			$kuotaasal = $this->M_ruangan->getKuota($id_ruangasal);
			$kuota = $this->M_ruangan->getKuota($id_ruang);
			if ($kuota > 0) {
				$kuota -= 1;
				$dataruang = array(
					'kapasitas'	=> $kuota
				);
				$updatekuota = $this->M_ruangan->update($dataruang, $id_ruang);
				$kuotaasal += 1;
				$dataruang2 = array(
					'kapasitas'	=> $kuotaasal
				);
				$updatekuota2 = $this->M_ruangan->update($dataruang2, $id_ruangasal);
				$kode = $this->input->post('id_rawatinap');
	            $data = array(
	                'id_rawatinap'           => $this->input->post('id_rawatinap'),
	                'id_ruangan'      =>  $this->input->post('ruang')
	            );
	            $update =  $this->M_rawatinap->update($data, $kode);  
	            redirect('C_menuperawat/pasienmasuk');
			} else {
				echo "kapasitas penuh";
			}
        }else{
            $kode = $this->uri->segment(3);
            $data['rawat'] = $this->M_rawatinap->getRawatWhereId($kode);
            $data['ruang'] = $this->M_ruangan->listRuang();
            $this->load->view('perawat/pindahruangan',$data);
        }
	}

	public function keluarkanpasien($id_rawat, $id_ruang) {
		$kuota = $this->M_ruangan->getKuota($id_ruang);
		$kuota += 1;
		$dataruang = array(
			'kapasitas'	=> $kuota
		);
		$updatekuota = $this->M_ruangan->update($dataruang, $id_ruang);
        $data = array(
            'tgl_keluar'	=> date("Y-m-d"),
            'status'	=>  "Keluar"
        );
        $update =  $this->M_rawatinap->update($data, $id_rawat);  
        redirect('C_menuperawat/pasienmasuk');
	}
}