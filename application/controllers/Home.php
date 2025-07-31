<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Transaksi_model');
		$this->load->library('Pdf');
		if($this->session->userdata('level') == NULL){
			redirect('auth');
		}
	}
	public function index(){
		$this->template->load('layout/template','dashboard');
	}
	public function laporan(){
		$tanggal1 = $this->input->get('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$this->db->from('transaksi');
        $this->db->where("tanggal >=",$tanggal1);
		$this->db->where("tanggal <=",$tanggal2);
		$laporan = $this->db->get()->result_array();
		$data = array(
			'tanggal1' => $tanggal1,
			'tanggal2' => $tanggal2,
			'laporan' => $laporan,
		);
		$this->load->view('laporan',$data);
	}
}
