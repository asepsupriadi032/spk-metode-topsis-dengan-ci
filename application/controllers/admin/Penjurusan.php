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
                $R[$a] = ROUND(sqrt(cobaHitung($r)),2);
            $a++;
        }

        $c = 0;
        
        foreach ($rowSiswa as $row) {
           
            for ($d=0; $d < $totalSiswa; $d++) { 
                if($c==0){

                    $matriks = cobaHitung("(".$getSiswa[$d][$c]."/".$R[$c].")");
                    $hasil[$d][$c] = cobaHitung($matriks."*1");
                }elseif($c==1){
                    $matriks = cobaHitung("(".$getSiswa[$d][$c]."/".$R[$c].")");
                    $hasil[$d][$c] = cobaHitung($matriks."*1");

                }elseif($c==2){
                    $matriks = cobaHitung("(".$getSiswa[$d][$c]."/".$R[$c].")");
                    $hasil[$d][$c] = cobaHitung($matriks."*0.75");

                }elseif($c==3){
                    $matriks = cobaHitung("(".$getSiswa[$d][$c]."/".$R[$c].")");
                    $hasil[$d][$c] = cobaHitung($matriks."*0.5");
                }

                // $matriks[$d][$c] = cobaHitung("(".$getSiswa[$d][$c]."/".$R[$c].")");
            }

            $c++;
        }

        for ($i=0; $i < 4; $i++) {
            for ($j=0; $j < $totalSiswa; $j++) { 
                $kolom[$i][$j] = $hasil[$j][$i];
             } 
        }

        for ($k=0; $k < 1; $k++) { //untuk mengambil a+ dan a-
            for ($l=0; $l < 4; $l++) { //ambil berdasarkan jumlah kriteria
                
                $aMax[$k][$l] =max($kolom[$l]); 
                $aMin[$k][$l] =min($kolom[$l]); 
            }
        }

        //menghitung jarak solusi ideal D+ dan D-
        $m = 0;
        foreach ($rowSiswa as $key) {
            // for ($n=0; $n < 2; $n++) { 
                $hasilDPlus = "";
                $hasilDMin = "";
                for ($o=0; $o < 4; $o++) { 
                   $hasilDPlus .= "((".$aMax[0][$o]."-".$kolom[$o][$m].")^2)";
                   $hasilDMin .= "((".$aMin[0][$o]."-".$kolom[$o][$m].")^2)";
                   if($o == 3 ){
                        $hasilDPlus .= "";
                        $hasilDMin .= "";
                    } else{

                        $hasilDPlus .= "+";
                        $hasilDMin .= "+";
                    }
                }
            // }
            $dPlus[$m] = round(sqrt(cobaHitung($hasilDPlus)),2);
            $dMin[$m] = round(sqrt(cobaHitung($hasilDMin)),2);
            $m++;
        }

        //menghitung nilai preferensi setiap alternatif
        $p = 0;
        foreach ($rowSiswa as $key) {
                $hasilAkhir = ROUND($dMin[$p]/($dMin[$p]+$dPlus[$p]),2);
                
                $this->inputHasil($key->id_siswa,$hasilAkhir);
            $p++;
        }

        redirect(base_url('admin/HasilPenjurusan'));

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

    public function inputHasil($id_siswa,$nilai){

        if($nilai >= 0.6){
            $hasil = "IPA";
        }else{
            $hasil = "IPS";
        }
        $this->db->set('id_siswa',$id_siswa);
        $this->db->set('nilai',$nilai);
        $this->db->set('hasil',$hasil);
        return $this->db->insert('hasil_penjurusan');
    }
}