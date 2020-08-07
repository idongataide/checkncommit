<?php include 'control.php'?>
<?php include 'header.php'?>
<body>
      <div id="page-banner-area" class="page-banner-area" style="background-image:url(public/images/hero_area/banner_bg.jpg)">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>Signin </h2>
               <ol class="breadcrumb">
                  <li>
                     <a href="#">Checkncommit /</a>
                  </li>
                  <li>
                   Business Signin
                  </li>
               </ol>
            </div>
         </div><!-- Subpage title end -->
	  </div><!-- Page Banner end -->
	  <div class="col-md-6 mx-auto shadow mt-4 mb-4">
				<form class="vlogin100-form validate-form mt-4">
				<div class="col-lg-12">
					<div class="vwrap-input100 validate-input m-b-26" data-validate="Username is required">
						<input class="vinput100" type="text" name="username" placeholder="Enter username">
					</div>
				</div>
					<div class="col-lg-12">
					<div class="vwrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="vinput100" type="password" name="pass" placeholder="Enter password">
					</div>
				</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="vcontact100-form-checkbox">
							<input class="vinput-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="vlabel-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
					<div>
						<a href="businessregistration" class="txt1">
							Create Account
						</a>
						</div>

					<div class="container-login100-form-btn">
						<button class="vlogin100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

</body>
<?php include 'footer.php'?>

</html>