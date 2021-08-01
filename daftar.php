<?php 
session_start();
if(isset($_SESSION['verified_user_id']))
{
	$_SESSION['status'] = 'You are already logged in';
	header('Location: beranda.php');
	exit();

}
include('includes/headernav.php'); 
?>

<!--Header-part-->
<div id="header">
  <h1><a href="daftar.php">Restaurant</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">&nbsp;Selamat Datang Pendaftar</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="index.php"><i class="icon-key"></i> Log in</a></li>
      </ul>
    </li>
  </ul>
</div>


<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>&nbsp;Daftar</a>
  <ul>
    <li class="active"><a href="daftar.php"><i class="icon icon-book"></i> <span>Daftar</span></a> </li>
  </ul>
</div>
<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb">
    <a href="index.php" title="Go to Login" class="tip-bottom"><i class="icon-home"></i> Login</a> 
    <a href="daftar.php" class="current">Daftar</a>
  </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Isi data pendaftaran</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="code.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input name="email" type="text" class="span11" placeholder="Email Anda" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input name="userName" type="text" class="span11" placeholder="UserName" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input name="password" type="password"  class="span11" placeholder="Password"  />
              </div>

            <div class="form-actions">
              <button type="submit" name="daftar_btn" class="btn btn-success"><i class='icon icon-save'></i>&nbsp; Daftar</button>
            </div>
          </form>

          </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; MONDAY <a href="#">by henscorp</a> </div>
</div>

<?php 
include('includes/footernav.php'); 
?>
