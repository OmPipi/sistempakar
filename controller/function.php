<?php
     function clean($str) {
      $str = @trim($str);
      if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
      }
      return mysql_real_escape_string($str);
        }

      #fungsi untuk membuat kode otomatis untuk penyakit
      function kdautopenyakit($tabel, $inisial){
        $struktur	= mysql_query("SELECT * FROM $tabel");
        $field		= mysql_field_name($struktur, 0);
        $panjang	= mysql_field_len($struktur, 0);
        
        $qry	= mysql_query("SELECT max(".$field.") FROM ".$tabel);
        $row	= mysql_fetch_array($qry);
        if ($row[0]==""){
          $angka = 0;
        }
        else {
          $angka = substr($row[0], strlen($inisial));
        }
        
        $angka++;
        $angka = strval($angka);
        $tmp = "";
        for($i=1; $i <= ($panjang-strlen($inisial)-strlen($angka)); $i++){
          $tmp = $tmp."0";
        }
        return $inisial.$tmp.$angka;
      }

#fungsi untuk membuat kode otomatis untuk gejala
function kdautogejala($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur, 0);
	$panjang	= mysql_field_len($struktur, 0);
	
	$qry	= mysql_query("SELECT max(".$field.") FROM ".$tabel);
	$row	= mysql_fetch_array($qry);
	if ($row[0]==""){
		$angka = 0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}
	
	$angka++;
	$angka = strval($angka);
	$tmp = "";
	for($i=1; $i <= ($panjang-strlen($inisial)-strlen($angka)); $i++){
		$tmp = $tmp."0";
	}
	return $inisial.$tmp.$angka;
}


#fungsi untuk konversi tanggal dari mysql ke tgl indonesia
function tgl_indo($tgl){
   $tanggal = substr($tgl,8,2);
   $bulan    = getBulan(substr($tgl,5,2));
   $tahun    = substr($tgl,0,4);
   $jam      = substr($tgl,11,8);
   return $tanggal." ".$bulan." ".$tahun." ".$jam;        
}    
function getBulan($bln){
  switch ($bln){
		case 1:
      return "Januari";
      break;
    case 2:
      return "Februari";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
    	break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
	}
} 

?>