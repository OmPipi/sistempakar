<?php
    require '../controller/auth.php';
    require '../controller/koneksi_db.php';
    require '../view/header.php';
    require 'navbar.php';
    $username = $_SESSION['SESS_USERNAME'];
?>
 

<div class="container">
<section id="panduan" class="page-section colord">
  <div class="container hero-text2">
    <h2>Menu Administrator</h2>
  </div>
  <div class="container">
    <div class="row"> 
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"> <i class="circle">
        <a href="penyakit.php?act=data"><img src="../gambar/admin/penyakit.png" alt="Data Penyakit" /></i></a>
        <h3>Data Penyakit</h3>
        <p>Manajemen Jenis Penyakit</p>
      </div></div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"><i class="circle"> 
        <a href="gejala.php?act=data"><img src="../gambar/admin/gejala.png" alt="Data Gejala" /></i></a>
        <h3>Data Gejala</h3>
        <p>Manajemen Data Gejala</p>
      </div></div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"><i class="circle"> 
        <a href="relasi.php?act=relasi"><img src="../gambar/admin/relasi.png" alt="Data Relasi" /></i></a>
        <h3>Data Relasi</h3>
        <p>Manajemen Data Relasi</p>
      </div></div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center"><div class="b1"><i class="circle"> 
        <a href="bobot.php?act=0"><img src="../gambar/admin/bobot.png" alt="Bobot Gejala" /></i></a>
        <h3>Bobot Gejala</h3>
        <p>Manajemen Bobot Gejala</p>
      </div></div>
      <!-- end:--> 
    </div>  
  </div>
  <!--/.container--> 
</section>



</div> <!-- container -->
<?php require '../view/footer.php'; ?>