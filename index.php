<?php  
  require 'view/header.php'; 
  require 'view/navbar.php'; 
  require 'view/modmasuk.php';
?>


<div id="#top"></div>
<section id="beranda">
  <div class="banner-container"> 
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="gambar/slides/1.jpg" alt="" />
                <div class="flex-caption container">
                    <h3>Gratis</h3> 
					            <p>Aplikasi ini dapat digunakan oleh siapapun secara gratis.</p> 
                </div>
              </li>
              <li>
                <img src="gambar/slides/2.jpg" alt="" />
                <div class="flex-caption container">
                    <h3>Fleksibel</h3> 
					            <p>Diagnosa bisa dilakukan kapanpun dan dimanapun selama ada gadget dan terkoneksi internet.</p> 
                </div>
              </li>
              <li>
                <img src="gambar/slides/3.jpg" alt="" />
                <div class="flex-caption container">
                    <h3>Alternatif</h3> 
					            <p>Hasil diagnosa bersumber dari pengetahuan seorang pakar kehamilan.</p> 
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
  </div>
</section>
<section id="panduan" class="page-section colord">
  <div class="container hero-text2">
    <h2>Panduan penggunaan aplikasi sistem pakar gangguan kehamilan</h2>
  </div>
  <div class="container">
    <div class="row"> 
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"> <i class="circle"><img src="gambar/petunjuk/daftar.png" alt="Daftar akun baru" /></i>
        <h3>Registrasi</h3>
        <p>Registrasi akun baru bagi yang belum memiliki akun.</p>
      </div></div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"><i class="circle"> <img src="gambar/petunjuk/login.png" alt="Masuk ke dalam akun" /></i>
        <h3>Login</h3>
        <p>Masuk dengan username dan password yang sudah Anda buat.</p>
      </div></div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"><i class="circle"> <img src="gambar/petunjuk/diagnosa.png" alt="Mulai diagnosa" /></i>
        <h3>Diagnosa</h3>
        <p>Jawablah pertanyaan sesuai dengan gejala yang Anda alami.</p>
      </div></div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"><i class="circle"> <img src="gambar/petunjuk/print.png" alt="Selesai" /></i>
        <h3>Selesai</h3>
        <p>Hasil diagnosa akan tersimpan dalam riwayat diagnosa Anda.</p>
      </div></div>
      <!-- end:--> 
    </div>  
  </div>
  <!--/.container--> 
</section>
<section id="informasi">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>Tentang Sistem Pakar</h2>
      <p>Sistem pakar (expert system) adalah sistem yang berusaha mengapdosi pengetahuan manusia ke komputer, agar komputer dapat menyelesaikan masalah seperti yang biasa dilakukan oleh para ahli. Sistem pakar yang baik dirancang agar dapat menyelesaikan suatu permasalahan tertentu dengan meniru kerja dari para ahli.</p>
    </div>
    <div class="row feature design">
      <div class="area2 columns feature-media left"> <img src="gambar/konsul.jpg" alt="" width="100%"> </div>
      <div class="area1 columns right">
        <h3>Sistem Pakar Diagnosa Gangguan Kehamilan</h3>
        <p>Merupakan sarana untuk konsultasi untuk mengetahui gangguan kehamilan yang dialami oleh ibu-ibu hamil berdasarkan gejala-gejala yang dialami. Sumber basis pengetahuan dari sistem ini diperoleh dari hasil studi pustaka dari berbagai sumber yang berkaitan dengan gangguan kehamilan.</p>     
    </div>
    </div>
</section>
<?php require 'view/footer.php'; ?>