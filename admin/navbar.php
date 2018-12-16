<?php $username = $_SESSION['SESS_USERNAME'];?>
<br />
<br />
<body>
<header class="header">
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="http://localhost/master/admin/index.php" class="navbar-brand scroll-top logo  animated bounceInLeft"><b>Bidan<i>Online</i></b></a> </div>
      <!--/.navbar-header-->
      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="mainNav">
          <li><a href="ubahpass.php?act=ubahpass&user=<?php echo $username;?>" class="scroll-link">Ganti Password</a></li>
          <li><a href="../controller/keluar.php" class="scroll-link">Keluar</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>
<!--/.header-->