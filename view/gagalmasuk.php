<link href="http://localhost/master/css/bootstrap.min.3.1.0.css" rel="stylesheet">
<script src="http://localhost/master/js/bootstrap.min.3.1.0.js" type="text/javascript"></script>
<script src="http://localhost/master/js/jquery.min.1.11.1.js" type="text/javascript"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Masuk</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="recovery.php?act=lupa">Lupa password?</a></div>
                    </div>     

                        <div style="padding-top:30px" class="panel-body">
                            <div class="alert alert-danger">
                                <p>Error: Username/password salah.</p>
                            </div>
                            <form id="loginform" action="../controller/login.php" method="post" class="form-horizontal" role="form">
                                    
                                <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="masukkan username" required>                                        
                                 </div>
                                
                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="login-password" type="password" class="form-control" name="password" placeholder="masukkan password" require>
                                        </div>
        
                                            <div class="input-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="radio" name="status" value="user" checked />
                                                            User
                                                        <input  type="radio" name="status" value="pakar" />
                                                            Pakar 
                                                    </label>
                                                </div>
                                            </div>

                                            <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->

                                                <div class="col-sm-12 controls">
                                                    <input type="submit" name="login" id="btn-login" class="btn btn-success" value="LOGIN"/>
                                                    <button type="button" class="btn btn-danger" name="batal" onclick="javascript:history.go(-1)">Batal</button>
                                                </div>
                                         </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Belum memiliki akun? 
                                            <a href="daftar.php">
                                            Daftar disini
                                            </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     

                        </div>                     
            </div>  
        </div>
    </div>