<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-1.8.2.min.js"></script>

<?php
require '../controller/koneksi_db.php';
$act=$_GET['act'];
if ($act=="lupa"){
?>
<div class="container">    
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">     
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Lupa Password</div>
            </div>
            
            <div class="panel-body" >
                <form action="?act=pertanyaan" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Masukkan Username Anda</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                      <div class="input-group">
                                          <label>
                                              <input type="radio" name="status" value="user" checked /> User
                                              <input  type="radio" name="status" value="pakar" /> Pakar 
                                          </label>
                                      </div>
                            </div>
                    </div>
                    
                    <div class="form-group">
                    <!-- Button -->                                        
                        <div class="col-md-12 text-center">
                             <button type="submit" class="btn btn-primary">Lanjutkan</button> 
                        </div>
                    </div>        
                </form>
            </div>  
        </div>
    </div>
</div>    
<?php

}

 


if ($act=="pertanyaan"){
    $username = $_POST['username'];
	$status   = $_POST['status'];
	if($status=='user'){
		
	    $qry = mysql_query("SELECT * FROM data_user WHERE username='$username'");
	    $cek = mysql_num_rows(mysql_query("SELECT * FROM data_user WHERE username='$username'"));
		}
		else {
		  $qry = mysql_query("SELECT * FROM data_pakar WHERE username='$username'");
	      $cek = mysql_num_rows(mysql_query("SELECT * FROM data_pakar WHERE username='$username'"));
		}
    
	
	if ($cek>0){
	$data = mysql_fetch_array($qry);

?>
<div class="container">    
    <div style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-2">     
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Jawab Pertanyaan Keamanan</div>
            </div>
            
            <div class="panel-body" >
                <form action="?act=ubah" method="post" id="signupform" class="form-horizontal" role="form">
                  <input  name="username" value="<?php echo $username;?>" type="hidden"/>
                  <input  name="status" value="<?php echo $status;?>" type="hidden"/>
                    <div class="form-group">
                        <label class="col-md-5 control-label"><?php echo $data['pertanyaan'];?></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="jawaban" placeholder="Jawaban" required>
                            </div>
                    </div>
                    
                    <div class="form-group">
                    <!-- Button -->                                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button> 
                        </div>
                    </div>        
                </form>
            </div>  
        </div>
    </div>
</div> 
<?php
}else{
     echo "<meta http-equiv=\"refresh\" content=\"0; url=recovery.php?act=kesalahan\">";
}


}


if ($act=="kesalahan"){
    ?>
    
    <div class="container">    
        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">     
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Lupa Password</div>
                </div>
                
                <div class="panel-body" >
                    <form action="?act=pertanyaan" method="post" id="signupform" class="form-horizontal" role="form">
                        <div class="alert alert-danger">
                            <p>Error: Username tidak ada di dalam database.</p>
                        </div>
    
                        <div class="form-group">
                            <label class="col-md-5 control-label">Masukkan Username Anda</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                          <div class="input-group">
                                              <label>
                                                  <input type="radio" name="status" value="user" checked /> User
                                                  <input  type="radio" name="status" value="pakar" /> Pakar 
                                              </label>
                                          </div>
                                </div>
                        </div>
                        
                        <div class="form-group">
                        <!-- Button -->                                        
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Lanjutkan</button> 
                            </div>
                        </div>        
                    </form>
                </div>  
            </div>
        </div>
    </div> 
<?php

}




if ($act=="jawabansalah"){
    $username = $_GET['u'];
	$status   = $_GET['s'];
	if($status=='user'){
		
	    $qry = mysql_query("SELECT * FROM data_user WHERE username='$username'");
	    $cek = mysql_num_rows(mysql_query("SELECT * FROM data_user WHERE username='$username'"));
		}
		else {
		  $qry = mysql_query("SELECT * FROM data_pakar WHERE username='$username'");
	      $cek = mysql_num_rows(mysql_query("SELECT * FROM data_pakar WHERE username='$username'"));
		}
    
	
	if ($cek>0){
	$data = mysql_fetch_array($qry);

?>
<div class="container">    
    <div style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-2">     
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Jawab Pertanyaan Keamanan</div>
            </div>
            
            <div class="panel-body" >
                <form action="?act=ubah" method="post" id="signupform" class="form-horizontal" role="form">
                    <div class="alert alert-danger">
                        <p>Error: Jawaban Anda salah, silahkan ulangi lagi.</p>
                    </div>
                  <input  name="username" value="<?php echo $username;?>" type="hidden"/>
                  <input  name="status" value="<?php echo $status;?>" type="hidden"/>
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label"><?php echo $data['pertanyaan'];?></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="jawaban" placeholder="Jawaban" required>
                            </div>
                    </div>
                    
                    <div class="form-group">
                    <!-- Button -->                                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button> 
                        </div>
                    </div>        
                </form>
            </div>  
        </div>
    </div>
</div>  
<?php
}else{
     echo "<meta http-equiv=\"refresh\" content=\"0; url=recovery.php?act=jawabansalah\">";
}
}


if ($act=="ubah"){
  function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
    $username = $_POST['username'];
	$status   = $_POST['status'];
	$jawaban  = clean($_POST['jawaban']);
	
	if($status=='user'){
		
	    
	    $cek = mysql_num_rows(mysql_query("SELECT * FROM data_user WHERE username='$username' and jawaban='".md5($_POST['jawaban'])."'"));
		}
		else {
		  
	      $cek = mysql_num_rows(mysql_query("SELECT * FROM data_pakar WHERE username='$username' and jawaban='".md5($_POST['jawaban'])."'"));
		}
	
	
	
	if ($cek>0){
?>
<div class="container">    
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">     
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Password Berhasil Direset</div>
            </div>
            
            <div class="panel-body" >
                <form action="?act=acubah&u=<?php echo $username;?>&s=<?php echo $status;?>" method="post" class="form-horizontal" role="form">
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username" placeholder="Username" disabled value="<?php echo $username;?>">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password Baru</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                    </div>
                                     
                    <div class="form-group">
                    <!-- Button -->                                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                        </div>
                    </div>        
                </form>
            </div>  
        </div>
    </div>
</div>  

	<?php
	   }else{
	        echo  "<meta http-equiv=\"refresh\" content=\"0; url=recovery.php?u=$username&s=$status&act=jawabansalah\">";
	        }?>
<?php
}

if ($act=="acubah"){
	
	$username = $_GET['u'];
	$status   = $_GET['s'];
	$password = $_POST['password'];
	
	if($status=='user'){
		
	    $qry= mysql_query("UPDATE data_user SET password='".md5($_POST['password'])."' WHERE username='$username'");
	 
		}
		else {
		  $qry= mysql_query("UPDATE data_pakar SET password='".md5($_POST['password'])."' WHERE username='$username'");
	      
		}
		
	
	   
	 if($qry){
	 echo "<meta http-equiv=\"refresh\" content=\"0; url=recovery.php?act=berhasil\">";;
	 }else{
	 echo "gagal";
	 }

}

if ($act=="berhasil"){
	?>
<div class="container">
    <div style="margin-top:80px;" class="mainbox col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sukses</div>
            </div>
                <div class="panel-body">
                   <h5>Password berhasil diganti, Anda akan dialihkan ke halaman masuk dalam 3 detik.</h5>
                </div>   
            
        </div>
    </div>
</div>
<meta http-equiv="refresh" content="4; url=masuk.php">
<?php
}

?>