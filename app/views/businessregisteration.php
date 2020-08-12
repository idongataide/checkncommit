<?php require_once 'control.php'?>
<?php include 'header.php'?>
<body>
      <div id="page-banner-area" class="page-banner-area" style="background-image:url(public/images/hero_area/banner_bg.jpg)">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>Signup Business </h2>
               <ol class="breadcrumb">
                  <li>
                     <a href="#">Checkncommit /</a>
                  </li>
                  <li>
                   Business Signup
                  </li>
               </ol>
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->

	  <?php if(isset($data['reg_data'])){
                $message = $data['reg_data']['log']; $colour = $data['reg_data']['colour'];
        }
                else $message =""; $colour = "";
              ?> 
                <div class="col-md-8 mx-auto shadow"> 
					<p style="color: <?=$colour?>;"><?=$message?></p>
				<form class="vlogin100-form" method="POST">
                <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="business_fname" placeholder="Enter First Name" maxlength="50" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="business_lname" placeholder="Enter Last Name" maxlength="50" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26" >
						<input class="vinput100" type="email" name="business_email" placeholder="Enter Email" maxlength="100" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="business_name" placeholder="Enter Business Name" maxlength="100" required>
					</div>
                 </div>
                 <div class="col-lg-6"> 
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="tel" name="business_phone" placeholder="Phone Number" required>
					</div>
				 </div>
				 <div class="col-lg-6"> 
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="password" name="pass" placeholder="Enter Password" required>
					</div>
				 </div>
				 <div class="col-lg-6"> 
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="password" name="cPass" placeholder="Confirm Password" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="business_address" placeholder="Address" maxlength="100" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26" >
						<select class="vinput100 form-control" name="business_state" id="state" required>
						<option> --Select a State--</option>
						<?php foreach($data['states'] as $key => $state): ?>
						<option value="<?=$state['state_id']?>"><?=$state['state_name']?></option>
						<?php endforeach ?>
                        </select>
					</div>
                 </div>
				 
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
					<select class="vinput100 form-control" name="business_city" id="city" required>
					</select>
					</div>
                 </div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="vlogin100-form-btn" type="submit" name="register">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

</body>
<?php include 'footer.php'?>
<script src="public/js/cities.js"></script>

</html>