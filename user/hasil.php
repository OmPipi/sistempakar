  <?php
 
    require '../view/header.php';
    require 'navbar.php';
    require "../controller/koneksi_db.php";
    require "../controller/function.php";
    $user=$_SESSION['SESS_USERNAME'];
  ?>

  <?php
    $act=$_GET['act'];  
    if ($act=="selesai"){ 
    $qry = mysql_query("SELECT * FROM hasil_diagnosa, penyakit, data_user WHERE penyakit.kode_penyakit=hasil_diagnosa.kode_penyakit AND hasil_diagnosa.username='$user' AND hasil_diagnosa.username=data_user.username ORDER BY hasil_diagnosa.id_diagnosa DESC LIMIT 1");
    $data = mysql_fetch_array($qry);
    $id = $data['id_diagnosa'];
    mysql_query("TRUNCATE TABLE `tmp_analisa`");
    mysql_query("TRUNCATE TABLE `tmp_gejala`");
    mysql_query("TRUNCATE TABLE `tmp_penyakit`");
    ?>


<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          <h2 class="text-center">HASIL DIAGNOSA</h2>
        </div>
      </div>
      <div class="panel-body" style="padding:50px;">
      <form action="javascript: void(0)" method="post" class="text-justify" padding-right="50px" cellpadding="5">
        <table width="100%"  cellpadding="5">
          <tr>
            <td colspan="3"><hr color="#AAAAAA"></td>
          </tr>
          <tr>
            <td height="30" colspan="3" class="subtitle"><h3>Biodata Ibu Hamil (Pasien)</h3></td>
          </tr>
          <tr>
            <td width="22%"><strong>Nama  </strong></td>
            <td width="2%">:</td>
            <td width="76%"><?php echo $data['nama_user'];?></td>
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
            <td colspan="3"><hr color="#AAAAAA" class="style3"></td>
          </tr>
          <tr>
            <td colspan="3" class="subtitle"><h3>Hasil Diagnosa</h3></td>
          </tr>
          
          <tr>
            <td><div align="right"><strong>Tipe Penyakit DM</strong></div></td>
            <td>:</td>
            <td><?php echo $data['nama_penyakit'];?></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Persentase</strong></div></td>
            <td>:</td>
            <td>
          <?php 
          $persentase = $data['persentase'];
          if($persentase>100){
              echo '100';
          }else{
              echo $data['persentase'];
          }
          ?> persen</td>
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
                    ?>    
            </td>
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
          <tr>
            <td colspan="3" align="center">
            <button name="submit" class="btn btn-success" onclick="popup('../controller/cetak.php?user=<?php echo $user;?>&id=<?php echo $id;?>')" >Cetak</button></td>
          </tr>
        </table>
      </form>
      </div><!--panel body-->
    </div><!--panel-->
  </div><!--col-md-10 col-md-offset-1-->
</div> <!--container-->
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 580;
 var height = 300;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=yes';
 params += ', scrollbars=yes';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'funnyfacebox', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>
<?php
    }
?>

<?php
 if ($act=="hasil0"){
  $qry = mysql_query("SELECT * FROM hasil_diagnosa, data_user WHERE hasil_diagnosa.username='$user' AND hasil_diagnosa.username=data_user.username ORDER BY hasil_diagnosa.id_diagnosa DESC LIMIT 1");
  $data = mysql_fetch_array($qry);
  $id = $data['id_diagnosa'];
  mysql_query("TRUNCATE TABLE `tmp_analisa`");
  mysql_query("TRUNCATE TABLE `tmp_gejala`");
  mysql_query("TRUNCATE TABLE `tmp_penyakit`");
  ?>
  

<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          <h2 class="text-center">HASIL DIAGNOSA</h2>
        </div>
      </div>
      <div class="panel-body" style="padding:50px;">
      <form action="javascript: void(0)" method="post" class="text-justify" padding-right="50px" cellpadding="5">
        <table width="100%"  cellpadding="5">
          <tr>
            <td colspan="3"><hr color="#AAAAAA"></td>
          </tr>
          <tr>
            <td height="30" colspan="3" class="subtitle"><h3>Biodata Ibu Hamil (Pasien)</h3></td>
          </tr>
          <tr>
            <td width="22%"><strong>Nama  </strong></td>
            <td width="2%">:</td>
            <td width="76%"><?php echo $data['nama_user'];?></td>
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
            <td colspan="3"><hr color="#AAAAAA" class="style3"></td>
          </tr>
          <tr>
            <td colspan="3" class="subtitle"><h3>Hasil Diagnosa</h3></td>
          </tr>
          <tr>
            <td valign="top"><div align="right"><strong>Kesimpulan</strong></div></td>
            <td valign="top">:</td>
            <td valign="top">Hasil kesimpulan diagnosa, Anda sehat.</td>
          </tr>          
          <tr>
            <td><div align="right"><strong>Waktu Diagnosa</strong></div></td>
            <td>:</td>
            <td><?php echo tgl_indo($data['tanggal_diagnosa']);?></td>
          </tr>
          <tr>
          <td colspan="3"><hr color="#AAAAAA"></td>
          </tr>
          <tr>
            <td colspan="3" align="center">
            <button name="submit" class="btn btn-success" onclick="popup('../controller/cetak0.php?user=<?php echo $user;?>&id=<?php echo $id;?>')" >Cetak</button></td>
          </tr>
        </table>
      </form>
      </div><!--panel body-->
    </div><!--panel-->
  </div><!--col-md-10 col-md-offset-1-->
</div> <!--container-->
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 580;
 var height = 300;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=yes';
 params += ', scrollbars=yes';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'funnyfacebox', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>












  
  
  <?php
  }
?>
<?php include '../view/footer.php'; ?>