<?php
include "vendor/autoload.php";
include "layouts/header.php";
if(empty($_SESSION['uid'])){
	header("Location: signin.php");
}
?>

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Welcome, @<?php echo $_SESSION['username']; ?></h3>
			      		</div>
			      	</div>
							
		          <p class="text-center">You want to log out? <a href="logout.php">Click here</a></p>
		        </div>
		      </div>
				</div>
			</div>

<?php include "layouts/footer.php"; ?>