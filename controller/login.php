<?php
	
	//Start session
	session_start();
	
	//Include database connection details
	require_once('koneksi_db.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
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
	$status   = clean($_POST['status']);
	
	
	//Create query
	if($status=='pakar'){
		$qry="SELECT * FROM data_pakar WHERE username='$username' AND password='".md5($_POST['password'])."' AND akses='pakar'";
		$result=mysql_query($qry);
		}
		else {
		  $qry="SELECT * FROM data_user WHERE username='$username' AND password='".md5($_POST['password'])."' AND akses='user'";
		  $result=mysql_query($qry);;
		}
		
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			if ($status=='pakar'){
				session_regenerate_id();
				$member = mysql_fetch_assoc($result);
				$_SESSION['SESS_USERNAME'] = $member['username'];
				$_SESSION['SESS_PASSWORD'] = $member['password'];
				$_SESSION['SESS_AKSES'] = $member['akses'];
				session_write_close();
				header("location: http://localhost/master/admin/index.php");
				exit();
				}
			else {
				session_regenerate_id();
				$member = mysql_fetch_assoc($result);
				$_SESSION['SESS_USERNAME'] = $member['username'];
				$_SESSION['SESS_PASSWORD'] = $member['password'];
				$_SESSION['SESS_AKSES'] = $member['akses'];
				session_write_close();
				header("location: http://localhost/master/user/index.php?act=diagnosa");
				exit();
				}
				} 
			else {
				header("location: http://localhost/master/view/gagalmasuk.php");
			exit();
				}
			
		}

?>