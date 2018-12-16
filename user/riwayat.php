<?php 
	//Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require '../controller/koneksi_db.php';
    require '../controller/auth.php';
    require '../controller/function.php';
    require '../controller/halaman.php';
    require '../view/header.php'; 
    require 'navbar.php';?>


<div class="container">

    <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading">Riwayat Hasil Diagnosa</div>
            
            <?php
                $username = $_SESSION['SESS_USERNAME'];
                $cek_hasil=mysql_num_rows(mysql_query("SELECT * FROM hasil_diagnosa WHERE  username='$username'"));
		        if ($cek_hasil>0){
            ?>

            <div class="panel-body">
            <?php  $jmldata= mysql_num_rows(mysql_query("SELECT * FROM hasil_diagnosa")); echo "<label>Terdapat :&nbsp;</label>$jmldata record gejala";?>
                <table class="table table-hover">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Tanggal Diagnosa</th>
                            <th>Nama</th>
                            <th>Hasil Diagnosa</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <?php
                    
                            $username = $_SESSION['SESS_USERNAME'];
                            $p = new Paging;
                            $batas = 10;
                            $posisi = $p->cariPosisi($batas);
                            $no=0;
                            $qlog = mysql_query("SELECT * FROM hasil_diagnosa WHERE username='$username' ORDER BY tanggal_diagnosa ASC LIMIT $posisi,$batas");
                                while($data = mysql_fetch_array($qlog)){
                                    $tanggal = tgl_indo($data['tanggal_diagnosa']);
                                    $no++;
                    ?>

                    <tbody>
                        <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
                            <td><?php echo $no;?></td>
                            <td><div><?php echo $tanggal;?></div></td>
                            <td>
                            <?php 
        
                                $dnama = mysql_query("SELECT * FROM data_user WHERE username='$username'");
                                $nama = mysql_fetch_array($dnama);
                                
                                echo $nama['nama_user'];?></td>
                                <td>
                                    <?php 
                                        $qpenyakit = mysql_query("SELECT * FROM penyakit WHERE kode_penyakit='$data[kode_penyakit]'");
                                        if(mysql_num_rows($qpenyakit)){
                                            $penyakit = mysql_fetch_array($qpenyakit);
                                            $persentase = $data['persentase'];
                                            if($persentase>100){
                                                $persentase = 100;
                                            }else{
                                                $persentase = $persentase;
                                            }
                                            echo $penyakit['nama_penyakit']."&nbsp;(".$persentase."%)";
                                            }
                                            else{
                                                echo 'Tidak Mengalami Penyakit';
                                            }
                                    ?>
                                </td>
                                <td>
                                    <a href="detail.php?page=8&act=detail&user=<?php echo $username;?>&id=<?php echo $data['id_diagnosa'];?>" class="btn btn-success btn-sm" data-toggle="tooltip"  data-placement="top" title="Detail"><span class="glyphicon glyphicon-list"></span></a>
                                </td>
                        </tr>

                    </tbody>
                    <?php
                    } //while
                    ?>                               
                </table>        
                <?php
                    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM gejala"));
                    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                    $linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
                    echo "<br><center>$linkHalaman</center>";
                ?>
            </div> <!--panel body-->
            <?php
            }   //if hasil > 0
            ?>
    </div> <!--panel riwayat-->

</div> <!--container-->


<?php 
require '../view/footer.php'; ?>