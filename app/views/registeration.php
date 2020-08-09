<?php include 'control.php'?> 
<?php include 'header.php'?>

   <!-- banner start-->
    <section class="hero-speakers">
            <div class="container mt-5">
               <div class="row">                
                  <div class="col-lg-7 mx-auto shadow">
                     <div class="hero-form-content">
                        <h2>Register Now</h2>
                        <p>
                           Fill in the form to commence 
                        </p>
                        <?php if(isset($data['reg_data'])){
                           $message = $data['reg_data']['log']; $colour = $data['reg_data']['colour'];
                     }
                           else {$message =""; $colour = "";}
                           ?>
                           <p style="color: <?=$colour?>"><?=$message?></p>
                        <form method="POST" class="hero-form">
                           <input class="form-control form-control-name" placeholder="First Name" name="fname" 
                              type="text" maxlength="50" required>
                              <input class="form-control form-control-name" placeholder="Last Name" name="lname" 
                              type="text" maxlength="50" required>                             
                              <input class="form-control form-control-name" placeholder="Username" name="username"
                              type="text" maxlength="50" required>
                           <input class="form-control form-control-phone" placeholder="Phone" name="phone"
                              type="number">
                           <input class="form-control form-control-email" placeholder="Email" name="email" 
                              type="email" maxlength="100" required>
                              <input class="form-control form-control-name" placeholder="Address" name="address"
                              type="text" maxlength="100" required>
                              <input class="form-control form-control-name" placeholder="Password" name="pass"
                              type="password" required>
                              <input class="form-control form-control-name" placeholder="Confirm Password" name="cPass"
                              type="password" required>
                              <select class="form-control" name="state" id="state" required>
                                 <option>Choose State</option>
                              <?php foreach($data['states'] as $key => $state): ?>
                              <option value="<?=$state['state_id']?>"><?=$state['name']?></option>
                              <?php endforeach ?>
                             </select>
                             <select class="form-control" name="city" id="city" required>
                                
                             </select>

                           <button class="btns" name="register" type="submit"> Register Now</button>

                        </form><!-- form end-->
                     </div><!-- hero content end-->
                  </div><!-- col end-->
               </div><!-- row end-->
            </div>
            <!-- Container end -->
         </div>
      </section>
      <?php include 'footer.php'?>
      <script src="public/js/cities.js"></script>

      <!-- banner end-->

