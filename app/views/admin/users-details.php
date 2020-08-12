<?php include 'dashboard.php'?>   
<div class="app-main__outer">
      <div class="app-main__inner"> 
         <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title"><?=$data['user']['username']?> Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center p-5" style="height:250px;">                   
                      <img class="img img-fluid" src="public/images/speakers/speaker1.jpg" alt="User Avatar" width="100%" height="100%"> 
                  
                  </div>
                  <ul class="list-group list-group-flush">                   
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><?=$data['user']['username']?></strong>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">                        
                            <div class="form-row">
                              <div class="col-md-6">
                                <strong class="text-muted d-block mb-2">First Name</strong>
                                <span> <?=$data['user']['fname']?> </span> 
                                </div>
                        </div>
                            <div class="form-row">
                              <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">Last Name</strong>
                                 <span> <?=$data['user']['lname']?> </span> 
                            </div>
                            <div class="col-md-6 form-group">
                                 <strong class="text-muted d-block mb-2">Phone Number</strong>
                                 <span><?=$data['user']['user_phone']?></span> 
                          </div>                               
                          </div>

                          <div class="form-row">
                              <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">Email Address</strong>
                                 <span> <?=$data['user']['user_email']?></span> 
                            </div>
                            <div class="col-md-6 form-group">
                                 <strong class="text-muted d-block mb-2">Address</strong>
                                 <span> <?=$data['user']['user_address']?></span> 
                          </div> 
                          </div> 
                          <div class="form-row">
                              <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">City</strong>
                                 <span> <?=$data['user']['city_name']?> </span> 
                            </div>
                            <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">State</strong>
                                 <span> <?=$data['user']['state_name']?></span> 
                          </div> 
                          </div> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>

          <style>
.main-content > .main-content-container.container-fluid {
  min-height: calc(100vh - 7.5rem); }
  .text-muted {
    color: #868e96 !important;
}

.page-header .page-title {
    font-size: 1.625rem;
    font-weight: 500;
    line-height: 1;
    margin: 0;
    padding: 0;
}
.card-header h1, .card-header h2, .card-header h3, .card-header h4, .card-header h5, .card-header h6 {
    font-weight: 500;
    color:#000000;
}
.btn-outline-primary {
    background-color: transparent;
    background-image: none;
    border-color: #007bff;
    color: #007bff;
}
.form-control {
    height: auto;
    padding: 0.4375rem 0.75rem;
    font-size: 0.9rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #e1e5eb;
    font-weight: 300;
    will-change: border-color, box-shadow;
    border-radius: 0.25rem;
    box-shadow: none;
    transition: box-shadow 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06), border 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06);
}

.btn {
    font-weight: 400;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    border: 1px solid transparent;
    padding: 0.5625rem 1rem;
    font-size: 0.75rem;
    line-height: 1.125;
    border-radius: 0.25rem;
    transition: all 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06);
}
.card-header:first-child {
    border-radius: 0.625rem 0.625rem 0 0;
}
.card-small .card-header, .card-small .card-body, .card-small .card-footer {
    padding: 1rem 1rem;
}
.btn-accent {
    color: #fff;
    border-color: #0e4220;
    background-color: #0e4220;
    box-shadow: none;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn.btn-pill {
    border-radius: 50px;
}
          </style>    