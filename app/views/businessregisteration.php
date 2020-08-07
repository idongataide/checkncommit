<?php include 'control.php'?>
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
				<form class="vlogin100-form">
                <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="fname" placeholder="Enter First Name" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="lname" placeholder="Enter Last Name" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26" >
						<input class="vinput100" type="text" name="username" placeholder="Enter Username" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="business_name" placeholder="Enter Business Name" required>
					</div>
                 </div>
                 <div class="col-lg-6"> 
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="tel" name="phone" placeholder="Phone Number" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
						<input class="vinput100" type="text" name="address" placeholder="Address" required>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26">
					<select class="vinput100 form-control" name="city" id="city">
					</select>
					</div>
                 </div>
                 <div class="col-lg-6">
					<div class="vwrap-input100 validate-input m-b-26" >
						<select class="vinput100 form-control" name="state" id="state">
						<option> --Select a State--</option>
						<?php foreach($data['states'] as $key => $state): ?>
						<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
						<?php endforeach ?>
                        </select>
					</div>
                 </div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="vcontact100-form-checkbox">
							<input class="vinput-checkbox100" id="ckb1" type="checkbox" name="remember-me" required>
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

					<div class="container-login100-form-btn">
						<button class="vlogin100-form-btn">
							Registration
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