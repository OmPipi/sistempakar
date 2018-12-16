<?php
	//Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require 'koneksi_db.php';

    // Bersihkan variabel dari session
    session_destroy();
    header("location: http://localhost/master/index.php");
    exit;
?>