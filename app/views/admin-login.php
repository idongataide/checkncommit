<?php include 'control.php'?>
<body>
	
	<div class="limiter">
		<div class="acontainer-login100" style="background-image: url('public/img/img-01.jpg');">
			<div class="awrap-login100 p-t-100 p-b-30">
			<?php if(isset($data['login'])){
                $message = $data['login']['log']; $colour = $data['login']['colour'];
        }
                else $message =""; $colour = "";
              ?> 
				<form class="alogin100-form validate-form" method="post">
					<div class="alogin100-form-avatar">
						<img src="public/img/avatar-01.jpg" alt="AVATAR">
					</div>

					<span class="alogin100-form-title p-t-20 p-b-45">
						Admin Portal
					</span>
					<p style="color: <?=$colour?>;"><?=$message?></p>
					<div class="awrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="awrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="acontainer-login100-form-btn p-t-10">
						<button class="alogin100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-30">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

					<!-- <div class="text-center w-full">
						<a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>

</body>
</html>