<?php 
include('includes/headernav.php'); 
?>


<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"></a></h1>
</div>
<!--close-Header-part--> 

<?php 
            if(isset($_SESSION['status']))
            {
                echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);

            }
            
            ?>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="beranda.php"><i class="icon-user"></i>Admin</a></li>
        <li class="divider"></li>
        <li><a href="index.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="index.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> <span> Dashboard</span>
</a>
  <ul>
    <li ><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active" ><a href="Referensi.php"><i class="icon icon-tasks"></i> <span> Referensi</span></a> </li>
    <li ><a href="order.php"><i class="icon icon-shopping-cart"></i> <span> Order</span></a> </li> 
    <li><a href="transaksi.php"><i class="icon icon-inbox"></i> <span> Transaksi</span></a> </li>
    <li ><a href="laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li ><a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
    
    
    
    
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Beranda</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
          <h5>Referensi Makanan</h5>
          <a href="tambah_menu.php" class="btn btn-info btn-mini label"><i class="icon-plus"></i>&nbsp;Tambah Data</a>
        </div>
        <div class="widget-content" >
          <ul class="thumbnails">
            <div class="btn-icon-pg">
              <ul>
              </ul>
            </div>
          </ul>
        </div>
      </div>


<?php 
include('includes/footernav.php'); 
?>