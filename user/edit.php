<?php
    function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	    }

 
        if( isset($_POST['ubah'])) {
        if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
            $nama_user = clean($_POST['nama_user']);
            $usia = clean($_POST['usia']);
            $jenis_kelamin = clean($_POST['jenis_kelamin']);
            $alamat = clean($_POST['alamat']);
    
        $cek = mysql_num_rows(mysql_query("SELECT * FROM data_user WHERE username='$username'"));
     
        if ($cek>0){
            $qry= mysql_query("UPDATE data_user SET nama_user='$nama_user', usia='$usia', jenis_kelamin='$jenis_kelamin', alamat='$alamat'
            WHERE username='$username'");
        
            echo "<meta http-equiv=\"refresh\" content=\"0; url=profil.php?act=berhasil&u=$username\">";
            }else{
                echo  "<meta http-equiv=\"refresh\" content=\"0; url=profil.php?act=gagal&u=$username\">";
                }
            }else{
                echo "<meta http-equiv=\"refresh\" content=\"0; url=profil.php?act=gagallagi&u=$username\">";
                }
        }

        if( isset($_POST['ubahpass'])) {
            if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
	            $pertanyaan = $_POST['pertanyaan'];
	            $jawaban = clean($_POST['jawaban']);
	            $passwordlama = $_POST['passwordlama'];
	            $passwordbaru = $_POST['passwordbaru'];

             $cek = mysql_num_rows(mysql_query("SELECT * FROM data_user WHERE username='$username' and password='".md5($_POST['passwordlama'])."'"));
             
             if ($cek>0){
                $qry= mysql_query("UPDATE data_user SET password='".md5($_POST['passwordbaru'])."',  
                pertanyaan='$pertanyaan', jawaban='".md5($_POST['jawaban'])."' WHERE username='$username'");
                
                echo "<meta http-equiv=\"refresh\" content=\"0; url=profil.php?act=berhasil&u=$username\">";
             }else{
                echo  "<meta http-equiv=\"refresh\" content=\"0; url=profil.php?act=gagal&u=$username\">";
             }
             }
         }
?>