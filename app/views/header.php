<?php include 'control.php'?>

  <header id="header" class="header header-transparent">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
               <!-- logo-->
               <a class="navbar-brand" href="index">
                  <img src="public/images/logos/logo.png" alt="">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a href="index" class="">Home</a>                     
                     </li>
                     <li class="dropdown nav-item">
                        <a href="#" class="" data-toggle="dropdown">About <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="about">About Us</a></li>
                           <li><a href="faq">FAQ</a></li>
                        </ul>
                     </li>                    
                     <li class="dropdown nav-item">
                        <a href="#" class="" data-toggle="dropdown">My Account<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                           <?php if(isset($_SESSION['u_id']) || isset($_SESSION['business_id'])){?>
                              <li><a href="logout">Logout</a></li>
                              <?php } else{ ?>
                              <li><a href="userlogin">User</a></li>
                              <li><a href="vendorlogin">Business</a></li>
                           <?php } ?>
                        </ul>
                     </li>  
                     <li class="nav-item ">
                        <a href="#"> Blog </a>                        
                     </li>
                     <li class="nav-item">
                        <a href="contact">Contact</a>
                     </li>
                     <?php $name = (isset($_SESSION['u_id'])) ? $_SESSION['username'] : "" ; ?>
                     <li class="header-ticket nav-item">
                        <a class="welcome-btn btn" href="profile"> <i class="fa fa-user"></i> Welcome <?=$name?>
                        </a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div><!-- container end-->
      </header>
      <!--/ Header end -->