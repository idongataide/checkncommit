<?php include 'control.php'?> 

 <section class=" fxt-template-layout13">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-6 col-12 order-md-2 fxt-bg-wrap">
                    <div class="fxt-bg-img">
                        <div class="fxt-header">
                            <div class=" wow fadeInRight">
                                <a href="index" class="fxt-logo"><img src="public/assets/img/images/logo/logo01.png" alt="Logo"></a>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="400ms">
                                <h1>Welcome to Checkncommit</h1>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="800ms">
                                <p> Fill in the fields to create account as a reviewer</p>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-md-6 col-12 order-md-1 fxt-bg-color">
                        <div class="fxt-content">
                            <h2>Register</h2> 
                            <div class="fxt-form">
                            <?php if(isset($data['reg_data'])){
                                $message = $data['reg_data']['log']; $colour = $data['reg_data']['colour'];
                                } else $message ="";?>
                                <p class="lead" style="color: <?=$colour?>" >
                                    <?= $message; ?>
                            </p>
                                <form method="POST">
                                    <div class="form-group">  
                                        <label for="f_name" class="input-label">First Name</label>                                              
                                        <input type="text" id="f_name" class="form-control" name="fname" placeholder="example name" required="required">
                                    </div>
                                    <div class="form-group">  
                                        <label for="l_name" class="input-label">Last Name</label>                                              
                                        <input type="text" id="l_name" class="form-control" name="lname" placeholder="example name" required="required">
                                    </div>
                                    <div class="form-group">  
                                        <label for="email" class="input-label">Email Address</label>                                              
                                        <input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com" required="required">
                                    </div>
                                    <div class="form-group">  
                                        <label for="password" class="input-label">Password</label>                                               
                                        <input id="password" type="password" class="form-control" name="pass" placeholder="********" required="required">
                                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    <div class="form-group">  
                                        <label for="c_password" class="input-label">Confirm Password</label>                                              
                                        <input id="c_password" type="password" class="form-control" name="cPass" placeholder="********" required="required">
                                        <i toggle="#c_password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    <div class="form-group">
                                        <div class="fxt-checkbox-area">
                                            <div class="checkbox">
                                                <input id="checkbox1" type="checkbox" required>
                                                <label for="checkbox1">I agree with the terms and condition</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="register" class="fxt-btn-fill">Register</button>
                                    </div>
                                </form>                            
                            </div> 
                            <div class="text-center">
                                <p>Have an account?<a href="login" class="switcher-text">Log in</a></p>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/jquery-ui.js"></script>
    <script src="public/assets/js/owl.carousel.min.js"></script>
    <script src="public/assets/js/jquery-fancybox.js"></script>
    <script src="public/assets/js/jquery-countTo.js"></script>
    <script src="public/assets/js/wow.min.js"></script>
    <script src="public/assets/js/jquery-validate.js"></script>
    <script src="public/assets/js/jquery.cookie.js"></script>
    <script src="public/assets/js/main.js"></script>