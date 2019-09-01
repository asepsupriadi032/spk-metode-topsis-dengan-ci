<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Super.php');

class Nilai_siswa extends Super
{
    
    function __construct()
    {
        parent::__construct();
        $this->language       = 'english'; /** Indonesian / english **/
        $this->tema           = "flexigrid"; /** datatables / flexigrid **/
        $this->tabel          = "nilai_siswa";
        $this->active_id_menu = "Nilai Siswa";
        $this->nama_view      = "Nilai Siswa";
        $this->status         = true; 
        $this->field_tambah   = array('id_tahun_ajaran','nis','nama_siswa','nilai_ipa','nilai_ips','nilai_minat_jurusan','nilai_iq'); 
        $this->field_edit     = array('id_tahun_ajaran','nis','nama_siswa','nilai_ipa','nilai_ips','nilai_minat_jurusan','nilai_iq'); 
        $this->field_tampil   = array('id_tahun_ajaran','nis','nama_siswa','nilai_ipa','nilai_ips','nilai_minat_jurusan','nilai_iq','id_hasil'); 
        $this->folder_upload  = 'assets/uploads/files';
        $this->add            = true;
        $this->edit           = true;
        $this->delete         = true;
        $this->crud;
    }

    function index(){
            $data = [];
            /** Bagian GROCERY CRUD USER**/


            /** Relasi Antar Tabel 
            * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
            **/
            // $this->crud->set_relation('id_kategori','kategori','nama_kategori');
             $this->crud->set_relation('id_tahun_ajaran','tahun_ajaran','tahun_ajaran');
             $this->crud->set_relation('id_hasil','hasil_penjurusan','hasil');
            /** Upload **/
            // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  
            //$this->crud->set_field_upload('gambar',$this->folder_upload);  
            $this->crud->required_fields('nis');
            /** Ubah Nama yang akan ditampilkan**/
            // $this->crud->display_as('nama','Nama Setelah di Edit')
            //untuk merubah tulisan jadi font besar
            $this->crud->display_as('id_tahun_ajaran','TAHUN AJARAN'); 
            $this->crud->display_as('nis','NIS'); 
            $this->crud->display_as('nama_siswa','NAMA SISWA'); 
            $this->crud->display_as('nilai_ipa','NILAI IPA'); 
            $this->crud->display_as('nilai_ips','NILAI IPS'); 
            $this->crud->display_as('nilai_iq','NILAI IQ'); 
            $this->crud->display_as('nilai_minat_jurusan','NILAI MINAT JURUSAN'); 
            $this->crud->display_as('id_hasil','HASIL'); 
            
            /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
            // $id_tahun_ajaran = $this->uri->segment(4);
            // if(empty($id_tahun_ajaran)){
            //     if($id_tahun_ajaran != 'success'){
            //         $this->crud->where('nilai_siswa.id_tahun_ajaran',$id_tahun_ajaran);
            //     }                
            // }
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
}