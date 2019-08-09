<?php $this->load->view ("user/header") ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/user")?>/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<style type="text/css">
  header.masthead .intro-text .intro-heading {
    font-size: 45px; /*ukuran font header*/
    font-weight: 700;
    line-height: 75px;
    margin-bottom: 50px;
    font-family: Montserrat,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
}

#mainNav .navbar-nav .nav-item .nav-link {
    padding: 1.1em 1em !important;
    font-weight: bold;
}
</style>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Selamat Datang</div>
        <div class="intro-heading text-uppercase">Di Website SMA PKP Jakarta Islamic School</div>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section class="page-section" id="profil">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Profil Sekolah</h2>
          <h3 class="section-subheading text-muted"></h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Sejarah</h4>
          <p class="text-justify">Gagasan pendirian PKP di DKI Jakarta mendapat dukungan penuh tertuang dalam Surat Keputusan Gubernur DKI Jakarta  N. D. III.b.14/23/1973 Tanggal 18 April 1973 tentang Pengukuhan Pembentukan Pondok Karya Pembangunan DKI Jakarta sebagai sarana pendidikan dalam ruang lingkup Madrasah dan Pesantren. Didirikan Tahun 1988 dalam usianya yang ke 25,  SMA PKP telah terakreditasi A dan memperoleh sertifikat ISO 9001 : 2008.  Sampai dengan Tahun Ajaran  2013/2014  SMA PKP JIS telah meluluskan peserta didik sebanyak 3790 orang. Tiga tahun setelah berdirinya PKP, yaitu tanggal 8 April 1976 Gubernur KDKI Jakarta H. Ali Sadikin meresmikan Kampus PKP di atas areal lahan 18 hektar di Kelurahan Kelapa Dua Wetan Ciracas, Jakarta Timur. Tanggal 8 April ditetapkan sebagai Hari Lahir Kampus PKP DKI Jakarta.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Visi</h4>
          <p class="text-justify">Unggul dalam prestasi, taqwa dalam perilaku</p>
          <h4 class="service-heading">Misi</h4>
          <p class="text-justify">
            <ol>
              <li>Menumbuh kembangkan jati diri dan minat belajar</li>
              <li>Melaksanakan pendidikan sesuai kurikulum</li>
                <li>Meningkatkan kualitas pendidikan dan tenaga kependidikan</li>
                <li>Menyediakan sarana prasarana pendukung pembelajaran</li>
                <li>Meningkatkan keimanan dan ketaqwaan warga sekolah</li>
                <li>Membudayakan perilaku akhlakul karimah</li>
                <li>Meningkatkan kualitas pembelajaran</li>
            </ol></p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Struktur Organisasi</h4>
          <p class="text-justify">
          	<table class="table">
             <tr>
               <th>Kepala Sekolah</th>
               <td>:</td>
               <td>Drs. Yayat, WH. M.M.</td>
             </tr>
             <tr>
               <th>Wakabid Kurikulum</th>
               <td>:</td>
               <td>Titik Retnaningsih, S.Pd</td>
             </tr> 
             <tr>
             <th>Wakabid Kesiswaan</th>
               <td>:</td>
               <td>Suris, S.Pd. M.M.</td>
             </tr>
             <tr>
             <th>Wakabid Sarana Prasarana</th>
               <td>:</td>
               <td>H. Rusnadi, S.Ag</td>
               </tr>
               <tr>
             <th>Pembina Osis</th>
               <td>:</td>
               <td>Dra Sri Setyowati</td>
               </tr>
               <tr>
             <th>BP/BK</th>
               <td>:</td>
               <td>Nurlaela P, S.Pd</td>
             </tr>
             <tr>
             <th>Penanggungjawab Lab. IPA</th>
               <td>:</td>
               <td>Yayu Sri Rahayu, S.T</td>
             </tr>
             <tr>
             <th>Koordinator Green House</th>
               <td>:</td>
               <td>Suraya Sari, S.Si</td>
             </tr>
             <tr>
             <th>Laboran</th>
               <td>:</td>
               <td>Aulia Rahmawati, S.Pd</td>
             </tr>
            </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
<!--   <section class="bg-light page-section" id="spkpenjurusan">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">SPK Penjurusan</h2>
          <h3 class="section-subheading text-muted">Menu ini digunakan untuk siswa kelas 10 yang akan menentukan jurusan.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Threads</h4>
            <p class="text-muted">Illustration</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Explore</h4>
            <p class="text-muted">Graphic Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Finish</h4>
            <p class="text-muted">Identity</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Lines</h4>
            <p class="text-muted">Branding</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Southwest</h4>
            <p class="text-muted">Website Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Window</h4>
            <p class="text-muted">Photography</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- About -->
  <section class="page-section" id="fasilitas">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Fasilitas Sekolah</h2>
          <h3 class="section-subheading text-muted">Fasilitas dibawah ini disediakan untuk menunjang kegiatan siswa disekolah.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url('assets/user') ?>/fasilitas/8.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>GOR dan Seni</h4>
            <p class="text-muted">Gedung ini digunakan untuk sarana olahraga dan pertunjukan kesenian</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url('assets/user') ?>/fasilitas/RAS_0106.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Masjid Baitushidqi</h4>
            <p class="text-muted">Fasilitas ini digunakan untuk siswa beribadah dan terdapat aula serbaguna</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url('assets/user') ?>/fasilitas/RAS_0160.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Halte Sekolah</h4>
            <p class="text-muted">Fasilitas ini disediakan bagi siswa siswi untuk menunggu kendaraan pulang</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url('assets/user') ?>/fasilitas/RAS_0113.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Kampus PKP JIS</h4>
            <p class="text-muted"></p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url('assets/user') ?>/fasilitas/RAS_0312.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Aula Al-Kautsar</h4>
            <p class="text-muted">Gedung serbaguna untuk wisuda sekolah dan acara lainnya</p>
          </div> 
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url('assets/user') ?>/fasilitas/4.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Jogging Track</h4>
            <p class="text-muted">Fasilitas ini digunakan untuk siswa yang ingin berolahraga atau berjalan santai</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <!-- <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
            <h4>Kay Garland</h4>
            <p class="text-muted">Lead Designer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
            <h4>Larry Parker</h4>
            <p class="text-muted">Lead Marketer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
            <h4>Diana Pertersen</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Clients -->
<!--   <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Contact -->
  <section class="page-section" id="kontak">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Kontak Kami</h2>
          <h3 class="section-subheading text-muted">Hubungi kami apabila ada yang ingin ditanyakan</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form action="<?php echo base_url('Index/kirim_pesan') ?>" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="nama" id="nama" placeholder="Masukan nama." class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="hp" id="hp" placeholder="Masukan nomor telephon." class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="email" id="email" placeholder="Masukan email." class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="pesan" name="pesan" placeholder="Pesan *" ></textarea>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Kirim Pesan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

	<!--//footer-->
<?php $this->load->view ("user/footer")?>
<script type="text/javascript" src="<?php echo base_url("assets/user")?>/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>

<script type="text/javascript">
  function detailPengumuman(){
    //alert(id);
    $.fancybox.open({
         href : "Index/penjurusan/",
         type : 'iframe',
         helpers : {
             media: true 
         },
         width: "40%",
         height: 800,
         autoSize: false,
         scrolling: false
    });
    
  }
</script>