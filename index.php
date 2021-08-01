<?php 
session_start();
if(isset($_SESSION['verified_user_id']))
{
	$_SESSION['status'] = 'You are already logged in';
	header('Location: beranda.php');
	exit();

}
include('includes/header.php'); 
?>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('template/masuk/images/img-01.jpg');">
			<div class="wrap-login100 p-t-50 p-b-20">
				<form action="logincode.php" method="POST" class="login100-form validate-form">
					
					<div class="login100-form-avatar">
						<img src="template/masuk/images/avatar-01.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						MONDAY
					</span>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
						<input class="input100" type="text" name="email" placeholder="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        <i class="fas fa-envelope"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "password is required">
					<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        <i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" name="login_btn" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<br><br><br><br><br>
					<div class="text-center w-full">
						<a class="txt1" href="daftar.php">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>

<?php 
include('includes/footer.php'); 
?>