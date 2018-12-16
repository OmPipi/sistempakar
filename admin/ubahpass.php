<?php
    require '../view/header.php';
    require 'navbar.php';
?>

<link href="style.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationTextArea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextArea.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style2 {
	font-size: xx-small;
	font-style: italic;
	color: #333333;
}
-->
</style>

<?php
	require_once('../controller/auth.php');
	include("../controller/koneksi_db.php");
	$act=$_GET['act'];
	$username = $_GET['user'];
	if ($act=="ubahpass"){
?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<br /><br /><br />
<div class="container">
<div class="panel panel-info" align="justify">      
<div class="panel-heading"><h4>Ubah Password  <?php echo $username;?></h4></div>
<?php
    $username = $_GET['user'];
	$qry = mysql_query("SELECT * FROM data_pakar WHERE username='$username'");
	$data = mysql_fetch_array($qry);

	
?>

<div class="panel-body" align="justify">
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<form action="?act=acubahpass&user=<?php echo $username;?>" method="post" align="left" cellpadding="5">
<table width="100%">
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td valign="top">Username</td>
    <td valign="top">:</td>
    <td valign="bottom" >
    <div class="col-md-4"><input class="form-control" name="username" type="text" size="30" maxlength="30" disabled value="<?php echo $username;?>"/></div>
	  
</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    
  </tr>
    <tr>
    <td valign="top">Password Lama</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword9">
    <div class="col-md-4"><input class="form-control" name="passwordlama" type="password" id="passwordlama" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  </td>
	   
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Password Baru</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword99">
    <div class="col-md-4"><input class="form-control" name="passwordbaru" type="password" id="passwordbaru" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  <br>
	  <span class="style2">Panjang minimal 6 karakter.</span>
	  </td>
	   
  </tr>
  <tr>
    <td>Konfirmasi Password Baru</td>
    <td>:</td>
    <td><span id="spryconfirm">
    <div class="col-md-4"><input class="form-control" name="passwordbaru2" type="password" size="15" maxlength="30" /></div>
      <span class="confirmRequiredMsg"> Konfirmasi Password Harus Diisi.</span> 
         <span class="confirmInvalidMsg"> Password Harus Cocok.</span></span></td>
  </tr>
   <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td colspan="3"><div class="subtitle">Jika Anda Lupa Password</div></td>
  </tr>
  <tr>
    <td>Pilih Pertanyaan Rahasia</td>
    <td>:</td>
    <td><div class="col-md-4"><select class="form-control" name="pertanyaan" id="pertanyaan">
        <option value="Apa Makanan Favorit Anda?">Apa Makanan Favorit Anda?</option>
		<option value="Apa Buku Favorit Anda?">Apa Buku Favorit Anda?</option>
		<option value="Apa Nama Sekolah Dasar Anda?">Apa Nama Sekolah Dasar Anda?</option>
		<option value="Siapa Nama Sahabat Anda Waktu Masih Kecil?">Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
		<option value="Siapa Nama Guru Favorit Anda?">Siapa Nama Guru Favorit Anda?</option>
        <option value="Di Kota Manakah Ibu Anda Lahir?">Di Kota Manakah Ibu Anda Lahir?</option>
      </select></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Jawaban Anda</td>
    <td>:</td>
    <td><span id="sprytextfield889">
    <div class="col-md-4"><input class="form-control" name="jawaban" type="text" size="30" maxlength="30"></div>
	  <span class="textfieldRequiredMsg"> Jawaban harus diisi.</span>
	  </span></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
	<td>Masukan Angka Berikut</td>
	<td>:</td>
	<td><span id="sprytextfield779">
	<div class="col-md-4"><img src="../controller/captcha.php?width=100&height=40&character=4" /></div><br><br>
    <div class="col-md-4"><input class="form-control" id="security_code" name="security_code" type="text" size="12"/></div>
	<span class="textfieldRequiredMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMinCharsMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMaxCharsMsg"> Angka harus diisi dengan benar.</span></span></td>
  
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="bottom">
    <button type="submit" name="tombol" class="btn btn-info" onclick="return confirm('Apakah anda yakin data sudah benar?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                

	</td>
    </tr>
</table>
</form>
</div>
</div>
</div>
<?php
}
elseif ($act=="acubahpass"){
	
		
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
		
	$username = $_GET['user'];
	$pertanyaan = $_POST['pertanyaan'];
	$jawaban = clean($_POST['jawaban']);
	$passwordlama = $_POST['passwordlama'];
	$passwordbaru = $_POST['passwordbaru'];
	
	
	
	

	
if( isset($_POST['tombol'])) {
   if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
   
    $cek = mysql_num_rows(mysql_query("SELECT * FROM data_pakar WHERE username='$username' and password='".md5($_POST['passwordlama'])."'"));
	
	if ($cek>0){
	   $qry= mysql_query("UPDATE data_pakar SET password='".md5($_POST['passwordbaru'])."',  
	   pertanyaan='$pertanyaan', jawaban='".md5($_POST['jawaban'])."' WHERE username='$username'");
	   
	   echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=berhasil&user=$username\">";
	}else{
	echo  "<meta http-equiv=\"refresh\" content=\"0; url=?act=gagal&user=$username\">";
	}
	
	
	}else{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=gagal2&user=$username\">";
	}
}
	
}

elseif ($act=="berhasil"){
?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<br /><br /><br />
<div class="container">
<div class="panel panel-info" align="justify">      
<div class="panel-heading"><h4>Password <?php echo $username;?> Berhasil Diperbarui</h4></div>
<?php
    $username = $_GET['user'];
	$qry = mysql_query("SELECT * FROM data_pakar WHERE username='$username'");
	$data = mysql_fetch_array($qry);

	
?>

<div class="panel-body" align="justify">
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<form action="?act=acubahpass&user=<?php echo $username;?>" method="post" align="left" cellpadding="5">
<table width="100%">
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td valign="top">Username</td>
    <td valign="top">:</td>
    <td valign="bottom" >
    <div class="col-md-4"><input class="form-control" name="username" type="text" size="30" maxlength="30" disabled value="<?php echo $username;?>"/></div>
	  
</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    
  </tr>
    <tr>
    <td valign="top">Password Lama</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword9">
    <div class="col-md-4"><input class="form-control" name="passwordlama" type="password" id="passwordlama" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  </td>
	   
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Password Baru</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword99">
    <div class="col-md-4"><input class="form-control" name="passwordbaru" type="password" id="passwordbaru" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  <br>
	  <span class="style2">Panjang minimal 6 karakter.</span>
	  </td>
	   
  </tr>
  <tr>
    <td>Konfirmasi Password Baru</td>
    <td>:</td>
    <td><span id="spryconfirm">
    <div class="col-md-4"><input class="form-control" name="passwordbaru2" type="password" size="15" maxlength="30" /></div>
      <span class="confirmRequiredMsg"> Konfirmasi Password Harus Diisi.</span> 
         <span class="confirmInvalidMsg"> Password Harus Cocok.</span></span></td>
  </tr>
   <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td colspan="3"><div class="subtitle">Jika Anda Lupa Password</div></td>
  </tr>
  <tr>
    <td>Pilih Pertanyaan Rahasia</td>
    <td>:</td>
    <td><div class="col-md-4"><select class="form-control" name="pertanyaan" id="pertanyaan">
        <option value="Apa Makanan Favorit Anda?">Apa Makanan Favorit Anda?</option>
		<option value="Apa Buku Favorit Anda?">Apa Buku Favorit Anda?</option>
		<option value="Apa Nama Sekolah Dasar Anda?">Apa Nama Sekolah Dasar Anda?</option>
		<option value="Siapa Nama Sahabat Anda Waktu Masih Kecil?">Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
		<option value="Siapa Nama Guru Favorit Anda?">Siapa Nama Guru Favorit Anda?</option>
        <option value="Di Kota Manakah Ibu Anda Lahir?">Di Kota Manakah Ibu Anda Lahir?</option>
      </select></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Jawaban Anda</td>
    <td>:</td>
    <td><span id="sprytextfield889">
    <div class="col-md-4"><input class="form-control" name="jawaban" type="text" size="30" maxlength="30"></div>
	  <span class="textfieldRequiredMsg"> Jawaban harus diisi.</span>
	  </span></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
	<td>Masukan Angka Berikut</td>
	<td>:</td>
	<td><span id="sprytextfield779">
	<div class="col-md-4"><img src="../controller/captcha.php?width=100&height=40&character=4" /></div><br><br>
    <div class="col-md-4"><input class="form-control" id="security_code" name="security_code" type="text" size="12"/></div>
	<span class="textfieldRequiredMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMinCharsMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMaxCharsMsg"> Angka harus diisi dengan benar.</span></span></td>
  
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="bottom">
    <button type="submit" name="tombol" class="btn btn-info" onclick="return confirm('Apakah anda yakin data sudah benar?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                

	</td>
    </tr>
</table>
</form>
</div>
</div>
</div>

<?php

}

elseif ($act=="gagal"){
?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<br /><br /><br />
<div class="container">
<div class="panel panel-info" align="justify">      
<div class="panel-heading"><h4>Password Gagal Diperbarui</h4></div>
<?php
    $username = $_GET['user'];
	$qry = mysql_query("SELECT * FROM data_pakar WHERE username='$username'");
	$data = mysql_fetch_array($qry);

	
?>

<div class="panel-body" align="justify">
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<form action="?act=acubahpass&user=<?php echo $username;?>" method="post" align="left" cellpadding="5">
<table width="100%">
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td valign="top">Username</td>
    <td valign="top">:</td>
    <td valign="bottom" >
    <div class="col-md-4"><input class="form-control" name="username" type="text" size="30" maxlength="30" disabled value="<?php echo $username;?>"/></div>
	  
</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    
  </tr>
    <tr>
    <td valign="top">Password Lama</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword9">
    <div class="col-md-4"><input class="form-control" name="passwordlama" type="password" id="passwordlama" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  </td>
	   
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Password Baru</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword99">
    <div class="col-md-4"><input class="form-control" name="passwordbaru" type="password" id="passwordbaru" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  <br>
	  <span class="style2">Panjang minimal 6 karakter.</span>
	  </td>
	   
  </tr>
  <tr>
    <td>Konfirmasi Password Baru</td>
    <td>:</td>
    <td><span id="spryconfirm">
    <div class="col-md-4"><input class="form-control" name="passwordbaru2" type="password" size="15" maxlength="30" /></div>
      <span class="confirmRequiredMsg"> Konfirmasi Password Harus Diisi.</span> 
         <span class="confirmInvalidMsg"> Password Harus Cocok.</span></span></td>
  </tr>
   <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td colspan="3"><div class="subtitle">Jika Anda Lupa Password</div></td>
  </tr>
  <tr>
    <td>Pilih Pertanyaan Rahasia</td>
    <td>:</td>
    <td><div class="col-md-4"><select class="form-control" name="pertanyaan" id="pertanyaan">
        <option value="Apa Makanan Favorit Anda?">Apa Makanan Favorit Anda?</option>
		<option value="Apa Buku Favorit Anda?">Apa Buku Favorit Anda?</option>
		<option value="Apa Nama Sekolah Dasar Anda?">Apa Nama Sekolah Dasar Anda?</option>
		<option value="Siapa Nama Sahabat Anda Waktu Masih Kecil?">Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
		<option value="Siapa Nama Guru Favorit Anda?">Siapa Nama Guru Favorit Anda?</option>
        <option value="Di Kota Manakah Ibu Anda Lahir?">Di Kota Manakah Ibu Anda Lahir?</option>
      </select></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Jawaban Anda</td>
    <td>:</td>
    <td><span id="sprytextfield889">
    <div class="col-md-4"><input class="form-control" name="jawaban" type="text" size="30" maxlength="30"></div>
	  <span class="textfieldRequiredMsg"> Jawaban harus diisi.</span>
	  </span></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
	<td>Masukan Angka Berikut</td>
	<td>:</td>
	<td><span id="sprytextfield779">
	<div class="col-md-4"><img src="../controller/captcha.php?width=100&height=40&character=4" /></div><br><br>
    <div class="col-md-4"><input class="form-control" id="security_code" name="security_code" type="text" size="12"/></div>
	<span class="textfieldRequiredMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMinCharsMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMaxCharsMsg"> Angka harus diisi dengan benar.</span></span></td>
  
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="bottom">
    <button type="submit" name="tombol" class="btn btn-info" onclick="return confirm('Apakah anda yakin data sudah benar?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                

	</td>
    </tr>
</table>
</form>
</div>
</div>
</div>


<?php
}

elseif ($act=="gagal2"){

?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<br /><br /><br />
<div class="container">
<div class="panel panel-info" align="justify">      
<div class="panel-heading"><h4>Password Gagal Diperbarui</h4></div>
<?php
    $username = $_GET['user'];
	$qry = mysql_query("SELECT * FROM data_pakar WHERE username='$username'");
	$data = mysql_fetch_array($qry);

	
?>

<div class="panel-body" align="justify">
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<form action="?act=acubahpass&user=<?php echo $username;?>" method="post" align="left" cellpadding="5">
<table width="100%">
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td valign="top">Username</td>
    <td valign="top">:</td>
    <td valign="bottom" >
    <div class="col-md-4"><input class="form-control" name="username" type="text" size="30" maxlength="30" disabled value="<?php echo $username;?>"/></div>
	  
</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    
  </tr>
    <tr>
    <td valign="top">Password Lama</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword9">
    <div class="col-md-4"><input class="form-control" name="passwordlama" type="password" id="passwordlama" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  </td>
	   
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Password Baru</td>
    <td valign="top">:</td>
    <td valign="bottom"><span id="sprypassword99">
    <div class="col-md-4"><input class="form-control" name="passwordbaru" type="password" id="passwordbaru" size="15" maxlength="30" /></div>
	  <span class="passwordRequiredMsg"> Password Harus Diisi.</span>
	  <span class="passwordMinCharsMsg"> Minimal 6 karakter.</span></span>
	  <br>
	  <span class="style2">Panjang minimal 6 karakter.</span>
	  </td>
	   
  </tr>
  <tr>
    <td>Konfirmasi Password Baru</td>
    <td>:</td>
    <td><span id="spryconfirm">
    <div class="col-md-4"><input class="form-control" name="passwordbaru2" type="password" size="15" maxlength="30" /></div>
      <span class="confirmRequiredMsg"> Konfirmasi Password Harus Diisi.</span> 
         <span class="confirmInvalidMsg"> Password Harus Cocok.</span></span></td>
  </tr>
   <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td colspan="3"><div class="subtitle">Jika Anda Lupa Password</div></td>
  </tr>
  <tr>
    <td>Pilih Pertanyaan Rahasia</td>
    <td>:</td>
    <td><div class="col-md-4"><select class="form-control" name="pertanyaan" id="pertanyaan">
        <option value="Apa Makanan Favorit Anda?">Apa Makanan Favorit Anda?</option>
		<option value="Apa Buku Favorit Anda?">Apa Buku Favorit Anda?</option>
		<option value="Apa Nama Sekolah Dasar Anda?">Apa Nama Sekolah Dasar Anda?</option>
		<option value="Siapa Nama Sahabat Anda Waktu Masih Kecil?">Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
		<option value="Siapa Nama Guru Favorit Anda?">Siapa Nama Guru Favorit Anda?</option>
        <option value="Di Kota Manakah Ibu Anda Lahir?">Di Kota Manakah Ibu Anda Lahir?</option>
      </select></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Jawaban Anda</td>
    <td>:</td>
    <td><span id="sprytextfield889">
    <div class="col-md-4"><input class="form-control" name="jawaban" type="text" size="30" maxlength="30"></div>
	  <span class="textfieldRequiredMsg"> Jawaban harus diisi.</span>
	  </span></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
	<td>Masukan Angka Berikut</td>
	<td>:</td>
	<td><span id="sprytextfield779">
	<div class="col-md-4"><img src="../controller/captcha.php?width=100&height=40&character=4" /></div><br><br>
    <div class="col-md-4"><input class="form-control" id="security_code" name="security_code" type="text" size="12"/></div>
	<span class="textfieldRequiredMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMinCharsMsg"> Angka harus diisi dengan benar.</span>
	<span class="textfieldMaxCharsMsg"> Angka harus diisi dengan benar.</span></span></td>
  
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="bottom">
    <button type="submit" name="tombol" class="btn btn-info" onclick="return confirm('Apakah anda yakin data sudah benar?')" data-toggle="tooltip"  data-placement="top" title="Simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button> 
    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)" data-toggle="tooltip"  data-placement="top" title="Batal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                

	</td>
    </tr>
</table>
</form>
</div>
</div>
</div>


<?php
}


?>
	
<script type="text/javascript">
<!--

var sprypassword9 = new Spry.Widget.ValidationPassword("sprypassword9",{minChars:6, validateOn:["blur"]});
var sprypassword99 = new Spry.Widget.ValidationPassword("sprypassword99",{minChars:6, validateOn:["blur"]});
var sprytextfield39 = new Spry.Widget.ValidationTextField("sprytextfield39","none", {minChars:5, validateOn:["blur"]});
var sprytextfield49 = new Spry.Widget.ValidationTextField("sprytextfield49","nama", {minChars:2, validateOn:["blur"]});
var sprytextfield59 = new Spry.Widget.ValidationTextField("sprytextfield59","integer",{minValue:1,maxValue:12, maxChars:2, validateOn:["blur"]});
var sprytextfield69 = new Spry.Widget.ValidationTextField("sprytextfield69","alamat", {minChars:4, validateOn:["blur"]});
var sprytextfield779 = new Spry.Widget.ValidationTextField("sprytextfield779","none", {minChars:4,maxChars:4, validateOn:["blur"]});
var sprytextfield889 = new Spry.Widget.ValidationTextField("sprytextfield889","nama", {validateOn:["blur"]});
var spryconfirm = new Spry.Widget.ValidationConfirm("spryconfirm", "sprypassword99",{validateOn:["blur"]});

//-->
</script>
<?php require '../view/footer.php'; ?>