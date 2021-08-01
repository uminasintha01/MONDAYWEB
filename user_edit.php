<?php 
include('authentication.php'); 
include('dbconfig.php');
include('includes/headernav.php'); 
?>

<!--Header-part-->
<div id="header">
  <h1><a href="daftar.php">MONDAY</a></h1>
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

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>&nbsp;Edit</a>
  <ul>
    <li class="active"><a href="daftar.php"><i class="icon icon-book"></i> <span>Daftar</span></a> </li>
    <li ><a href="beranda.php"><i class="icon icon-book"></i> <span>Beranda</span></a> </li>
  </ul>
</div>
<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb">
    <a href="index.php" title="Go to Login" class="tip-bottom"><i class="icon-home"></i> Login</a> 
    <a href="" class="current">Edit User</a>
  </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="code.php" method="POST" class="form-horizontal">

          <?php
            include('dbconfig.php');

            if(isset($_GET['id']))
            {
                $uid = $_GET['id'];

                try {
                    $user = $auth->getUser($uid);
                    ?>

                    <input type="hidden" name="user_id" value="<?=$uid;?>" >
                    <div class="control-group">
                    <label class="control-label">User Name:</label>
                    <div class="controls">
                        <input name="userName" value="<?=$user->displayName;?>" type="text" class="span11"  />
                    </div>
                    </div>
                    <div class="form-actions">
                    <button type="submit" name="update_user_btn" class="btn btn-success"><i class='icon icon-save'></i>&nbsp; Update</button>
                    </div   
                  <?php
                } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                    echo $e->getMessage();
                }
            }

            
          ?>
            >
          </form>

          </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Enable or Disable User</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="code.php" method="POST" class="form-horizontal">
            <?php
              if(isset($_GET['id']))
              {
                $uid = $_GET['id'];
                try {
                    $user = $auth->getUser($uid);
                    ?>

                  
          <input type="hidden" name="ena_dis_user_id" value="<?=$_GET['id'];?>" >
          <label class="control-label">Disable/Enable :</label>
            <div class="control-group controls">
              <select name="select_enable_disable" class="form-control">
                <option value="">Select</option>
                <option value="disable">Disable</option>
                <option value="enable">Enable</option>
              </select>
              <div class="control-group">
              <button type="submit" name="enable_disable_user_acount" class="btn btn-success"><i class='icon icon-save'></i>&nbsp; Update</button>
          </div>
            </div>
            <?php


                } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                  echo $e->getMessage();
                }

              }
              else
              {
                echo "No user id found";
              }
            ?>
          </form>

          </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Costum User</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="code.php" method="POST" class="form-horizontal">
            <?php
            if(isset($_GET['id']))
            {
              $uid = $_GET['id'];

              ?>

              
          <input type="hidden" name="claim_user_id" value="<?=$uid;?>" >
          <label class="control-label">User Claim :</label>
            <div class="control-group controls">
            <select name="role_as" class="form-control">
                <option value="">Select</option>
                <option value="admin">Admin</option>
                <option value="super_admin">Super Admin</option>
                <option value="norole">Remove Role</option>
              </select>
            </div>
            <label for="" class="control-label"> User role is :</label>
            <h4 class="border bg-warning" class="control-label">
              <br>
              <?php
                $claims = $auth->getUser($uid)->customClaims;
                 if(isset($claims['admin']) == true)
                {
                    echo "Role : Admin";

                }elseif(isset($claims['super_admin']) == true)
                {
                   echo "Role : Super Admin";
                }
                elseif($claims == null)
                {
                  echo "Role : No Role";
                }
              
              ?>
            </h4>
            
            <div class="form-actions">
              <button type="submit" name="user_claim_btn" class="btn btn-success"><i class='icon icon-save'></i>&nbsp; Daftar</button>
            </div>
            <?php
            }

            ?>
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
