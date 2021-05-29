<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Users</h1>
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
										
                                        
                                        <tbody>
										<?php if(!empty($post_user)){
                                                  foreach($post_user as $user){
													
 											?>
                                            <tr>
                                                <td><?php echo $user->firstname.' '.$user->lastname;  ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td><?php if($user->status == '1'){ echo 'Deactive'; }else{ echo 'Active'; } ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($user->create_date)); ?></td>
                                                <td><a href="<?php echo base_url(); ?>Admin_dashboard/post_list/<?php echo $user->user_id; ?>" ><?php echo 'Post'; ?></a></td>
                                                
                                            </tr>
										<?php }} ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>