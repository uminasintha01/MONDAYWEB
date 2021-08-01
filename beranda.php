<?php 
include('authentication.php');
include('includes/headernav.php'); 
?>


<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"></a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i>Admin</a></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!--start-top-serch-->

<!--sidebar-menu-->
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> <span> Dashboard</span>
</a>
  <ul>
    <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li ><a href="Referensi.php"><i class="icon icon-tasks"></i> <span> Referensi</span></a> </li>
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
    <div id="breadcrumb"> <a href="beranda.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Beranda</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<div class="container-fluid">
    <div class="row-fluid">
    
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Data Pengguna</h5>
<?php
  if(isset($_SESSION['status']))
  {
    echo "<h4 class='alert alert-success'>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
  }
  ?>

        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span3">
              <div class="widget-box">
                <div class="widget-content nopadding">
                  <ul class="site-stats quick-actions">

                    <li class="bg_lb"><i class="icon-user"></i> 
                    <strong>  
                      <?php  
                            include('dbconfig.php');
                            $ref_table ='Users';
                            $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();
                            echo $total_count;
                            ?>
                            </strong>
                    <small>Administrator</small>
                   
                            </li>
                    <li class="bg_lg"><i class="icon-user"></i> <strong></strong> <small>Total Kasir</small></li>
                    <li class="bg_lo"><i class="icon-user"></i> </strong> <small>Total Pelanggan</small></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="span9">

              <!--DATA -->

              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Data </h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped " style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:25%">Email</th>
                        <th style="width:25%">Username</th>
                        <th style="width:25%">Disable/Enable</th>
                        <th style="width:20%">Edit</th>
                        <th style="width:20%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('dbconfig.php');

                      $users = $auth->listUsers();
                      $i=1;
                      foreach ($users as $user) 
                      {
                        ?>
                        <tr>
                          <td><?= $i++;?></td>
                          <td><?= $user->email?></td>
                          <td><?= $user->displayName?></td>
                          <td>
                            <?php
                            if($user->disabled)
                            {
                              echo "Disabled";
                            }
                            else
                            {
                              echo "Enabled";
                            }
                            ?>
                          </td>
                          
                          
                          <td>
                            <a href="user_edit.php?id=<?=$user->uid;?>" class="btn btn-sm btn-primary">Edit</a>
                          </td>

                          <td>
                            <form action="code.php" method="POST">
                              <button type="submit" name="user_delete_btn" class="btn btn-sm btn-danger" value="<?=$user->uid;?>">Delete</button>
                            </form>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
  

<?php 
include('includes/footernav.php'); 
?>
