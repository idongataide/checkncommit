<?php include 'dashboard.php'?>   
<div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="card mb-3">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
                                        class="pe-7s-menu icon-gradient bg-mean-fruit"> </i>Registered Users
                                </div>
                            </div>
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/n</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>                                            
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>                                   
                                      
                                        <tbody>
                                        <?php for($i=0; $i<20; $i++){?>
                                            <tr>
                                            <td class="text-center text-muted">1</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="../images/avatars/1.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">John Doe</div>
                                                                <div class="widget-subheading opacity-7">Web Developer</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center text-muted">090090987</td>
                                                <td class="text-center">Madrid</td>
                                                <td class="text-center">
                                                    <div class="badge badge-success">Pending</div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="businessdetails">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                   </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            </tbody>                                                                  
                                </table>
                            </div>
                        </div>