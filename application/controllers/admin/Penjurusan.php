<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Super.php');

class Penjurusan extends Super
{
    
    function __construct()
    {
        parent::__construct();
        $this->language       = 'english'; /** Indonesian / english **/
        $this->tema           = "flexigrid"; /** datatables / flexigrid **/
        $this->tabel          = "hasil_penjurusan";
        $this->active_id_menu = "Hasil Penjurusan";
        $this->nama_view      = "Hasil Penjurusan";
        $this->status         = true; 
        $this->field_tambah   = array(); 
        $this->field_edit     = array(); 
        $this->field_tampil   = array(); 
        $this->folder_upload  = 'assets/uploads/files';
        $this->add            = true;
        $this->edit           = true;
        $this->delete         = true;
        $this->crud;

        $this->load->helper("evalmath.class");
        $this->load->helper('calculate');
    }

    function index(){
            $data = [];

            // print_r($this->crud->getState()); exit();

            if($this->crud->getState()=='list');
            redirect(base_url('admin/Penjurusan/proses'));
            /** Bagian GROCERY CRUD USER**/


            /** Relasi Antar Tabel 
            * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
            **/
            // $this->crud->set_relation('id_kategori','kategori','nama_kategori');
            // $this->crud->set_relation_n_n('warna','relasi_warna','warna','id_produk','id_warna','warna');

            /** Upload **/
            // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  
            //$this->crud->set_field_upload('gambar',$this->folder_upload);  
            
            /** Ubah Nama yang akan ditampilkan**/
            // $this->crud->display_as('nama','Nama Setelah di Edit')
            //     ->display_as('email','Email Setelah di Edit'); 
            
            /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
            $data = array_merge($data,$this->generateBreadcumbs());
            $data = array_merge($data,$this->generateData());
            $this->generate();
            $data['output'] = $this->crud->render();
            $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }

    private function generateBreadcumbs(){
        $data['breadcumbs'] = array(
                array(
                    'nama'=>'Dashboard',
                    'icon'=>'fa fa-dashboard',
                    'url'=>'admin/dashboard'
                ),
                array(
                    'nama'=>'Admin',
                    'icon'=>'fa fa-users',
                    'url'=>'admin/useradmin'
                ),
            );
        return $data;
    }

    public function proses(){

        //var_dump("asda");
        $data = [];
        $data = array_merge($data, $this->generateBreadcumbs());
        $data = array_merge($data,$this->generateData());
        $this->generate();
        $data['page'] = "prosesPenjurusan";

        // if(isset($this->input->post())){
        //     $data['hasil'] = "hasil";
        // }
        $data['hasil'] = "";
        $data['tahun_ajaran']=$this->db->get('tahun_ajaran')->result();
        $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }

    public function prosesPenjurusan(){

         $data = [];
        $data = array_merge($data, $this->generateBreadcumbs());
        $data = array_merge($data,$this->generateData());
        $this->generate();
        $data['page'] = "prosesPenjurusan";

        // var_dump($this->input->post()); exit();
        $id_tahun_ajaran = $this->input->post('tahun_ajaran');
        $this->db->where('nilai_siswa.id_tahun_ajaran',$id_tahun_ajaran);
        $getSiswa = $this->db->get('nilai_siswa');
        $totalSiswa = $getSiswa->num_rows();
        $rowSiswa = $getSiswa->result();

        //1. konversi hasil analisa
        $getSiswa = $this->langkahPertama($id_tahun_ajaran); 


        //2. Menghitung Matriks
        $a = 0;
        foreach ($rowSiswa as $key) {
                $r = "";
                for ($b=0; $b < $totalSiswa; $b++) { 
                    
                    $r .=  "(".$getSiswa[$b][$a]." * ".$getSiswa[$b][$a].")";
                    if($b == ($totalSiswa - 1)){
                        $r .= "";
                    } else{
                        $r .= "+";
                    }
                }
                $R[$a] = cobaHitung($r);
            $a++;
        }
        var_dump($R); exit();

        $data['tahun_ajaran']=$this->db->get('tahun_ajaran')->result();
        $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);

    }

    public function langkahPertama($id_tahun_ajaran){

        $this->db->where('nilai_siswa.id_tahun_ajaran',$id_tahun_ajaran);
        $getSiswa = $this->db->get('nilai_siswa');

        $totalSiswa = $getSiswa->num_rows();
        $rowSiswa = $getSiswa->result();

        $i = 0;
        $rows = "";
        foreach ($rowSiswa as $siswa) {


            $nilaiIpa[$i] = $this->konversiNilaiIpa($siswa->nilai_ipa);
            $nilaiIps[$i] = $this->konversiNilaiIps($siswa->nilai_ips);
            $nilaiPeminatan[$i] = $this->konversiNilaiPeminatan($siswa->nilai_minat_jurusan);
            $nilaiIq[$i] = $this->konversiNilaiIq($siswa->nilai_iq);

            $nilaiKonversiSiswa[$i] = array('0' => $nilaiIpa[$i], '1' => $nilaiIps[$i], '2' => $nilaiPeminatan[$i], '3' => $nilaiIq[$i]); 
            

            $i++;
        }

        // var_dump($nilai); exit();
        return $nilaiKonversiSiswa;
    }

    public function konversiNilaiIpa($nilaiIpa){

        // $this->db->where('bobot_nilai.batas_awa')?
        // $this->db->query('select * from bobot_nilai where ')
        $getNilaiIpa = $this->db->get('bobot_nilai')->result();

        foreach ($getNilaiIpa as  $key) {
            $batas_awal = $key->batas_awal;
            $batas_akhir = $key->batas_akhir;

            if($nilaiIpa >= $batas_awal AND $nilaiIpa <= $batas_akhir){
                $nilaiKonversiIpa = $key->nilai_kriteria;
            }
        }

        return $nilaiKonversiIpa;
    }

    public function konversiNilaiIps($nilaiIps){

        // $this->db->where('bobot_nilai.batas_awa')?
        // $this->db->query('select * from bobot_nilai where ')
        $getNilaiIps = $this->db->get('bobot_nilai')->result();

        foreach ($getNilaiIps as  $key) {
            $batas_awal = $key->batas_awal;
            $batas_akhir = $key->batas_akhir;

            if($nilaiIps >= $batas_awal AND $nilaiIps <= $batas_akhir){
                $nilaiKonversiIps = $key->nilai_kriteria;
            }
        }

        return $nilaiKonversiIps;
    }

    public function konversiNilaiPeminatan($nilaiPeminatan){

        $getNilaiPeminatan = $this->db->get('bobot_peminatan')->result();

        foreach ($getNilaiPeminatan as  $key) {
            $batas_awal = $key->batas_awal;
            $batas_akhir = $key->batas_akhir;

            if($nilaiPeminatan >= $batas_awal AND $nilaiPeminatan <= $batas_akhir){
                $nilaiKonversiPemintan = $key->nilai_kriteria;
            }
        }

        return $nilaiKonversiPemintan;
    }

    public function konversiNilaiIq($nilaiIq){

        $getNilaiIq = $this->db->get('bobot_iq')->result();

        foreach ($getNilaiIq as  $key) {
            $batas_awal = $key->batas_awal;
            $batas_akhir = $key->batas_akhir;

            if($nilaiIq >= $batas_awal AND $nilaiIq <= $batas_akhir){
                $nilaiKonversiIq = $key->nilai_kriteria;
            }
        }

        return $nilaiKonversiIq;
    }
}