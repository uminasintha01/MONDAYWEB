<?php 
include('includes/headernav.php'); 
?>

<!--Header-part-->
<div id="header">
  <h1><a href="referensi.php">Referensi</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['nama_level'];?></a></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
  <a href="entri_referensi.php" class="visible-phone">
    <i class="icon icon-tasks"></i> <span>Entri Referensi</span>
  </a>
  <ul>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li class="active"> <a href="Referensi.php"><i class="icon icon-tasks"></i> <span> Referensi</span></a> </li>
    <li> <a href="order.php"><i class="icon icon-shopping-cart"></i> <span> Order</span></a> </li>
    <li> <a href="transaksi.php"><i class="icon icon-inbox"></i> <span> Transaksi</span></a> </li>
    <li> <a href="laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="entri_referensi.php" title="Entri Referensi" class="tip-bottom">
        <i class="icon icon-tasks"></i>
        Entri Referensi
      </a>
      <?php 
      if(isset($_SESSION['edit_menu'])){
      ?>
      <a href="tambah_menu.php" title="Tambah Menu" class="tip-bottom">
        <i class="icon icon-tasks"></i>
        Ubah Detail Menu
      </a>
      <?php 
      } else {
      ?>
      <a href="tambah_menu.php" title="Tambah Menu" class="tip-bottom">
        <i class="icon icon-tasks"></i>
        Tambah Menu
      </a>
      <?php
        }
      ?>
    </div>
  </div>
<!--End-breadcrumbs-->

 
<!--Action boxes-->
<div class="container-fluid">
    <div class="row-fluid">
    
      <div class="widget-box span6">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
          <h5>Tambah Menu</h5>
        </div>
        <div class="widget-content" >
          <form action="" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nama Masakan:</label>
              <div class="controls">
                <?php 
                  if(isset($_SESSION['edit_menu'])){
                ?>
                  <input name="" type="text" value="" class="span11" placeholder="Nama Masakan" disabled=""/>
                  <input name="nama_masakan" type="hidden" value="" class="span11" placeholder="Nama Masakan"/>
                <?php
                  } else {
                ?>
                  <input name="nama_masakan" type="text" value="" class="span11" placeholder="Nama Masakan"/>
                <?php
                  }
                ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Harga / Porsi :</label>
              <div class="controls">
                <input name="harga" type="text" value="" class="span11" placeholder="Rupiah" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Stok Persediaan :</label>
              <div class="controls">
                <input name="stok" value="" type="number" class="span11" placeholder="Jumlah Stok" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gambar Masakan :</label>
              <div class="control-group">
                <div class="controls">
                  <input class="span11" value="" name="gambar" type="file" accept="image/*"  onchange="preview(this,'previewne')"/>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="control-group">
                <div class="controls">
                  <img src="gambar/" id="previewne" class="rounded border p-1" style="width:110px; height:70px;">
                </div>
              </div>
            </div>
            <div class="form-actions">
              <?php
                if(isset($_SESSION['edit_menu'])){
              ?>
                  <button type="submit" name="ubah_menu" class="btn btn-info"><i class='icon icon-save'></i>&nbsp; Simpan Perubahan</button>
              <?php
                } else {
              ?>
              <button type="submit" name="tambah_menu" class="btn btn-success"><i class='icon icon-plus'></i>&nbsp; Tambahkan</button>
              <?php
                }
              ?>
              <button type="submit" name="batal_menu" class="btn btn-danger"><i class='icon icon-remove'></i>&nbsp; Batalkan</a>
            </div>
          </form>
         
        </div>
      </div>
    
    </div>
<!--End-Action boxes-->    


<?php 
include('includes/footernav.php'); 
?>