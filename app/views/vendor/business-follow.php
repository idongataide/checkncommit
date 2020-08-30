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
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Your Followers</li>
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
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
   
            <div class="card-header">
              <h3 class="mb-0">List of Followers</h3>
              <p class="text-sm mb-0">
              List of Followers
              </p>
            </div>
            <div class="table-responsive py-4">
              <table class="table align-items-center table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th>User Name</th>
                    <th>Location</th>                    
                    <th>Date Registered</th>
                    <th>Messages</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Business Name</th>
                    <th>Location</th>                    
                    <th>Date Registered</th>
                    <th>Messages</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php for($i=0; $i<20; $i++){?> 
                  <tr>
                    <td>Tiger Battery</td>
                    <td>Lagos</td>
                    <td>2011/04/25</td> 
                    <td>
                    <a href="vendor/chat">
                      <span class="badge badge-dot mr-4">
                        <i class="fas fa-comment" style="color:skyblue"></i>
                      </span>
                     </a> 
                    </td>
                    <td><a href="vendor/userreviews"> <span class="badge badge-pill badge-danger">View Reviews </span> </a>    </td>

                     
                  </tr>
                    <?php }?>
             
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
 
  <script src=" public/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src=" public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src=" public/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src=" public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src=" public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="   public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="   public/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <!-- Argon JS -->
  <script src="   public/assets/js/argon.min5438.js?v=1.2.0"></script>
