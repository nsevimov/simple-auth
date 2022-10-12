<?php
include "layouts/header.php";
include "vendor/autoload.php";
use app\core\Auth;

if(!empty($_SESSION['uid']))
{
	header("Location: index.php");
}
?>

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
							<form method="post" action="" class="signin-form">
							<?php
								$signInInstance = new Auth();
								$signInInstance->signIn();
							?>
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" name="username" placeholder="Username" required>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a href="signup.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>

<?php include "layouts/footer.php"; ?>