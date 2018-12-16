<?php  
session_start();

if( isset($_POST['tombol'])) {
   if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
      // Insert you code for processing the form here
	  include "koneksi_db.php";
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = $_POST['password'];
	$nama_user = clean($_POST['nama_user']);
	$usia = clean($_POST['usia']);
	$jenis_kelamin = clean($_POST['jenis_kelamin']);
	$alamat = clean($_POST['alamat']);
	$pertanyaan = clean($_POST['pertanyaan']);
	$jawaban = clean($_POST['jawaban']);
	
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: user_index.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO data_user (`username`, `password`, `nama_user`, `usia`, `jenis_kelamin`, `alamat`, `pertanyaan`, `jawaban`) 
			VALUES('$username', '".md5($_POST['password'])."',  '$nama_user', '$usia', '$jenis_kelamin', '$alamat','$pertanyaan', '".md5($_POST['jawaban'])."')";
	
	$result = mysql_query($qry);
	
	
	
	//Check whether the query was successful or not
	if($result) {
        header("location: http://localhost/master/view/masuk.php?hasil=terdaftar");
		exit();
	}else {
		header("location: http://localhost/master/view/masuk.php?hasil=gagal");
	}
   } else {
      // Insert your code for showing an error message here
	  echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?page=gagal\">";
	  

   }
} else {

	  

	}
?>