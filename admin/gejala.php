<?php
    require '../controller/auth.php';
    require '../controller/koneksi_db.php';
    require '../controller/halaman.php';
    require '../controller/function.php';
    require '../view/header.php';
    require 'navbar.php';
    $act=$_GET['act'];

?>

<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<?php
	if ($act=="data"){
?>
<br />
<br />
<br />
<div class="container">
<div class="panel panel-info">      
    <div class="panel-heading"><h4>Manajemen Data Gejala</h4></div>
        <br />
        <div class="panel-body">
            <form class="form-inline" action="?act=carigejala" method="post">
                <div class="form-group">
                    <label>Cari Nama Penyakit</label><span id="sprytextfield11">
                    <input name="nama_gejala" type="text" id="nama_gejala" class="form-control input-sm"/></td>             
                </div><!--form group-->
                <span class="textfieldRequiredMsg"></span></span>
                <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                               
            </form> <!--form inline-->

<?php  $jmldata= mysql_num_rows(mysql_query("SELECT * FROM gejala")); echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record gejala</center>";?>

        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead class="active">
                <th width="19" class="text-center success"><b>Id</b></th>
                <th width="690"class="text-center success"><b>Nama Gejala</b></th>
                <th colspan="3"class="text-center success"><b>Pilihan</b></th>
            </thead>
  <?php
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM gejala ORDER BY kode_gejala ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>

            <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                <td align="center"><?php echo $data['kode_gejala'];?></td>
                <td><?php echo $data['nama_gejala'];?></td>
                <td width="42" align="center"><a href="?act=editgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                <td width="51" align="center"><a href="?act=hapusgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" onclick="return confirm('Apakah anda yakin data gejala ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
            </tr>

<?php }?>

            <tr>
                <td colspan="5" align="center">
                    <a href="?act=tambahgejala" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <a href="index.php" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
                </td>
            </tr>
        </table>

  <?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM gejala"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<br><center>$linkHalaman</center>";
?>
        </div> <!--panel body-->
    </div> <!--panel info-->
</div> <!--container-->  

		
<?php
}


if ($act=="berhasil"){
?>
<br />
<br />
<br />
<div class="container">
<div class="panel panel-info">      
    <div class="panel-heading"><h4>Data Gejala Berhasil Diperbarui</h4></div>
        <br />
        <div class="panel-body">
            <form class="form-inline" action="?act=carigejala" method="post">
                <div class="form-group">
                    <label>Cari Nama Penyakit</label><span id="sprytextfield11">
                    <input name="nama_gejala" type="text" id="nama_gejala" class="form-control input-sm"/></td>             
                </div><!--form group-->
                <span class="textfieldRequiredMsg"></span></span>
                <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                               
            </form> <!--form inline-->

<?php  $jmldata= mysql_num_rows(mysql_query("SELECT * FROM gejala")); echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record gejala</center>";?>

        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead class="active">
                <th width="19" class="text-center success"><b>Id</b></th>
                <th width="690"class="text-center success"><b>Nama Gejala</b></th>
                <th colspan="3"class="text-center success"><b>Pilihan</b></th>
            </thead>
  <?php
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM gejala ORDER BY kode_gejala ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>

            <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                <td align="center"><?php echo $data['kode_gejala'];?></td>
                <td><?php echo $data['nama_gejala'];?></td>
                <td width="42" align="center"><a href="?act=editgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                <td width="51" align="center"><a href="?act=hapusgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" onclick="return confirm('Apakah anda yakin data gejala ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
            </tr>

<?php }?>

            <tr>
                <td colspan="5" align="center">
                    <a href="?act=tambahgejala" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <a href="index.php" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
                </td>
            </tr>
        </table>

  <?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM gejala"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<br><center>$linkHalaman</center>";
?>
  
</div>    

		
<?php
}



elseif ($act=="editgejala"){
	$kode_gejala = $_GET['kode_gejala'];
	$qry = mysql_query("SELECT * FROM gejala WHERE kode_gejala='$kode_gejala'");
	$data = mysql_fetch_array($qry);
	$ya = $data['kode_induk_ya'];
	$tidak = $data['kode_induk_tidak'];
	
	$qry1 = "SELECT * FROM gejala WHERE kode_gejala = '$ya'";
	$result1 = mysql_query($qry1);
	$data1 = mysql_fetch_array ($result1);
	
	$nama_gejala_ya = $data1['nama_gejala'];
	
	$qry2 = "SELECT * FROM gejala WHERE kode_gejala = '$tidak'";
	$result2 = mysql_query($qry2);
	$data2 = mysql_fetch_array ($result2);
	
	$nama_gejala_tidak = $data2['nama_gejala'];
	
?>
<br />
<br />
<br />
<div class="container">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Ubah Data Gejala</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="?act=aceditgejala" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-1">
                                    <input class="form-control" name="kode_gejala" type="text" size="5" maxlength="5" disabled value="<?php echo $kode_gejala;?>" />
                                    <input name="kode_gejala" type="hidden" value="<?php echo $kode_gejala;?>" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Gejala</label>
                                <div class="col-sm-5">
                                    <span id="sprytextfield22">
                                    <input class="form-control" name="nama_gejala" type="text" value="<?php echo $data['nama_gejala'];?>" size="100" />
                                    <span class="textfieldRequiredMsg">Nama gejala harus diisi</span></span>                  
                                </div>
                        </div>


                        <hr color="#AAAAAA">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gejala Ini Muncul Setelah :</label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban YA Pada</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="kode_induk_ya" id="kode_induk_ya">
                                        <?php
                                            if ($ya=='') echo "<option value=''>- TIDAK ADA -</option>";
                                            else{ echo "<option value='$ya'>[$ya] $nama_gejala_ya</option>";
                                            echo "<option value=''>- TIDAK ADA -</option>";
                                            }               
                                            $qryp = mysql_query("SELECT * FROM gejala where kode_gejala!='$ya'");
                                            while($datap = mysql_fetch_array($qryp)){
                                                echo "<option value='$datap[kode_gejala]'>[$datap[kode_gejala]] $datap[nama_gejala]</option>";
                                            }		  
                                            ?>
                                    </select>                 
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban TIDAK Pada</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="kode_induk_tidak" id="kode_induk_tidak">
                                        <?php
                                        if ($tidak=='') echo "<option value=''>- TIDAK ADA -</option>";
                                        else{ echo "<option value='$tidak'>[$tidak] $nama_gejala_tidak</option>";
                                        echo "<option value=''>- TIDAK ADA -</option>";
                                        }
                                        
                                        $qryp = mysql_query("SELECT * FROM gejala where kode_gejala!='$tidak'");
                                        while($datap = mysql_fetch_array($qryp)){
                                            echo "<option value='$datap[kode_gejala]'>[$datap[kode_gejala]] $datap[nama_gejala]</option>";
                                        }
                                        ?>
                                    </select>      
                                </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="btn-group">
                                <div class="col-md-12">
                                    <button type="submit" name="simpan" class="btn btn-info" onclick="return confirm('Apakah anda yakin data gejala ini akan disimpan?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
                                    <a href="?act=data" type="button" class="btn btn-danger" name="batal" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                                </div>
                            </div>
                        </div> <!--form group button-->
                    </form>   
                </div> <!-- panel body-->
        </div> <!--ubah data gejala-->
</div> <!--container-->
<?php
}
elseif ($act=="aceditgejala"){
	$kode_gejala = $_POST['kode_gejala'];
	$nama_gejala = $_POST['nama_gejala'];
	$kode_induk_ya = $_POST['kode_induk_ya'];
	$kode_induk_tidak = $_POST['kode_induk_tidak'];
	
	
	mysql_query("UPDATE gejala SET nama_gejala='$nama_gejala',kode_induk_ya='$kode_induk_ya',kode_induk_tidak='$kode_induk_tidak' WHERE kode_gejala='$kode_gejala'");
	echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=berhasil\">";
}
elseif ($act=="hapusgejala"){
  $kode_gejala = $_GET['kode_gejala'];
  
  if(mysql_num_rows(mysql_query("SELECT * FROM relasi_penyakit_gejala WHERE kode_gejala='$kode_gejala'")) < 1){	
	if ($kode_gejala != ""){
		mysql_query("DELETE FROM gejala WHERE kode_gejala='$kode_gejala'");
		echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=berhasil\">";
	}
	else {
		echo "Data gejala belum dipilih.";
	}
  }
  else{
    $qry = mysql_query("SELECT * FROM gejala WHERE kode_gejala='$kode_gejala'");
	$data = mysql_fetch_array($qry);
	echo "<center ><br><br><br><br><b>Maaf, gejala <font color=red> $data[nama_gejala]</font> tidak bisa dihapus karena sedang digunakan atau berelasi dengan suatu penyakit.</b></center>";
  ?>

<div class="container">
<div class="panel panel-info">      
    <div class="panel-heading"><h4>Manajemen Data Gejala</h4></div>
        <br />
        <div class="panel-body">
            <form class="form-inline" action="?act=carigejala" method="post">
                <div class="form-group">
                    <label>Cari Nama Penyakit</label><span id="sprytextfield11">
                    <input name="nama_gejala" type="text" id="nama_gejala" class="form-control input-sm"/></td>             
                </div><!--form group-->
                <span class="textfieldRequiredMsg"></span></span>
                <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                               
            </form> <!--form inline-->

<?php  $jmldata= mysql_num_rows(mysql_query("SELECT * FROM gejala")); echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record gejala</center>";?>

        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead class="active">
                <th width="19" class="text-center success"><b>Id</b></th>
                <th width="690"class="text-center success"><b>Nama Gejala</b></th>
                <th colspan="3"class="text-center success"><b>Pilihan</b></th>
            </thead>
  <?php
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM gejala ORDER BY kode_gejala ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>

            <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                <td align="center"><?php echo $data['kode_gejala'];?></td>
                <td><?php echo $data['nama_gejala'];?></td>
                <td width="42" align="center"><a href="?act=editgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                <td width="51" align="center"><a href="?act=hapusgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" onclick="return confirm('Apakah anda yakin data gejala ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
            </tr>

<?php }?>

            <tr>
                <td colspan="5" align="center">
                    <a href="?act=tambahgejala" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <a href="index.php" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
                </td>
            </tr>
        </table>

  <?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM gejala"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<br><center>$linkHalaman</center>";
?>
        </div> <!--panel body-->
    </div> <!--panel info-->
</div> <!--container-->  
  <?php
  }
}
if ($act=="tambahgejala"){
?>

<br />
<br />
<br />
<div class="container">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Tambah Data Gejala</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="?act=actambahgejala" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-1">
                                    <input class="form-control" name="kode_gejala" type="text" size="5" maxlength="5" disabled value="<?php echo kdautogejala("gejala", "G");?>" />
                                    <input name="kode_gejala" type="hidden" value="<?php echo kdautogejala("gejala", "G");?>" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Gejala</label>
                                <div class="col-sm-5">
                                    <span id="sprytextfield22">
                                    <input class="form-control" name="nama_gejala" type="text" value="" size="100" />
                                    <span class="textfieldRequiredMsg">Nama gejala harus diisi</span></span>                  
                                </div>
                        </div>


                        <hr color="#AAAAAA">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gejala Ini Muncul Setelah :</label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban YA Pada</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="kode_induk_ya" id="kode_induk_ya">
                                        <option value=''>- TIDAK ADA -</option>
				                            <?php				   
                                                $qryp = mysql_query("SELECT * FROM gejala");
                                                while($datap = mysql_fetch_array($qryp)){
                                                    echo "<option value='$datap[kode_gejala]'>[$datap[kode_gejala]] $datap[nama_gejala]</option>";
                                                }
                                                ?>
                                    </select>                
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban TIDAK Pada</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="kode_induk_tidak" id="kode_induk_tidak">
                                        <option value=''>- TIDAK ADA -</option>
                                        <?php
                                        
                                        $qryp = mysql_query("SELECT * FROM gejala");
                                        while($datap = mysql_fetch_array($qryp)){
                                            echo "<option value='$datap[kode_gejala]'>[$datap[kode_gejala]] $datap[nama_gejala]</option>";
                                        }
                                        ?>
                                    </select>   
                                </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="btn-group">
                                <div class="col-md-12">
                                    <button type="submit" name="simpan" class="btn btn-info" onclick="return confirm('Apakah anda yakin data gejala ini akan disimpan?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
                                    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                </div>
                            </div>
                        </div> <!--form group button-->
                    </form>   
                </div> <!-- panel body-->
        </div> <!--tambah data gejala-->
</div> <!--container-->




<?php
}
elseif ($act=="actambahgejala"){
	$kode_gejala = $_POST['kode_gejala'];
	$nama_gejala = $_POST['nama_gejala'];
	$kode_induk_ya = $_POST['kode_induk_ya'];
	$kode_induk_tidak = $_POST['kode_induk_tidak'];
	
	
	$cek = mysql_query("SELECT * FROM gejala");
	$jumlah = mysql_num_rows($cek);
	$id = $jumlah+1;
		mysql_query("INSERT INTO gejala  (kode_gejala, nama_gejala, kode_induk_ya, kode_induk_tidak) VALUES  ('$kode_gejala','$nama_gejala','$kode_induk_ya', '$kode_induk_tidak')");
		
		
		echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=berhasil\">";
}
elseif($act=="carigejala"){
  $nama_gejala = $_POST['nama_gejala'];
  $cari=mysql_query("SELECT * FROM gejala WHERE nama_gejala='$nama_gejala'");
  $jumlah=mysql_num_rows($cari);
  if($jumlah<1){
  ?>

<br />
<br />
<br />
<div class="container">      
    <div class="panel panel-info">
        <div class="panel-heading">Data Gejala Tidak Ditemukan</div>
            <div class="panel-body">
                <form class="form-inline" action="?act=carigejala" method="post">
                    <div class="form-group">
                        <label>Cari Nama Gejala</label>
                            <span id="sprytextfield21">
                                <input name="nama_gejala" type="text" id="nama_gejala" class="form-control input-sm"/>
                            <span id="sprytextfield21">                            
                    </div><!--form group-->
                    <span class="textfieldRequiredMsg"></span></span>
                    <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                       
                </form> <!--form inline-->
            </div> <!--panel body-->
    </div> <!-- panel info-->
        
</div> <!--data gejala tidak ditemukan--> 
  <?php
    echo "<center style=text-decoration:blink><br><br><b>Maaf, data <font color=red>'$nama_gejala'</font> tidak ditemukan dalam database.</b><br></center>";
	?>
        <br>
        <center>
            <a href="?act=data" type="button" class="btn btn-danger" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
        </center>
	<?php

  }else{
  ?>

<br />
<br />
<br />
<div class="container">      
    <div class="panel panel-info">
        <div class="panel-heading">Data Gejala Ditemukan</div>
            <div class="panel-body">
                <form class="form-inline" action="?act=carigejala" method="post">
                    <div class="form-group">
                        <label>Cari Nama Gejala</label>
                            <span id="sprytextfield21">
                                <input name="nama_gejala" type="text" id="nama_gejala" class="form-control input-sm"/>
                            <span id="sprytextfield21">                            
                    </div><!--form group-->
                    <span class="textfieldRequiredMsg"></span></span>
                    <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                       
                </form> <!--form inline-->
            <br />
                <table class="table table-hover table-bordered table-striped">
                    <thead class="active">
                        <th width="690"class="text-center success"><b>Nama Gejala</b></th>
                        <th colspan="3"class="text-center success"><b>Pilihan</b></th>
                    </thead>
<?php
    $qry = mysql_query("SELECT * FROM gejala WHERE nama_gejala='$nama_gejala' ");
	while($data=mysql_fetch_array($qry)){
?>
                <tbody>
                    <tr>
                        <td><?php echo $data['nama_gejala'];?></td>
                        <td width="42" align="center"><a href="?act=editgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                        <td width="51" align="center"><a href="?act=hapusgejala&kode_gejala=<?php echo $data['kode_gejala'];?>" onclick="return confirm('Apakah anda yakin data penyakit ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
                    </tr>           
                </tbody>
<?php 
    }
?>

                </table>
            </div> <!--panel body-->
    </div> <!-- panel info-->
        <br>
        <center>
            <a href="?act=data" type="button" class="btn btn-danger" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
        </center>
</div> <!--data gejala ditemukan--> 


    <?php
  }

}
?>

	
<script type="text/javascript">
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield22 = new Spry.Widget.ValidationTextField("sprytextfield22");
var sprytextarea31 = new Spry.Widget.ValidationTextarea("sprytextarea31");
</script>

<?php require '../view/footer.php'; ?>