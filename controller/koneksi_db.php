<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "db_gangguan_kehamilan";

mysql_connect($host, $username, $password) or die("Gagal koneksi...".mysql_error());
mysql_select_db($db) or die("Database tidak ditemukan...".mysql_error());
?>