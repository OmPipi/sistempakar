<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style2 {
	font-size: xx-small;
	font-style: italic;
	color: #333333;
}
</style>

<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-1.8.2.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div id="signupform" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Daftar</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px">Sudah punya akun?<a id="signinlink" href="masuk.php"> Masuk disini</a></div>
            </div>

            <div class="panel-body" >
                <form class="form-horizontal" action="http://localhost/master/controller/prosesdaftar.php" method="post">

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Username</label>
                            <div class="col-sm-6">
                                <span id="sprytextfield7">
                                    <input class="form-control" class="form-control" class="form-control" name="username" type="text" size="30" maxlength="30"/>
                                    <span class="textfieldRequiredMsg">Username Harus Diisi.</span>
                                    <span class="textfieldMinCharsMsg">Panjang minimal 5 karakter.</span>
                                    <span class="textfieldInvalidFormatMsg">Format penulisan tanpa spasi.</span>
                                    <span class="style2">Panjang minimal 5 karakter.</span>
                                </span>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Password</label>
                            <div class="col-sm-6">
                                <span id="sprypassword">
                                    <input class="form-control" class="form-control" name="password" type="password" id="password" size="15" maxlength="30" />
                                    <span class="passwordRequiredMsg">Password Harus Diisi.</span>
                                    <span class="passwordMinCharsMsg">Minimal 6 karakter.</span>
                                </span>
                                <span class="style2">Panjang minimal 6 karakter.</span>
                            </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Konfirmasi Password</label>
                        <div class="col-sm-6">
                            <span id="spryconfirm">
                                <input class="form-control" class="form-control" name="password2" type="password" size="15" maxlength="30" />
                                <span class="confirmRequiredMsg">Konfirmasi Password Harus Diisi.</span> 
                                <span class="confirmInvalidMsg">Password Harus Cocok.</span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Nama Lengkap</label>
                        <div class="col-sm-6">
                            <span id="sprytextfield4">
                                <input class="form-control" class="form-control" name="nama_user" type="text" size="30" maxlength="30">
                                <span class="textfieldRequiredMsg">Nama Anak harus diisi.</span>
                                <span class="textfieldMinCharsMsg">Panjang minimal 2 karakter.</span>
                                <span class="textfieldInvalidFormatMsg">Format penulisan salah.</span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Usia</label>
                            <div class="col-sm-6">
                                <span id="validsel">
                                    <select class="form-control" name="usia">
                                        <option value="">Pilih Usia</option>
                                        <option value="10">10 Tahun</option>
                                        <option value="11">11 Tahun</option>
                                        <option value="12">12 Tahun</option>
                                        <option value="13">13 Tahun</option>
                                        <option value="14">14 Tahun</option>
                                        <option value="15">15 Tahun</option>
                                        <option value="16">16 Tahun </option>
                                        <option value="17">17 Tahun </option>
                                        <option value="18">18 Tahun</option>
                                        <option value="19">19 tahun </option>
                                        <option value="20">20 Tahun</option>
                                        <option value="21">21 Tahun</option>
                                        <option value="22">22 Tahun</option>
                                        <option value="23">23 Tahun</option>
                                        <option value="24">24 Tahun </option>
                                        <option value="25">25 Tahun</option>
                                        <option value="26">26 Tahun</option>
                                        <option value="27">27 Tahun </option>
                                        <option value="28">28 Tahun</option>
                                        <option value="29">29 Tahun </option>
                                        <option value="30">30 Tahun</option>
                                        <option value="31">31 Tahun </option>
                                        <option value="32">32 Tahun </option>
                                        <option value="33">33 Tahun</option>
                                        <option value="34">34 Tahun</option>
                                        <option value="35">35 Tahun</option>
                                        <option value="36">36 Tahun </option>
                                        <option value="37 ">37 Tahun </option>
                                        <option value="38">38 Tahun</option>
                                        <option value="39">39 Tahun </option>
                                        <option value="40">40 Tahun </option>
                                        <option value="41 ">41 Tahun </option>
                                        <option value="42">42 Tahun</option>
                                        <option value="43">43 Tahun</option>
                                        <option value="44">44 Tahun</option>
                                        <option value="45">45 Tahun</option>
                                        <option value="46">46 Tahun</option>
                                        <option value="47">47 Tahun</option>
                                        <option value="48">48 Tahun</option>
                                        <option value="49">49 Tahun </option>
                                        <option value="50">50 Tahun </option>
                                        <option value="51">51 Tahun</option>
                                        <option value="52">52 Tahun</option>
                                        <option value="53">53 Tahun</option>
                                        <option value="54">54 Tahun</option>
                                        <option value="55">55 Tahun</option>
                                        <option value="56">56 Tahun </option>
                                        <option value="57">57 Tahun</option>
                                        <option value="58">58 Tahun </option>
                                        <option value="59">59 Tahun</option>
                                        <option value="60">60 Tahun</option>
                                        <option value="61">61 Tahun</option>
                                        <option value="62">62 Tahun</option>
                                        <option value="63">63 Tahun </option>
                                        <option value="64">64 Tahun</option>
                                        <option value="65">65 Tahun</option>
                                        <option value="66">66 Tahun</option>
                                        <option value="67">67 Tahun</option>
                                        <option value="68">68 Tahun</option>
                                        <option value="69">69 Tahun </option>
                                        <option value="70">70 Tahun</option>
                                    </select>
                                </span>
                                <span class="selectRequiredMsg">Usia Anda harus dipilih.</span>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <label class="radio-inline"><input  type="radio" name="jenis_kelamin" value="L" checked="checked">Laki-laki</label>
                                <label class="radio-inline"><input  type="radio" name="jenis_kelamin" value="P">Perempuan</label>   
                            </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <span id="sprytextfield6">
                                    <input class="form-control" name="alamat" type="text" size="50" maxlength="100" />
                                    <span class="textfieldRequiredMsg">Alamat harus diisi.</span>
                                    <span class="textfieldMinCharsMsg">Minimal 4 karakter.</span>
                                    <span class="textfieldInvalidFormatMsg">Format penulisan salah.</span>
                                </span>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Pilih Pertanyaan Rahasia</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="pertanyaan" id="pertanyaan">
                                    <option value="Apa Makanan Favorit Anda?">Apa Makanan Favorit Anda?</option>
                                    <option value="Apa Buku Favorit Anda?">Apa Buku Favorit Anda?</option>
                                    <option value="Apa Nama Sekolah Dasar Anda?">Apa Nama Sekolah Dasar Anda?</option>
                                    <option value="Siapa Nama Sahabat Anda Waktu Masih Kecil?">Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
                                    <option value="Siapa Nama Guru Favorit Anda?">Siapa Nama Guru Favorit Anda?</option>
                                    <option value="Di Kota Manakah Ibu Anda Lahir?">Di Kota Manakah Ibu Anda Lahir?</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Jawaban Anda</label>
                            <div class="col-sm-6">
                                <span id="sprytextfield88">
                                    <input class="form-control" class="form-control" name="jawaban" type="text" size="30" maxlength="30">
                                    <span class="textfieldRequiredMsg">Jawaban harus diisi.</span>
                                </span>   
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Masukan Angka Berikut</label>
                            <div class="col-sm-6">
                                <span id="sprytextfield77">
                                        <img src="../controller/captcha.php?width=100&height=40&character=4" /><br><br>
                                        <input class="form-control" class="form-control" id="security_code" name="security_code" type="text" size="12"/>
                                        <span class="textfieldRequiredMsg">Angka harus diisi dengan benar.</span>
                                        <span class="textfieldMinCharsMsg">Angka harus diisi dengan benar.</span>
                                        <span class="textfieldMaxCharsMsg">Angka harus diisi dengan benar.</span>
                                </span>
                            </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="btn-group">
                            <div class="col-md-12">
                                <button type="submit" name="tombol" class="btn btn-primary">Daftar</button> 
                                <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)">Batal</button>
                            </div>
                        </div>
                    </div> <!--form group button-->
                </form>   
            </div> <!--panel-body-->
        </div> <!--panel info--> 
    </div> <!--signupform-->       
</div> <!--container-->




<script type="text/javascript">
<!--
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7","data", {minChars:5, validateOn:["blur"]});
var sprypassword = new Spry.Widget.ValidationPassword("sprypassword",{minChars:6, validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3","none", {minChars:5, validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4","nama", {minChars:2, validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5","integer",{minValue:1,maxValue:12, maxChars:2, validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6","alamat", {minChars:4, validateOn:["blur"]});
var sprytextfield77 = new Spry.Widget.ValidationTextField("sprytextfield77","none", {minChars:4,maxChars:4, validateOn:["blur"]});
var sprytextfield88 = new Spry.Widget.ValidationTextField("sprytextfield88","nama", {validateOn:["blur"]});
var spryconfirm = new Spry.Widget.ValidationConfirm("spryconfirm", "sprypassword",{validateOn:["blur"]});
var validsel = new Spry.Widget.ValidationSelect("validsel", {validateOn:["blur"]});
//-->
</script>