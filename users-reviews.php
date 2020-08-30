<?php include 'bdashboard.php'?>

    <!-- Header -->
    <div class="header bg-green pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Business Reviews</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Reviews</h3>
            </div>
            <div class="card-body">
              <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                <div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-bell-55"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="text-muted font-weight-bold">22/3/2020  10:30 AM</small>
                    <h5 class=" mt-3 mb-0">New message</h5>
                    <p class=" text-sm mt-1 mb-0">Tiger is a great package and loved by all 4 that includes the most important components and features.</p>
                    <div class="mt-3">
                      <span class="badge badge-pill badge-success" data-toggle="modal" data-target="#modal-form">View More</span>
                      <span class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modal-notification">Flag Review</span> 
                  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">                         
                            <div class="card-body px-lg-5 py-lg-5">
                              <div class="text-center text-muted mb-4">
                                <small>More Review Details</small>
                              </div>                             
                              <div class="card">
                                    <!-- Card image -->
                                    <img class="card-img-top" src="assets/img/theme/img-1-1000x900.jpg" alt="Image placeholder">
                                    <!-- Card body -->
                                    <div class="card-body">
                                      <h5 class="h2 card-title mb-0">Review Title</h5>
                                      <small class="text-muted">by John Tom on Oct 29th at 10:23 AM</small>
                                      <p class="card-text mt-4">Tiger is a great package and loved by all 4 that includes the most important components and features.</p>
                                      <a href="#!" class="btn btn-link px-0">Action</a>
                                    </div>
                                  </div> 
                               

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>        
                     
                    </div>
                  </div>
                </div>              
             
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card bg-gradient-orange shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0 text-white"> Reviews</h3>
            </div>
            <div class="card-body">
              <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                <div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-bell-55"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="text-white font-weight-bold">10:30 AM</small>
                    <h5 class="text-white mt-3 mb-0">New message</h5>
                    <p class="text-white text-sm mt-1 mb-0">Tiger is a great package and loved by all 4 that includes the most important components and features.</p>
                     <div class="mt-3">
                      <span class="badge badge-pill badge-info" data-toggle="modal" data-target="#modal-form">View More</span>
                      <span class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modal-notification">Flag Review</span> 
                      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">                         
                            <div class="card-body px-lg-5 py-lg-5">
                              <div class="text-center text-muted mb-4">
                                <small>More Review Details</small>
                              </div>                             
                              <div class="card">
                                    <!-- Card image -->
                                    <img class="card-img-top" src="assets/img/theme/img-1-1000x900.jpg" alt="Image placeholder">
                                    <!-- Card body -->
                                    <div class="card-body">
                                      <h5 class="h2 card-title mb-0">Review Title</h5>
                                      <small class="text-muted">by John Tom on Oct 29th at 10:23 AM</small>
                                      <p class="card-text mt-4">Tiger is a great package and loved by all 4 that includes the most important components and features.</p>
                                      <a href="#!" class="btn btn-link px-0">Action</a>
                                    </div>
                                  </div> 
                               

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>        
                     
                    </div>
                  </div>
                </div>              
             
              </div>
            </div>
          </div>
        </div>
       
                  <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                      <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Confirmation !!!</h4>
                            <p>So you want to Proceed</p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-white">Yes, Ido</button>
                          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
              
          <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->


  <script src="assets/js/argon.min5438.js?v=1.2.0"></script>
