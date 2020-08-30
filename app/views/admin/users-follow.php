<?php include 'dashboard.php'?>

<!-- Header -->
<div class="header bg-green pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Checkncommit</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="followers">Users</a></li>
              <li class="breadcrumb-item active" aria-current="page">Followed Business</li>
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
      <div class="card">
      <div class="row justify-content-center">

        <?php for($i=0; $i<20; $i++){?> 
           <div class="col-md-6">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <!-- Avatar -->
                  <a href="#" class="avatar avatar-xl rounded-circle">
                    <img alt="Image placeholder" src=" public/assets/img/theme/team-2.jpg">
                  </a>
                </div>
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!">Business Name</a>
                  </h4>
                  <p class="text-sm text-muted mb-0">Started Following 22/2020</p>
                  <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>

                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-danger"><a href="business-reviews.php" class="text-white">Reviews</a></button>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
          <!-- Card body -->
         
        </div>
          <!-- Argon Scripts -->
  <!-- Core -->
  <script src=" public/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src=" public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src=" public/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src=" public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src=" public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src=" public/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src=" public/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->


  <script src=" public/assets/js/argon.min5438.js?v=1.2.0"></script>
