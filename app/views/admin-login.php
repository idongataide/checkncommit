<?php include 'control.php'?> 

<section class="fxt-template-animation fxt-template-layout18 loaded"  style="background-image: url(&quot;public/assets/img/images/project/1.jpg&quot;);">      
        <div class="fxt-content">
            <div class="fxt-header">
                <a href="index" class="fxt-logo"><img src="public/assets/img/images/logo/logo01.png" alt="Logo"></a> 
            </div>                            
            <div class="fxt-form"> 
                <p> Admin Backoffice</p><?php $message = (isset($_SESSION['message'])) ? $_SESSION['message'] :'' ; unset($_SESSION['message']);?>
                                <p style="color: red">
                                    <?= $message; ?>
                            </p>

                <form method="POST">
                    <div class="form-group " > 
                        <div class="wow fadeInUp" data-wow-delay="400ms">                                              
                            <input type="text" id="username" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                    </div>
                    <div class="form-group">  
                        <div class="wow fadeInUp" data-wow-delay="700ms">                                              
                            <input id="password" type="password" class="form-control" name="pass" placeholder="********" required="required">
                            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">  
                            <div class="fxt-checkbox-area">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Keep me logged in</label>
                                </div>
                                <a href="#" class="switcher-text">Forgot Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group wow fadeInUp" data-wow-delay="900ms">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">  
                            <button type="submit" name="login" class="fxt-btn-fill">Log in</button>
                        </div>
                    </div>
                </form>                
            </div> 
         
        </div>
    </section>

    <script src="public/assets/js/jquery.min.js"></script>
 
 <script src="public/assets/js/wow.min.js"></script>

 <script src="public/assets/js/main.js"></script>

 <script src="public/assets/js/rev-slider.js"></script>
 <script src="public/assets/js/typed.js"></script>
