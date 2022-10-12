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
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
			      	</div>
					
                    <form action="" method="post" class="signin-form">
						<?php
							$signUpInstance = new Auth();
							$signUpInstance->signUp();
						?>
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" name="username" placeholder="Username" required>
			      		</div>

                        <div class="form-group mt-3">
			      			<input type="email" class="form-control" name="email" placeholder="E-mail" required>
			      		</div>

		                <div class="form-group">
		                    <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
		                </div>

                        <div class="form-group">
		                    <input id="password-field" type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
		                    
		                </div>
		                
                        <div class="form-group">
		            	    <button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
		                </div>
		            </form>
		          <p class="text-center">Already have a account? <a data-toggle="tab" href="signin.php">Sign In</a></p>
		        </div>
		      </div>
				</div>
			</div>

<?php include "layouts/footer.php"; ?>