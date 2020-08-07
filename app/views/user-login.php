<?php include 'control.php'?>
<?php include 'header.php'?>

<body>
	
	<div class="limiter m-t-100">
		<div class="ucontainer-login100">
			<div class="uwrap-login100">
				<div class="ulogin100-pic js-tilt" data-tilt>
					<img src="public/img/img-01.png" alt="IMG">
				</div>

				<form class="ulogin100-form validate-form">
					<span class="ulogin100-form-title">
						Member Login
					</span>

					<div class="uwrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="uwrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="ucontainer-login100-form-btn">
						<button class="ulogin100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-50">
						<a class="txt2" href="registration">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
<?php include 'footer.php'?>

</html>
<script src="js/tilt.jquery.min.js">
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>