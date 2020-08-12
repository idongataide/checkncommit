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
                                            <th>Email</th>
                                            <th>Phone Number</th>                                            
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>                                   
                                      
                                        <tbody>
                                        <?php foreach ($data['users'] as $key => $user) { ?>
                                            <tr>
                                            <td class="text-center text-muted"><?=$key + 1 ?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="public/images/avatars/1.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?=$user['fname'].' '. $user['lname']?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center text-muted"><?=$user['user_email']?></td>
                                                <td class="text-center text-muted"><?=$user['user_phone']?></td>
                                                <td class="text-center"><?=$user['user_address'].', '.$user['city_name'].', '.$user['state_name']?></td>
                                                <td class="text-center"><?=$user['date']?></td>
                                                <td class="text-center">
                                                    <div class="badge badge-success"><?=$user['status']?></div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="admin/userdetails/<?=$user['user_id']?>">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                   </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            </tbody> 
                                </table>
                            </div>
                        </div>