<?php
require "auth.php";
require "function.php";
require "koneksi_db.php";


$act=$_GET['act'];
@$induk=$_GET['induk'];
$user=$_SESSION['SESS_USERNAME'];
@$s=$_GET['s'];

if($act=="diagnosa" OR " "){
	if($induk==""){
	  $induk='';
	  $s ='';
	  $sqlg = "SELECT * FROM gejala where  kode_induk_ya='$induk' AND kode_induk_tidak='$s'";
	  }else{
	  $induk   = $_GET['induk'];
	  $sqlg = "SELECT * FROM gejala where  kode_induk_ya='$induk'";
	  }
	
	if($s!=''){
	  $s   = $_GET['s'];
	  $sqlg = "SELECT * FROM gejala where  kode_induk_tidak='$s'";
	}
	$qryg = mysql_query($sqlg);
	$datag = mysql_fetch_array($qryg);
	
	$kode_gejala  = $datag['kode_gejala'];
    $nama_gejala  = $datag['nama_gejala'];

    $user=$_SESSION['SESS_USERNAME'];
    $cek_induk=mysql_num_rows(mysql_query("SELECT * FROM gejala where  kode_induk_ya='$induk'"));
    $cek_simpul=mysql_num_rows(mysql_query("SELECT * FROM gejala where  kode_induk_tidak='$s'"));
    $sql_cekh = "SELECT * FROM tmp_penyakit 
                 WHERE username='$user' 
                 GROUP BY kode_penyakit";
    $qry_cekh = mysql_query($sql_cekh);
    $hsl_cekh = mysql_num_rows($qry_cekh);
    if ($cek_induk == 0 or $cek_simpul==0) {
        
        $hsl_data = mysql_fetch_array($qry_cekh);
        $cek_gejala_valid=mysql_num_rows(mysql_query("SELECT * FROM tmp_gejala where status='1'"));
        $cek_gejala_penyakit=mysql_num_rows(mysql_query("SELECT relasi_penyakit_gejala.* FROM relasi_penyakit_gejala,tmp_penyakit where relasi_penyakit_gejala.kode_penyakit=tmp_penyakit.kode_penyakit"));
        $hasilbobot= mysql_query("SELECT bobot
                FROM relasi_penyakit_gejala, tmp_gejala
                WHERE kode_penyakit = '$hsl_data[kode_penyakit]'
                AND relasi_penyakit_gejala.kode_gejala = tmp_gejala.kode_gejala
                AND tmp_gejala.status =1");
        
        $bobot = mysql_fetch_array($hasilbobot);
        $jum = mysql_num_rows($hasilbobot);
        $persentase = 0;
        for($i = 0; $i < $jum; ++$i){
                $persentase=$persentase + $bobot['bobot'];
                }
        
        if ($persentase==0){
            $sql_pasien = "SELECT * FROM data_user WHERE username='$user'";
            $qry_pasien = mysql_query($sql_pasien);
            $hsl_pasien = mysql_fetch_array($qry_pasien);
            $sql_in = "INSERT INTO hasil_diagnosa SET
                      username='$hsl_pasien[username]',
                      kode_penyakit='',
                      tanggal_diagnosa=NOW(),
                      persentase='0'";
            mysql_query($sql_in);
                           
        echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=hasil0\">";
        exit;
        }else{	
        $sql_pasien = "SELECT * FROM data_user WHERE username='$user'";
        $qry_pasien = mysql_query($sql_pasien);
        $hsl_pasien = mysql_fetch_array($qry_pasien);
            $sql_in = "INSERT INTO hasil_diagnosa SET
                      username='$hsl_pasien[username]',
                      kode_penyakit='$hsl_data[kode_penyakit]',
                      tanggal_diagnosa=NOW(),
                      persentase='$persentase'";
            mysql_query($sql_in);
                           
        echo "<meta http-equiv=\"refresh\" content=\"0; url=hasil.php?user=$user&act=selesai\">";
        exit;
        }
    }
        
}

if($act=="diagnosis"){
	
    # Baca variabel Form (If Register Global ON)
    $jawaban 	= $_REQUEST['jawaban'];
    $kode_gejala   = $_REQUEST['kode_gejala'];
    $nama_gejala  = "";
    
    # Mendapatkan username
    $user=$_SESSION['SESS_USERNAME'];
    
    # Fungsi untuk menambah data ke tmp_analisa
    function AddTmpAnalisa($kode_gejala, $user) {
        $sql_sakit = "SELECT relasi_penyakit_gejala.* FROM relasi_penyakit_gejala,tmp_penyakit 
                      WHERE relasi_penyakit_gejala.kode_penyakit=tmp_penyakit.kode_penyakit 
                      AND username='$user' ORDER BY relasi_penyakit_gejala.kode_penyakit,relasi_penyakit_gejala.kode_gejala";
        $qry_sakit = mysql_query($sql_sakit);
        while ($data_sakit = mysql_fetch_array($qry_sakit)) {
            $sqltmp = "INSERT INTO tmp_analisa (username, kode_penyakit,kode_gejala)
                        VALUES ('$user','$data_sakit[kode_penyakit]','$data_sakit[kode_gejala]')";
            mysql_query($sqltmp);
        }
    }
    
    # Fungsi tambah tabel tmp_gejala
    function AddTmpGejala($kode_gejala, $user,$status) {
        $sql_gejala = "INSERT INTO tmp_gejala (username,kode_gejala,status) VALUES ('$user','$kode_gejala','$status')";
        mysql_query($sql_gejala);
    }
    
    # Fungsi hapus tabel tmp_sakit
    function DelTmpSakit($user) {
        $sql_del = "DELETE FROM tmp_penyakit WHERE username='$user'";
        mysql_query($sql_del);
    }
    
    # Fungsi hapus tabel tmp_analisa
    function DelTmpAnlisa($user) {
        $sql_del = "DELETE FROM tmp_analisa WHERE username='$user'";
        mysql_query($sql_del);
    }
    
    # PEMERIKSAAN
    if ($jawaban == "Y") {
        $sql_analisa = "SELECT * FROM tmp_analisa ";
        $qry_analisa = mysql_query($sql_analisa);
        $data_cek = mysql_num_rows($qry_analisa);
        if ($data_cek >= 1) {
            # Kode saat tmp_analisa tidak kosong
            DelTmpSakit($user);
            $sql_tmp = "SELECT * FROM tmp_analisa 
                        WHERE kode_gejala='$kode_gejala' 
                        AND username='$user'";
            $qry_tmp = mysql_query($sql_tmp);
            while ($data_tmp = mysql_fetch_array($qry_tmp)) {
                $sql_rsakit = "SELECT * FROM relasi_penyakit_gejala 
                                WHERE kode_penyakit='$data_tmp[kode_penyakit]' 
                                GROUP BY kode_penyakit";
                $qry_rsakit = mysql_query($sql_rsakit);
                while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
                    // Data penyakit yang mungkin dimasukkan ke tmp
                    $sql_input = "INSERT INTO tmp_penyakit (username,kode_penyakit)
                                 VALUES ('$user','$data_rsakit[kode_penyakit]')";
                    mysql_query($sql_input);
                }
            } 
            // Gunakan Fungsi
            DelTmpAnlisa($user);
            AddTmpAnalisa($kode_gejala, $user);
            $status = '1';
            AddTmpGejala($kode_gejala, $user,$status);
            
            
        }	
        else {
            # Kode saat tmp_analisa kosong
            $sql_rgejala = "SELECT * FROM relasi_penyakit_gejala WHERE kode_gejala='$kode_gejala'";
            $qry_rgejala = mysql_query($sql_rgejala);
            while ($data_rgejala = mysql_fetch_array($qry_rgejala)) {
                $sql_rsakit = "SELECT * FROM relasi_penyakit_gejala 
                               WHERE kode_penyakit='$data_rgejala[kode_penyakit]' 
                               GROUP BY kode_penyakit";
                $qry_rsakit = mysql_query($sql_rsakit);
                while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
                    // Data penyakit yang mungkin dimasukkan ke tmp
                    $sql_input = mysql_query("INSERT INTO tmp_penyakit (username,kode_penyakit)
                                 VALUES ('$user','$data_rsakit[kode_penyakit]')");
                }
            } 
            // Menggunakan Fungsi
            AddTmpAnalisa($kode_gejala, $user);
            $status = '1';
            AddTmpGejala($kode_gejala, $user,$status);
            
        }
        echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=diagnosa&induk=$kode_gejala\">";
    }
    
    
    if ($jawaban == "T") {
        $sql_analisa = "SELECT * FROM tmp_analisa ";
        $qry_analisa = mysql_query($sql_analisa);
        $data_cek = mysql_num_rows($qry_analisa);
        if ($data_cek >= 1) {
            # Kode saat tmp_analisa tidak kosong
            DelTmpSakit($user);
            $sql_tmp = "SELECT * FROM tmp_analisa 
                        WHERE kode_gejala='$kode_gejala' 
                        AND username='$user'";
            $qry_tmp = mysql_query($sql_tmp);
            while ($data_tmp = mysql_fetch_array($qry_tmp)) {
                $sql_rsakit = "SELECT * FROM relasi_penyakit_gejala 
                                WHERE kode_penyakit='$data_tmp[kode_penyakit]' 
                                GROUP BY kode_penyakit";
                $qry_rsakit = mysql_query($sql_rsakit);
                while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
                    // Data penyakit yang mungkin dimasukkan ke tmp
                    $sql_input = "INSERT INTO tmp_penyakit (username,kode_penyakit)
                                 VALUES ('$user','$data_rsakit[kode_penyakit]')";
                    mysql_query($sql_input);
                }
            } 
            // Gunakan Fungsi
            DelTmpAnlisa($user);
            AddTmpAnalisa($kode_gejala, $user);
            $status = '0';
            AddTmpGejala($kode_gejala, $user,$status);
        }	
        else {
            # Kode saat tmp_analisa kosong
            $sql_rgejala = "SELECT * FROM relasi_penyakit_gejala WHERE kode_gejala='$kode_gejala'";
            $qry_rgejala = mysql_query($sql_rgejala);
            while ($data_rgejala = mysql_fetch_array($qry_rgejala)) {
                $sql_rsakit = "SELECT * FROM relasi_penyakit_gejala 
                               WHERE kode_penyakit='$data_rgejala[kode_penyakit]' 
                               GROUP BY kode_penyakit";
                $qry_rsakit = mysql_query($sql_rsakit);
                while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
                    // Data penyakit yang mungkin dimasukkan ke tmp
                    $sql_input = mysql_query("INSERT INTO tmp_penyakit (username,kode_penyakit)
                                 VALUES ('$user','$data_rsakit[kode_penyakit]')");
                }
            } 
            // Menggunakan Fungsi
            AddTmpAnalisa($kode_gejala, $user);
            $status = '0';
            AddTmpGejala($kode_gejala, $user,$status);
        }
        echo "<meta http-equiv=\"refresh\" content=\"0; url=?act=diagnosa&s=$kode_gejala&induk=$kode_gejala\">";
    }
    
    
    
    }
    
    
    if ($act=="hasil0"){
        echo "<meta http-equiv=\"refresh\" content=\"0; url=hasil.php?act=hasil0\">";
    }
    ?>