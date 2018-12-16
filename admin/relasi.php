<?php
	require '../controller/auth.php';
    require '../controller/koneksi_db.php';
    require '../view/header.php';
    require 'navbar.php';
?>


<?php  
$act = $_GET['act'];
if($act=="relasi"){
@$kode_penyakit = $_GET['kode_penyakit'];
?>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<br />
<br />
<br />
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Manajemen Data Relasi</h4></div>
            <div class="panel-body">
                <form method="post" action="?act=simpanrelasi">
                    <table cellpadding="5" width="100%">
<tr>
    <td colspan="3"></td>
    
  </tr>
  <tr>
    <td class="subtitle"><div class="col-md-3">Nama Penyakit</div></td>
  </tr>
  <tr>
    <td><div class="col-md-3">
      <select class="form-control" name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="?act=relasi&kode_penyakit" selected="selected">[ Nama Penyakit ]</option>
        <?php
				$qryp = mysql_query("SELECT * FROM penyakit");
				while($datap = mysql_fetch_array($qryp)){
					if($datap['kode_penyakit']==$kode_penyakit){
						$cek = "selected";
					}
					else{
						$cek = "";
					}
					echo "<option value='?act=relasi&kode_penyakit=$datap[kode_penyakit]' $cek>$datap[nama_penyakit]</option>";
				}
				?>
      </select></div>
      <input type="hidden" name="kode_penyakit" value="<?php echo $kode_penyakit;?>" /></td>
    </tr>
    <br>

  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td class="subtitle"><div class="col-md-3">Daftar Gejala</div></td>
  </tr>
	<?php
	$no=0;
  $qry = mysql_query("SELECT * FROM gejala ORDER BY kode_gejala");
	while ($data=mysql_fetch_array($qry)){
		$no++;
		$qryr = mysql_query("SELECT * FROM relasi_penyakit_gejala WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$data[kode_gejala]'");
		$cocok = mysql_num_rows($qryr);
		if($cocok==1){
			$cek = "checked";
		}
		else{
			$cek = "";
		}
	?>
  <tr>
    <td><div class="col-md-8"><input type="checkbox" name="cekgejala[]" value="<?php echo $data['kode_gejala'];?>" <?php echo $cek;?> />&nbsp;<?php echo "[".$data['kode_gejala']."]&nbsp;".$data['nama_gejala'];?></div></td>
    </tr>
  <?php }?>
  <tr><td></td></tr>
  <tr>
    <td colspan="3"></td>
    
  </tr>
    <tr>   
        <td align="center" class="judul">
            <button type="submit" name="simpan" value="Simpan" onclick="return confirm('Apakah anda yakin data relasi ini akan disimpan?')" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-plus"></span> Simpan</button>
            <Button type="reset" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Reset"><span class="glyphicon glyphicon-refresh"></span> Reset</Button>
            <a href="index.php" class="btn btn-info btn-sm" data-toggle="tooltip"  data-placement="top" title="kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</Button>
        </td>
    </tr>
</table>
</form>
</div>
<?php
}

if($act=="berhasil"){
$kode_penyakit = $_GET['kode_penyakit'];
?>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<br />
<br />
<br />
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Data Relasi Berhasil Diperbarui</h4></div>
            <div class="panel-body">
                <form method="post" action="?act=simpanrelasi">
                    <table cellpadding="5" width="100%">
<tr>
    <td colspan="3"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Nama Penyakit</td>
  </tr>
  <tr>
    <td><div class="col-md-3">
      <select class="form-control" name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="?act=relasi&kode_penyakit" selected="selected">[ Nama Penyakit ]</option>
        <?php
				$qryp = mysql_query("SELECT * FROM penyakit");
				while($datap = mysql_fetch_array($qryp)){
					if($datap['kode_penyakit']==$kode_penyakit){
						$cek = "selected";
					}
					else{
						$cek = "";
					}
					echo "<option value='?act=relasi&kode_penyakit=$datap[kode_penyakit]' $cek>$datap[nama_penyakit]</option>";
				}
				?>
      </select></div>
      <input type="hidden" name="kode_penyakit" value="<?php echo $kode_penyakit;?>" /></td>
    </tr>
    <br>

  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td class="subtitle">Daftar Gejala</td>
  </tr>
	<?php
	$no=0;
  $qry = mysql_query("SELECT * FROM gejala ORDER BY kode_gejala");
	while ($data=mysql_fetch_array($qry)){
		$no++;
		$qryr = mysql_query("SELECT * FROM relasi_penyakit_gejala WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$data[kode_gejala]'");
		$cocok = mysql_num_rows($qryr);
		if($cocok==1){
			$cek = "checked";
		}
		else{
			$cek = "";
		}
	?>
  <tr>
    <td><input type="checkbox" name="cekgejala[]" value="<?php echo $data['kode_gejala'];?>" <?php echo $cek;?> />&nbsp;<?php echo "[".$data['kode_gejala']."]&nbsp;".$data['nama_gejala'];?></td>
    </tr>
  <?php }?>
  <tr><td></td></tr>
  <tr>
    <td colspan="3"></td>
    
  </tr>
    <tr>   
        <td align="center" class="judul">
            <button type="submit" name="simpan" value="Simpan" onclick="return confirm('Apakah anda yakin data relasi ini akan disimpan?')" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-plus"></span> Simpan</button>
            <Button type="reset" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Reset"><span class="glyphicon glyphicon-refresh"></span> Reset</Button>
            <a href="index.php" class="btn btn-info btn-sm" data-toggle="tooltip"  data-placement="top" title="kembali"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</Button>
        </td>
    </tr>
</table>
</form>
</div>
<?php
}


elseif($act=="simpanrelasi"){
	$kode_penyakit = $_POST['kode_penyakit'];
	@$cekgejala = $_POST['cekgejala'];
	
	$jum = count($cekgejala);
	if($jum==0){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=relasi\">";
	}
	else{
		$qpil = mysql_query("SELECT * FROM relasi_penyakit_gejala WHERE kode_penyakit='$kode_penyakit'");
		while($datapil = mysql_fetch_array($qpil)){
			for($i = 0; $i < $jum; ++$i){
				if($datapil['kode_gejala'] != $cekgejala[$i]){
					mysql_query("DELETE FROM relasi_penyakit_gejala WHERE kode_penyakit='$kode_penyakit' AND NOT kode_gejala IN('$cekgejala[$i]')");
				}
			}
		}
		for($i = 0; $i < $jum; ++$i){
			$qryr = mysql_query("SELECT * FROM relasi_penyakit_gejala WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$cekgejala[$i]'");
			$cocok = mysql_num_rows($qryr);
			if(!$cocok==1){
				mysql_query("INSERT INTO relasi_penyakit_gejala(kode_penyakit, kode_gejala) VALUES('$kode_penyakit', '$cekgejala[$i]')");
				$gejala = $cekgejala[$i].",";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=berhasil\">";
			}
		}
		echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=relasi&kode_penyakit&act=berhasil\">";
	}
}
?>

	
