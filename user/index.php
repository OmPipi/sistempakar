<?php
	require '../controller/diagnosa.php';
	require '../controller/auth.php';
	require '../controller/koneksi_db.php';
    require '../view/header.php';
    require 'navbar.php';
    $username = $_SESSION['SESS_USERNAME'];
?>
 

<div class="container">

	<div class="row col-md-8 col-md-offset-2">
		<div class="panel panel-info" style="margin-bottom:126px;">
			<div class="panel-heading">JAWABLAH PERTANYAAN BERIKUT :</div>
  			<div class="panel-body">
					<form action="?act=diagnosis" method="post" name="form1" target="_self">
  					<input  name="kode_gejala" value="<?php echo $kode_gejala;?>" type="hidden"/>
						<table class="table" width="100%" border="0" cellpadding="2" cellspacing="1">
							<tr>
								<td colspan="2" align="center"><h3><span class="label label-success"><?php echo "$nama_gejala";?></span></h3></td>
							</tr>
							<tr>
								<td>
									<br />
									<span class="input-group-addon"><input type="radio" name="jawaban" value="Y" data-toggle="tooltip" data-placement="left" title="Pilih jika Anda alami" checked> YA <i class="fa fa-check" aria-hidden="true"></i></span>
									<span class="input-group-addon"><input type="radio" name="jawaban" value="T" data-toggle="tooltip" data-placement="left" title="Pilih jika tidak Anda alami" > TIDAK <i class="fa fa-times" aria-hidden="true"></i></span>
								</td>
							</tr>
							<br />
							<tr>
								<td align="center">
									<br />
									<button type="submit" class="btn btn-info" name="Submit">LANJUT <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
								</td>
							</tr>
						</table>
					</form>
				</div> <!--panel body-->
		</div> <!--panel info-->
	</div> <!--row-->
</div> <!--container-->



<?php require '../view/footer.php'; ?>
