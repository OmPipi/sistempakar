<?php
	//Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_USERNAME']) || (trim($_SESSION['SESS_USERNAME']) == '')) {
		//echo "<meta http-equiv=\"refresh\" content=\"0; url=../index.php?act=haruslogin\">";
		header("location: http://localhost/master/index.php?act=haruslogin");
	}

	
?>
