<?php 
	//Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require '../view/header.php'; 
    require '../controller/koneksi_db.php';
    require 'navbar.php';
    $username = $_SESSION['SESS_USERNAME'];
    $qry = mysql_query("SELECT * FROM data_user WHERE username='$username'");
    $data = mysql_fetch_array($qry);?>
    
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationTextArea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextArea.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />


<div class="container">
    <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading">Biodata Pengguna</div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2">Nama</label>
                        <span class="col-sm-10">: <?php echo $data['nama_user'];?></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Usia</label>
                        <span class="col-sm-10">: <?php echo $data['usia'];?></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Jenis Kelamin</label>
                        <span class="col-sm-10">: <?php if ($data['jenis_kelamin'] == 'L') {
                                                                echo "Laki-laki";
                                                                }else{
                                                                    echo "Perempuan";
                                                                }?></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Alamat</label>
                        <span class="col-sm-10">: <?php echo $data['alamat'];?></span>
                    </div>
                </form>        
         
            </div> <!--panel body-->
    </div> <!--panel biodata pengguna-->

    <div class="panel panel-info">
        <div class="panel-heading">Edit Data Pengguna</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="col-sm-2">Nama</label>
                            <div class="col-sm-4"><span id="sprynama">
                                <input name="nama_user" class="form-control" size="30" maxlength="30" value="<?php echo $data['nama_user'];?>">  
                                <span class="textfieldRequiredMsg">Nama harus diisi.</span>
                                <span class="textfieldMinCharsMsg">Panjang minimal 2 karakter.</span>
                                <span class="textfieldInvalidFormatMsg">Format penulisan salah.</span></span>                            
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Usia</label>
                            <div class="col-sm-4">
                            <select name="usia" class="form-control">
                                <option value="10" <?php if ($data['usia']== '10') echo 'selected';?>>10 Tahun</option>
                                <option value="11" <?php if ($data['usia']== '11') echo 'selected';?>>11 Tahun</option>
                                <option value="12" <?php if ($data['usia']== '12') echo 'selected';?>>12 Tahun</option>
                                <option value="13" <?php if ($data['usia']== '13') echo 'selected';?>>13 Tahun</option>
                                <option value="14" <?php if ($data['usia']== '14') echo 'selected';?>>14 Tahun</option>
                                <option value="15" <?php if ($data['usia']== '15') echo 'selected';?>>15 Tahun</option>
                                <option value="16" <?php if ($data['usia']== '16') echo 'selected';?>>16 Tahun </option>
                                <option value="17" <?php if ($data['usia']== '17') echo 'selected';?>>17 Tahun </option>
                                <option value="18" <?php if ($data['usia']== '18') echo 'selected';?>>18 Tahun</option>
                                <option value="19" <?php if ($data['usia']== '19') echo 'selected';?>>19 tahun </option>
                                <option value="20" <?php if ($data['usia']== '20') echo 'selected';?>>20 Tahun</option>
                                <option value="21" <?php if ($data['usia']== '21') echo 'selected';?>>21 Tahun</option>
                                <option value="22" <?php if ($data['usia']== '22') echo 'selected';?>>22 Tahun</option>
                                <option value="23" <?php if ($data['usia']== '23') echo 'selected';?>>23 Tahun</option>
                                <option value="24" <?php if ($data['usia']== '24') echo 'selected';?>>24 Tahun </option>
                                <option value="25" <?php if ($data['usia']== '25') echo 'selected';?>>25 Tahun</option>
                                <option value="26" <?php if ($data['usia']== '26') echo 'selected';?>>26 Tahun</option>
                                <option value="27" <?php if ($data['usia']== '27') echo 'selected';?>>27 Tahun </option>
                                <option value="28" <?php if ($data['usia']== '28') echo 'selected';?>>28 Tahun</option>
                                <option value="29" <?php if ($data['usia']== '29') echo 'selected';?>>29 Tahun </option>
                                <option value="30" <?php if ($data['usia']== '30') echo 'selected';?>>30 Tahun</option>
                                <option value="31" <?php if ($data['usia']== '31') echo 'selected';?>>31 Tahun </option>
                                <option value="32" <?php if ($data['usia']== '32') echo 'selected';?>>32 Tahun </option>
                                <option value="33" <?php if ($data['usia']== '33') echo 'selected';?>>33 Tahun</option>
                                <option value="34" <?php if ($data['usia']== '34') echo 'selected';?>>34 Tahun</option>
                                <option value="35" <?php if ($data['usia']== '35') echo 'selected';?>>35 Tahun</option>
                                <option value="36" <?php if ($data['usia']== '36') echo 'selected';?>>36 Tahun </option>
                                <option value="37" <?php if ($data['usia']== '37') echo 'selected';?>>37 Tahun </option>
                                <option value="38" <?php if ($data['usia']== '38') echo 'selected';?>>38 Tahun</option>
                                <option value="39" <?php if ($data['usia']== '39') echo 'selected';?>>39 Tahun </option>
                                <option value="40" <?php if ($data['usia']== '40') echo 'selected';?>>40 Tahun </option>
                                <option value="41" <?php if ($data['usia']== '41') echo 'selected';?>>41 Tahun </option>
                                <option value="42" <?php if ($data['usia']== '42') echo 'selected';?>>42 Tahun</option>
                                <option value="43" <?php if ($data['usia']== '43') echo 'selected';?>>43 Tahun</option>
                                <option value="44" <?php if ($data['usia']== '44') echo 'selected';?>>44 Tahun</option>
                                <option value="45" <?php if ($data['usia']== '45') echo 'selected';?>>45 Tahun</option>
                                <option value="46" <?php if ($data['usia']== '46') echo 'selected';?>>46 Tahun</option>
                                <option value="47" <?php if ($data['usia']== '47') echo 'selected';?>>47 Tahun</option>
                                <option value="48" <?php if ($data['usia']== '48') echo 'selected';?>>48 Tahun</option>
                                <option value="49" <?php if ($data['usia']== '49') echo 'selected';?>>49 Tahun </option>
                                <option value="50" <?php if ($data['usia']== '50') echo 'selected';?>>50 Tahun </option>
                                <option value="51" <?php if ($data['usia']== '51') echo 'selected';?>>51 Tahun</option>
                                <option value="52" <?php if ($data['usia']== '52') echo 'selected';?>>52 Tahun</option>
                                <option value="53" <?php if ($data['usia']== '53') echo 'selected';?>>53 Tahun</option>
                                <option value="54" <?php if ($data['usia']== '54') echo 'selected';?>>54 Tahun</option>
                                <option value="55" <?php if ($data['usia']== '55') echo 'selected';?>>55 Tahun</option>
                                <option value="56" <?php if ($data['usia']== '56') echo 'selected';?>>56 Tahun </option>
                                <option value="57" <?php if ($data['usia']== '57') echo 'selected';?>>57 Tahun</option>
                                <option value="58" <?php if ($data['usia']== '58') echo 'selected';?>>58 Tahun </option>
                                <option value="59" <?php if ($data['usia']== '59') echo 'selected';?>>59 Tahun</option>
                                <option value="60" <?php if ($data['usia']== '60') echo 'selected';?>>60 Tahun</option>
                                <option value="61" <?php if ($data['usia']== '61') echo 'selected';?>>61 Tahun</option>
                                <option value="62" <?php if ($data['usia']== '62') echo 'selected';?>>62 Tahun</option>
                                <option value="63" <?php if ($data['usia']== '63') echo 'selected';?>>63 Tahun </option>
                                <option value="64" <?php if ($data['usia']== '64') echo 'selected';?>>64 Tahun</option>
                                <option value="65" <?php if ($data['usia']== '65') echo 'selected';?>>65 Tahun</option>
                                <option value="66" <?php if ($data['usia']== '66') echo 'selected';?>>66 Tahun</option>
                                <option value="67" <?php if ($data['usia']== '67') echo 'selected';?>>67 Tahun</option>
                                <option value="68" <?php if ($data['usia']== '68') echo 'selected';?>>68 Tahun</option>
                                <option value="69" <?php if ($data['usia']== '69') echo 'selected';?>>69 Tahun </option>
                                <option value="70" <?php if ($data['usia']== '70') echo 'selected';?>>70 Tahun</option>                     
	                        </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input name="jenis_kelamin" type="radio" value="L" <?php if ($data['jenis_kelamin']== 'L'){
	                                                                                echo 'checked';
	                                                                                }?>> Laki-laki 
                            <input name="jenis_kelamin" type="radio" value="P" <?php if ($data['jenis_kelamin']== 'P'){
	                                                                                echo 'checked';
	                                                                                }?>> Perempuan
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Alamat</label>
                        <div class="col-sm-4">
                            <input name="alamat" class="form-control" size="30" maxlength="30" value="<?php echo $data['alamat'];?>">   
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Masukkan Kode Berikut</label>
                        <div class="col-sm-4">
                        <img src="../controller/captcha.php?width=100&height=40&character=4" /><br><br><input id="security_code" name="security_code" type="text" size="12"/>  
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info" name="ubah">Ubah</button>
                        </div>
                    </div>
                </form> 
            </div> <!--panel body-->
    </div> <!--panel edit data pengguna-->

    <div class="panel panel-info">
        <!-- Default panel contents -->
            <div class="panel-heading">Edit Info Masuk</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post">

                        <div class="form-group">
                            <label class="col-sm-2">Username</label>
                                <div class="col-sm-4">
                                    <input name="username" class="form-control" size="30" maxlength="30" disabled value="<?php echo $username;?>">                             
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Password Lama</label>
                                <div class="col-sm-4">
                                    <input name="passwordlama" class="form-control" size="30" maxlength="30">                             
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Password Baru</label>
                                <div class="col-sm-4">
                                    <input name="passwordbaru" class="form-control" size="30" maxlength="30">                             
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Konfirmasi Password Baru</label>
                                <div class="col-sm-4">
                                    <input name="konfirmpasswordbaru" class="form-control" size="30" maxlength="30">                             
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Pilih Pertanyaan Rahasia</label>
                                <div class="col-sm-4">
                                    <select name="pertanyaan" class="form-control">
                                        <option value="Apa Makanan Favorit Anda?" >Apa Makanan Favorit Anda?</option>
                                        <option value="Apa Buku Favorit Anda?"  >Apa Buku Favorit Anda?</option>
                                        <option value="Apa Nama Sekolah Dasar Anda?" >Apa Nama Sekolah Dasar Anda?</option>
                                        <option value="Siapa Nama Sahabat Anda Waktu Masih Kecil?"  >Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
                                        <option value="Siapa Nama Guru Favorit Anda?"  >Siapa Nama Guru Favorit Anda?</option>
                                        <option value="Di Kota Manakah Ibu Anda Lahir?"  >Di Kota Manakah Ibu Anda Lahir?</option>
                                    </select>                            
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Jawaban Anda</label>
                                <div class="col-sm-4">
                                    <input name="jawaban" class="form-control" size="30" maxlength="30">                             
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Masukkan Kode Berikut</label>
                            <div class="col-sm-4">
                            <img src="../controller/captcha.php?width=100&height=40&character=4" /><br><br><input id="security_code" name="security_code" type="text" size="12"/>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-info" name="ubahpass">Ubah</button>
                            </div>
                        </div>
                    </form> 
                </div> <!--panel body-->
    </div> <!--panel ubah password-->
</div> <!--container-->


<script type="text/javascript">

var sprypassword9 = new Spry.Widget.ValidationPassword("sprypassword9",{minChars:6, validateOn:["blur"]});
var sprytextfield39 = new Spry.Widget.ValidationTextField("sprytextfield39","none", {minChars:5, validateOn:["blur"]});
var sprytextfield491 = new Spry.Widget.ValidationTextField("sprynama","nama", {minChars:2, validateOn:["blur"]});
var sprytextfield59 = new Spry.Widget.ValidationTextField("sprytextfield59","integer",{minValue:1,maxValue:12, maxChars:2, validateOn:["blur"]});
var sprytextfield69 = new Spry.Widget.ValidationTextField("sprytextfield69","alamat", {minChars:4, validateOn:["blur"]});
var sprytextfield779 = new Spry.Widget.ValidationTextField("sprytextfield779","none", {minChars:4,maxChars:4, validateOn:["blur"]});
var sprytextfield889 = new Spry.Widget.ValidationTextField("sprytextfield889","nama", {validateOn:["blur"]});
var validsel = new Spry.Widget.ValidationSelect("validsel", {validateOn:["blur"]});

</script>
<?php 
include 'edit.php';
require '../view/footer.php'; ?>