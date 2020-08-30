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
                                <h1>Welcome To Back</h1>
                            </div>                          
                        </div>
                      
                    </div>
                </div>
                <div class="col-md-6 col-12 order-md-1 fxt-bg-color">
                    <div class="fxt-content">
                        <h2>Login</h2> 
                        <div class="fxt-form">
                            <form method="POST">
                                <div class="form-group">  
                                    <label for="email" class="input-label">Email Address</label>                                              
                                    <input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com" required="required">
                                </div>
                                <div class="form-group wow bounce">  
                                    <label for="password" class="input-label">Password</label>                                               
                                    <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-checkbox-area">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">Keep me logged in</label>
                                        </div>
                                        <a href="forgotpassword" class="switcher-text">Forgot Password</a>
                                    </div>
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-delay="900ms">
                                    <button type="submit" class="fxt-btn-fill">Log in</button>
                                </div>
                            </form>                            
                        </div> 
                        <div class="fxt-footer">
                            <p>Don't have an account?<a href="register" class="switcher-text">Register</a></p>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="public/assets/js/jquery.min.js"></script>
 
    <script src="public/assets/js/wow.min.js"></script>

    <script src="public/assets/js/main.js"></script>

    <script src="public/assets/js/rev-slider.js"></script>
    <script src="public/assets/js/typed.js"></script>
