<?php
//Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    require 'function.php'; 
    require 'koneksi_db.php';
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="icon" type="image/gif" href="images/favicon.gif" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Pakar Diagnosa Penyakit Gangguan Kehamilan</title>
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body onLoad="javascript: window.print()"> 

<div id="container">
    <div class="line"></div>   
    
  <div class="line"></div> 
  <div id="header">
  <div id="site_title"></div>
  <div id="site_slogan"></div>
  </div>
  
  <div class="line"></div>    
	
    <div id="content" align="center">
	
      
      
      <div id="right_column" align="center">
	  <center>
	  <?php
	  
	  
$id=$_GET['id'];
$username = $_SESSION['SESS_USERNAME'];
$qry = mysql_query("SELECT * FROM hasil_diagnosa,data_user WHERE hasil_diagnosa.id_diagnosa='$id' AND hasil_diagnosa.username=data_user.username");
$data = mysql_fetch_array($qry);
       
	if ($data['kode_penyakit']!=''){

	$qry = mysql_query("SELECT * FROM hasil_diagnosa, penyakit,data_user WHERE penyakit.kode_penyakit=hasil_diagnosa.kode_penyakit AND id_diagnosa='$id' AND hasil_diagnosa.username=data_user.username");
  $data = mysql_fetch_array($qry);
?>

<div class="text-area-user" align="justify">  
<br>
<div class="title">
  <div align="center"><h2>DIAGNOSA GANGGUAN KEHAMILAN</h2></div>
</div>

<table  cellpadding="5" width="100%">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle"><h3>Biodata User Pasien </h3></td>
    </tr>
  <tr>
    <td width="33%"><strong>Nama </strong></td>
    <td width="2%">:</td>
    <td width="65%"><?php 	echo $data['nama_user'];?></td>
  </tr>
   <tr>
    <td><strong>Usia</strong></td>
    <td>:</td>
    <td><?php echo $data['usia'];?> tahun</td>
  </tr>
  <tr>
    <td><strong>Jenis Kelamin</strong></td>
    <td>:</td>
    <td><?php if ($data['jenis_kelamin']=='L') echo "Laki-laki"; else echo "Perempuan";?></td>
  </tr>
  <tr>
    <td><strong>Alamat</strong></td>
    <td>:</td>
    <td><?php echo $data['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td colspan="3" class="subtitle"><h3>Hasil Diagnosa</h3></td>
    </tr>
  
  <tr>
    <td valign="top"><div align="right"><strong>Tipe Penyakit DM </strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['nama_penyakit'];?></td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Persentase</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php $persentase=$data['persentase'];  
                      if($persentase>100){
                        echo '100';
                          }else{
                        echo $data['persentase'];
          }?> persen</td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Gejala Umum</strong></div></td>
    <td valign="top">:</td>
    <td>
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
			?>    </td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Definisi</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['definisi'];?></td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Pengobatan</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['pengobatan'];?></td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Pencegahan</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['pencegahan'];?></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Waktu Diagnosa</strong></div></td>
    <td>:</td>
    <td><?php echo tgl_indo($data['tanggal_diagnosa']);?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
</table>
</div>

   	 		
    </div>
	<div id="footer" align="center">
    
    </div>
</div>
</center>
</body>
</html>
<?php
}