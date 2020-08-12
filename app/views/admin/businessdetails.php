<?php include 'dashboard.php'?>   
<div class="app-main__outer">
      <div class="app-main__inner"> 
         <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Details</span>
                <h3 class="page-title"><?=$data['business']['store_name']?> Profile</h3>
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
                  <div class="br-wrapper br-theme-css-stars">
                      <select id="css-stars" style="display: none;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                      </li>
                     <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.  Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</span>
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
                                <span> <?=$data['business']['business_fname']?> </span> 
                                </div>
                        </div>
                            <div class="form-row">
                              <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">Last Name</strong>
                                 <span> <?=$data['business']['business_lname']?></span> 
                            </div>
                            <div class="col-md-6 form-group">
                                 <strong class="text-muted d-block mb-2">Business Name</strong>
                                 <span>  <?=$data['business']['store_name']?></span> 
                          </div>                               
                          </div>

                          <div class="form-row">
                              <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">Business Address</strong>
                                 <span> <?=$data['business']['business_address'].', '.$data['business']['city_name'].', '.$data['business']['state_name'] ?></span> 
                            </div>
                            <div class="col-md-6">
                                 <strong class="text-muted d-block mb-2">Location</strong>
                                 <span> Sammitex Global</span> 
                          </div> 
                          </div> 
                          <div class="form-row">
                             <div class="border-bottom p-3" style="width:120px;">                   
                                <img class="img img-fluid" src="public/images/speakers/speaker1.jpg" alt="User Avatar" width="100%" height="100%"> 
                            </div>
                            <div class="border-bottom p-3" style="width:120px;">                   
                                <img class="img img-fluid" src="public/images/speakers/speaker1.jpg" alt="User Avatar" width="100%" height="100%"> 
                            </div>
                            <div class="border-bottom p-3" style="width:120px;">                   
                                <img class="img img-fluid" src="public/images/speakers/speaker1.jpg" alt="User Avatar" width="100%" height="100%"> 
                            </div>
                            <div class="border-bottom p-3" style="width:120px;">                   
                                <img class="img img-fluid" src="public/images/speakers/speaker1.jpg" alt="User Avatar" width="100%" height="100%"> 
                            </div>
                            <div class="border-bottom p-3" style="width:120px;">                   
                                <img class="img img-fluid" src="public/images/speakers/speaker1.jpg" alt="User Avatar" width="100%" height="100%"> 
                            </div>                            
                          </div>  
                          </div> 
                          </div>      
                          <div class="form-row mt-3">
                        <div class="col-md-6 col-lg-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-content p-0 w-100">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left pr-2 fsize-1">
                                                <div class="widget-numbers mt-0 fsize-3 text-danger">71</div>
                                            </div>
                                            <div class="widget-content-right w-100">
                                                <div class="progress-bar-xs progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left fsize-1">
                                            <div class="text-muted opacity-6">Followers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-content p-0 w-100">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left pr-2 fsize-1">
                                                <div class="widget-numbers mt-0 fsize-3 text-success">54</div>
                                            </div>
                                            <div class="widget-content-right w-100">
                                                <div class="progress-bar-xs progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left fsize-1">
                                            <div class="text-muted opacity-6">Business Reviews</div>
                                        </div>
                                    </div>
                                </div> 
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
    color: #222;
    background-color: #fff;
    border: 0px solid #e1e5eb;
    font-weight: 300;
    will-change: border-color, box-shadow;
    border-radius: 0.25rem;
    box-shadow: none;
    transition: box-shadow 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06), border 250ms cubic-bezier(0.27, 0.01, 0.38, 1.06);
}

.card-header:first-child {
    border-radius: 0.625rem 0.625rem 0 0;
}
.card-small .card-header, .card-small .card-body, .card-small .card-footer {
    padding: 1rem 1rem;
}

          </style>    