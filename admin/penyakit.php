<?php
    require '../controller/auth.php';
    require '../controller/koneksi_db.php';
    require '../controller/halaman.php';
    require '../controller/function.php';
    require '../view/header.php';
    require 'navbar.php';
?>

<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<?php
$act=$_GET['act'];
if ($act=="data"){
?>
<br />
<br />
<br />
<div class="container">
<div class="panel panel-info">      
    <div class="panel-heading"><h4>Manajemen Data Penyakit</h4></div>
        <br />
        <div class="panel-body">
            <form class="form-inline" action="?act=caripenyakit" method="post">
                <div class="form-group">
                    <label>Cari Nama Penyakit</label>
                            <span id="sprytextfield21">
                                <input name="nama_penyakit" type="text" id="nama_penyakit" class="form-control input-sm"/>
                                <span id="sprytextfield21">              
                </div><!--form group-->
                <span class="textfieldRequiredMsg"></span></span>
                <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                  
                                
            </form> <!--form inline-->

<?php  
$jmldata= mysql_num_rows(mysql_query("SELECT * FROM penyakit")); 
echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record penyakit</center>";
?>

        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead class="active">
                <th width="19" class="text-center success"><b>Id</b></th>
                <th width="690"class="text-center success"><b>Nama Penyakit</b></th>
                <th colspan="3"class="text-center success"><b>Pilihan</b></th>
            </thead>

<?php	
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM penyakit ORDER BY kode_penyakit ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>
        
            <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                <td align="center"><?php echo $data['kode_penyakit'];?></td>
                <td><?php echo $data['nama_penyakit'];?></td>
                <td width="49" align="center"><a href="?act=detailpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-info btn-sm" data-toggle="tooltip"  data-placement="top" title="Detail"><span class="glyphicon glyphicon-list"></span> Detail</a></td>
                <td width="42" align="center"><a href="?act=editpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                <td width="51" align="center"><a href="?act=hapuspenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" onclick="return confirm('Apakah anda yakin data penyakit ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
            </tr>
<?php 
    }
?>

            <tr>
                <td colspan="5" align="center">
                    <a href="?act=tambahpenyakit" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <a href="index.php" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
                </td>
            </tr>
        </table>

<?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penyakit"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<center>$linkHalaman</center>";
?>
</div>
</div> <!--pengolahan data tipe penyakit-->
<?php
}


if ($act=="berhasil"){
?>
  
<div class="container">
<br /><br /><br />
<div class="panel panel-info">      
    <div class="panel-heading"><h4>Data Penyakit Berhasil Diperbarui</h4></div>
        <br />
        <div class="panel-body">
            <form class="form-inline" action="?act=caripenyakit" method="post">
                <div class="form-group">
                    <label>Cari Nama Penyakit</label>
                            <span id="sprytextfield21">
                                <input name="nama_penyakit" type="text" id="nama_penyakit" class="form-control input-sm"/>
                                <span id="sprytextfield21">
      
                            
                </div><!--form group-->
                <span class="textfieldRequiredMsg"></span></span>
                <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                  
                                
            </form> <!--form inline-->

<?php  
$jmldata= mysql_num_rows(mysql_query("SELECT * FROM penyakit")); 
echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record penyakit</center>";
?>

        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead class="active">
                <th width="19" class="text-center success"><b>Id</b></th>
                <th width="690"class="text-center success"><b>Nama Penyakit</b></th>
                <th colspan="3"class="text-center success"><b>Pilihan</b></th>
            </thead>

<?php	
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM penyakit ORDER BY kode_penyakit ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>
        
            <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                <td align="center"><?php echo $data['kode_penyakit'];?></td>
                <td><?php echo $data['nama_penyakit'];?></td>
                <td width="49" align="center"><a href="?act=detailpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-info btn-sm" data-toggle="tooltip"  data-placement="top" title="Detail"><span class="glyphicon glyphicon-list"></span> Detail</a></td>
                <td width="42" align="center"><a href="?act=editpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                <td width="51" align="center"><a href="?act=hapuspenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" onclick="return confirm('Apakah anda yakin data penyakit ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
            </tr>
<?php 
    }
?>

            <tr>
                <td colspan="5" align="center">
                    <a href="?act=tambahpenyakit" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <a href="index.php" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
                </td>
            </tr>
        </table>

<?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penyakit"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<center>$linkHalaman</center>";
?>
</div>
</div> <!--berhasil simpan penyakit-->

<?php
}

elseif ($act=="editpenyakit"){
	$kode_penyakit = $_GET['kode_penyakit'];
	$qry = mysql_query("SELECT * FROM penyakit WHERE kode_penyakit='$kode_penyakit'");
	$data = mysql_fetch_array($qry);
?>

<br>
<br>
<br>
<div class="container">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Ubah Data Penyakit <?php echo $data['nama_penyakit'];?></h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="?act=aceditpenyakit" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-1">
                                    <input class="form-control" name="kode_penyakit" type="text" size="5" maxlength="5" disabled value="<?php echo $kode_penyakit;?>" />
                                    <input name="kode_penyakit" type="hidden" value="<?php echo $kode_penyakit;?>" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Penyakit</label>
                                <div class="col-sm-3">
                                    <span id="sprytextfield22">
                                    <input class="form-control" name="nama_penyakit" type="text" value="<?php echo $data['nama_penyakit'];?>" size="30" />
                                    <span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Nama penyakit harus diisi</span></span>                  
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Definisi</label>
                                <div class="col-sm-10">
                                    <span id="sprytextarea1">
                                    <textarea class="form-control" name="definisi" cols="60" rows="3"><?php echo $data['definisi'];?></textarea>
                                    <span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Definisi penyakit masih kosong.</span></span>                      
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pengobatan</label>
                                <div class="col-sm-10">
                                    <span id="sprytextarea2">
                                    <textarea class="form-control" name="pengobatan" cols="60" rows="3"><?php echo $data['pengobatan'];?></textarea>
                                    <span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Pengobatan masih kosong.</span></span>                              
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pencegahan</label>
                                <div class="col-sm-10">
                                    <span id="sprytextarea3">
                                    <textarea class="form-control" name="pencegahan" cols="60" rows="3"><?php echo $data['pencegahan'];?></textarea>
                                    <span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Pencegahan masih kosong.</span></span>                          
                                </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="btn-group">
                                <div class="col-md-12">
                                    <button type="submit" name="simpan" class="btn btn-info" onclick="return confirm('Apakah anda yakin data penyakit ini akan disimpan?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
                                    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                </div>
                            </div>
                        </div> <!--form group button-->
                    </form>   
                </div> <!-- panel body-->
        </div> <!--ubah data tipe penyakit-->
</div> <!--container-->
<?php
}

elseif ($act=="aceditpenyakit"){
	$kode_penyakit = $_POST['kode_penyakit'];
	$nama_penyakit = $_POST['nama_penyakit'];
	$definisi = $_POST['definisi'];
	$pengobatan = $_POST['pengobatan'];
	$pencegahan = $_POST['pencegahan'];

	mysql_query("UPDATE penyakit SET nama_penyakit='$nama_penyakit', definisi='$definisi', pengobatan='$pengobatan' , pencegahan='$pencegahan' WHERE kode_penyakit='$kode_penyakit'");
	echo "<meta http-equiv=\"refresh\" content=\"0; url=penyakit.php?act=berhasil\">";
}

elseif ($act=="detailpenyakit"){
	$kode_penyakit = $_GET['kode_penyakit'];
	$qry = mysql_query("SELECT * FROM penyakit WHERE kode_penyakit='$kode_penyakit'");
	$data = mysql_fetch_array($qry);
?>

<br>
<br>
<br>
<div class="container">
    <div class="panel panel-info" align="justify">
        <div class="panel-heading"><h4>Detail Penyakit <?php echo $data['nama_penyakit'];?></h4></div>
            <div class="panel-body">
            <table width="100%">    
                    <tr>
                        <td colspan="3"><hr color="#AAAAAA"></td>     
                    </tr>
                    <tr>
                        <td width="14%" valign="top" class="subtitle">Id Penyakit</td>
                        <td width="1%" valign="top" >:</td>
                        <td width="85%" valign="top"><?php echo $kode_penyakit;?></td>
                    </tr>
                    <tr>
                        <td class="subtitle" valign="top">Jenis DM </td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data['nama_penyakit'];?></td>
                    </tr>
                    <tr>
                        <td class="subtitle" valign="top">Gejala</td>
                        <td valign="top">:</td>
                        <td valign="top">    	
<?php
$sql_gejala = "SELECT gejala.* FROM gejala,relasi_penyakit_gejala
               WHERE gejala.kode_gejala=relasi_penyakit_gejala.kode_gejala
               AND relasi_penyakit_gejala.kode_penyakit='$data[kode_penyakit]'";
$qry_gejala = mysql_query($sql_gejala);
$i=0;
while($hsl_gejala=mysql_fetch_array($qry_gejala)){
    $i++;
    echo "$i. $hsl_gejala[nama_gejala] <br>";
    } 
?>
                        </td>
                    </tr>
                    <tr>
                        <td class="subtitle" valign="top">Definisi</td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data['definisi'];?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td class="subtitle" valign="top">Pengobatan</td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data['pengobatan'];?></td>
                    </tr>
                    <tr>
                        <td class="subtitle" valign="top">Pencegahan</td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data['pencegahan'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr color="#AAAAAA"></td>
                        
                    </tr>
                    <tr>
                    <tr>
                        <td colspan="3" align="center">
                        <a href="?act=data" class="btn btn-danger" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>
                        </td>
                    </tr>
                </table>
            </div> <!--panel body-->
    </div> <!--detail tipe penyakit-->
</div> <!--container-->

<?php 
}

elseif ($act=="hapuspenyakit"){
    $kode_penyakit = $_GET['kode_penyakit'];
        if(mysql_num_rows(mysql_query("SELECT * FROM relasi_penyakit_gejala WHERE kode_penyakit='$kode_penyakit'")) < 1){	
            if ($kode_penyakit != ""){
                mysql_query("DELETE FROM penyakit WHERE kode_penyakit='$kode_penyakit'");
                echo "<meta http-equiv=\"refresh\" content=\"0; url=penyakit.php?act=berhasil\">";
                }   
            else {
                echo "Data penyakit belum dipilih.";
                }
            }
    else {
        $qry = mysql_query("SELECT * FROM penyakit WHERE kode_penyakit='$kode_penyakit'");
        $data = mysql_fetch_array($qry);
        echo "<center><br><br><br><br><b>Maaf, penyakit <font color=red> $data[nama_penyakit]</font> tidak bisa dihapus karena sedang digunakan atau berelasi dengan suatu gejala.</b></center>";
        ?>

<div class="container">
<div class="panel panel-info">      
    <div class="panel-heading"><h4>Manajemen Data Penyakit</h4></div>
        <br />
        <div class="panel-body">
            <form class="form-inline" action="?act=caripenyakit" method="post">
                <div class="form-group">
                    <label>Cari Nama Penyakit</label>
                            <span id="sprytextfield21">
                                <input name="nama_penyakit" type="text" id="nama_penyakit" class="form-control input-sm"/>
                                <span id="sprytextfield21">              
                </div><!--form group-->
                <span class="textfieldRequiredMsg"></span></span>
                <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                  
                                
            </form> <!--form inline-->

<?php  
$jmldata= mysql_num_rows(mysql_query("SELECT * FROM penyakit")); 
echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record penyakit</center>";
?>

        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead class="active">
                <th width="19" class="text-center success"><b>Id</b></th>
                <th width="690"class="text-center success"><b>Nama Penyakit</b></th>
                <th colspan="3"class="text-center success"><b>Pilihan</b></th>
            </thead>

<?php	
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM penyakit ORDER BY kode_penyakit ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>
        
            <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                <td align="center"><?php echo $data['kode_penyakit'];?></td>
                <td><?php echo $data['nama_penyakit'];?></td>
                <td width="49" align="center"><a href="?act=detailpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-info btn-sm" data-toggle="tooltip"  data-placement="top" title="Detail"><span class="glyphicon glyphicon-list"></span> Detail</a></td>
                <td width="42" align="center"><a href="?act=editpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                <td width="51" align="center"><a href="?act=hapuspenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" onclick="return confirm('Apakah anda yakin data penyakit ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
            </tr>
<?php 
    }
?>

            <tr>
                <td colspan="5" align="center">
                    <a href="?act=tambahpenyakit" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <a href="index.php" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
                </td>
            </tr>
        </table>

<?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penyakit"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<center>$linkHalaman</center>";
?>
</div>
</div> <!--pengolahan data tipe penyakit-->
        <?php
    }
}

if ($act=="tambahpenyakit"){
?>

<br>
<br>
<br>
<div class="container">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Tambah Data Penyakit</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="?act=berhasiltambahpenyakit" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-1">
                                    <input class="form-control" name="kode_penyakit" type="text" size="5" maxlength="5" disabled value="<?php echo kdautopenyakit("penyakit", "P");?>" />
                                    <input name="kode_penyakit" type="hidden" value="<?php echo kdautopenyakit("penyakit", "P");?>" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Penyakit</label>
                                <div class="col-sm-3">
                                    <span id="sprytextfield22">
                                    <input class="form-control" name="nama_penyakit" type="text" size="30" />
                                    <span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Nama penyakit harus diisi</span></span>                  
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Definisi</label>
                                <div class="col-sm-10">
                                    <span id="sprytextarea1">
                                    <textarea class="form-control" name="definisi" cols="60" rows="3"></textarea>
                                    <span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Definisi penyakit masih kosong.</span></span>                      
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pengobatan</label>
                                <div class="col-sm-10">
                                    <span id="sprytextarea2">
                                    <textarea class="form-control" name="pengobatan" cols="60" rows="3"></textarea>
                                    <span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Pengobatan masih kosong.</span></span>                              
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pencegahan</label>
                                <div class="col-sm-10">
                                    <span id="sprytextarea3">
                                    <textarea class="form-control" name="pencegahan" cols="60" rows="3"></textarea>
                                    <span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Pencegahan masih kosong.</span></span>                          
                                </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="btn-group">
                                <div class="col-md-12">
                                    <button type="submit" name="simpan" class="btn btn-info" onclick="return confirm('Apakah anda yakin data penyakit sudah benar?')" data-toggle="tooltip"  data-placement="top" title="Tambah"><span class="glyphicon glyphicon-ok"></span> Tambah</button> 
                                    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                </div>
                            </div>
                        </div> <!--form group button-->
                    </form>   
                </div> <!-- panel body-->
        </div> <!--tambah data tipe penyakit-->
</div> <!--container-->
                    

<?php
}

elseif ($act=="berhasiltambahpenyakit"){
        $kode_penyakit = $_POST['kode_penyakit'];
        $nama_penyakit = $_POST['nama_penyakit'];
        $definisi = $_POST['definisi'];
        $pengobatan = $_POST['pengobatan'];
        $pencegahan = $_POST['pencegahan'];
        $cek = mysql_query("SELECT * FROM penyakit");
        $jumlah = mysql_num_rows($cek);
        $id = $jumlah+1;
            mysql_query("INSERT INTO penyakit  (kode_penyakit, nama_penyakit, definisi, pengobatan, pencegahan) VALUES  ('$kode_penyakit','$nama_penyakit','$definisi','$pengobatan','$pencegahan')");
            echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=berhasil\">";
}

elseif ($act=="caripenyakit"){
        @$nama_penyakit = $_POST['nama_penyakit'];
        $cari=mysql_query("SELECT * FROM penyakit WHERE nama_penyakit='$nama_penyakit'");
        $jumlah=mysql_num_rows($cari);
        if($jumlah<1){
?>

<br />
<br />
<br />
<div class="container">      
    <div class="panel panel-info">
        <div class="panel-heading">Data Penyakit Tidak Ditemukan</div>
            <div class="panel-body">
                <form class="form-inline" action="?act=caripenyakit" method="post">
                    <div class="form-group">
                        <label>Cari Nama Penyakit</label>
                            <span id="sprytextfield21">
                            <input name="nama_penyakit" type="text" id="nama_penyakit" class="form-control input-sm"/>
                            <span id="sprytextfield21">                            
                    </div><!--form group-->
                    <span class="textfieldRequiredMsg"></span></span>
                    <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                       
                </form> <!--form inline-->
            <br />

            <?php
                echo "<center style=text-decoration:blink><br><br><b>Maaf, data <font color=red>'$nama_penyakit'</font> tidak ditemukan dalam database.</b></center>";
            ?>

            </div> <!--panel body-->
    </div> <!-- panel info-->
        <br>
        <center>
            <a href="?act=data" type="button" class="btn btn-danger" data-toggle="tooltip"  data-placement="top" title="Kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
        </center>
</div> <!--data penyakit tidak ditemukan-->  



<?php

}else{

?>
<br />
<br />
<br />
<div class="container">      
    <div class="panel panel-info">
        <div class="panel-heading">Data Penyakit Ditemukan</div>
            <div class="panel-body">
                <form class="form-inline" action="?act=caripenyakit" method="post">
                    <div class="form-group">
                        <label>Cari Nama Penyakit</label>
                            <span id="sprytextfield21">
                            <input name="nama_penyakit" type="text" id="nama_penyakit" class="form-control input-sm"/>
                            <span id="sprytextfield21">                            
                    </div><!--form group-->
                    <span class="textfieldRequiredMsg"></span></span>
                    <button type="submit" name="submit" class="btn btn-info btn-sm glyphicon glyphicon-search" data-toggle="tooltip"  data-placement="top" title="Cari"></button>                       
                </form> <!--form inline-->
            <br />
                <table class="table table-hover table-bordered table-striped">
                    <thead class="active">
                        <th width="690"class="text-center success"><b>Nama Penyakit</b></th>
                        <th colspan="3"class="text-center success"><b>Pilihan</b></th>
                    </thead>
<?php

$qry = mysql_query("SELECT * FROM penyakit WHERE nama_penyakit='$nama_penyakit' ");
    while($data=mysql_fetch_array($qry)){
		
?>
                <tbody>
                    <tr>
                        <td><?php echo $data['nama_penyakit'];?></td>
                        <td width="49" align="center"><a href="?act=detailpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-info btn-sm" data-toggle="tooltip"  data-placement="top" title="Detail"><span class="glyphicon glyphicon-list"></span> Detail</a></td>
                        <td width="42" align="center"><a href="?act=editpenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Ubah"><span class="glyphicon glyphicon-edit"></span> Ubah</a></td>
                        <td width="51" align="center"><a href="?act=hapuspenyakit&kode_penyakit=<?php echo $data['kode_penyakit'];?>" onclick="return confirm('Apakah anda yakin data penyakit ini akan dihapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Hapus"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
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
        
</div> <!--data penyakit ditemukan-->   

<?php
}

}
?>

</div> <!--container-->
<script type="text/javascript">
<!--
var sprytextfield21 = new Spry.Widget.ValidationTextField("sprytextfield21");
var sprytextfield22 = new Spry.Widget.ValidationTextField("sprytextfield22");

var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var sprytextarea3 = new Spry.Widget.ValidationTextarea("sprytextarea3");
var sprytextarea4 = new Spry.Widget.ValidationTextarea("sprytextarea4");
var sprytextarea5 = new Spry.Widget.ValidationTextarea("sprytextarea5");

//-->
</script>

<?php require '../view/footer.php'; ?>