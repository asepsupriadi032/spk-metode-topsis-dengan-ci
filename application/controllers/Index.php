<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		
		$this->load->view ('user/home');
	}

	public function kirim_pesan(){
		var_dump($_POST);
		$nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');

		$this->db->set('nama',$nama);
        $this->db->set('hp',$hp);
		$this->db->set('email',$email);
		$this->db->set('pesan',$pesan);
		$this->db->insert('pesan_masuk');

		redirect(base_url());
	}
	
	public function bu($search = null){
		// var_dump($search); die();
		$this->db->where('status_aktif','aktif');
		$this->db->limit(1);

		$this->db->order_by('tahun_ajaran','DESC');
		$sql = $this->db->get('tahun_ajaran');

		$row = $sql->num_rows();

		if($row==0){
			$data['row'] = 0;
		}else{
			$data['row'] = 1;

			$getRow = $sql->row();
			$id_tahun_ajaran = $getRow->id_tahun_ajaran;

			$this->db->where('nilai_siswa.id_tahun_ajaran',$id_tahun_ajaran);
			$this->db->join('nilai_siswa','nilai_siswa.id_siswa=hasil_penjurusan.id_siswa');
			$data['data_spk'] = $this->db->get('hasil_penjurusan')->result();
		}
		$this->load->view ('user/v_penjurusan',$data);
	}

	public function penjurusan($search = null){
		

		$this->db->where('nilai_siswa.nis',$search);
		$this->db->join('nilai_siswa','nilai_siswa.id_siswa=hasil_penjurusan.id_siswa');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_tahun_ajaran=nilai_siswa.id_tahun_ajaran');
		$sql = $this->db->get('hasil_penjurusan')->row();
		$jml = count($sql);

		// echo $jml; die();
		if($jml > 0){
			$status_aktif = $sql->status_aktif;
			if($status_aktif == 'Aktif'){
				$data['row'] = 1;
				$id_siswa = $sql->id_siswa;
				$data['key'] = $sql;
			}else{
				$data['row'] = 0;
				$data['pesan'] = "Maaf, Saat ini belum melakukan penjurusan.";
			}
		}else{
			$data['row'] = 0;
			$data['pesan'] = "Maaf, data anda belum terdaftar.";
		}
		
		// var_dump($sql); exit();
		$this->load->view ('user/v_penjurusan',$data);
	}
	

	
	
		
}