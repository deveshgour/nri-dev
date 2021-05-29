<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Post List</h1>
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>#</th>
                                                <th>Post</th>
                                                <th>Change status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
										
                                        
                                        <tbody>
										<?php if(!empty($post_list)){
											$i=1;
                                                  foreach($post_list as $list){
 											?>
                                            <tr>
											<td><?php echo $i++; ?></td>
                                                <td><?php $word_count = str_word_count($list->post); if($word_count >8){ echo word_limiter($list->post, 8);  }else{ echo $list->post; }  ?></td>
                                               <td><a href="<?php echo base_url(); ?>Admin_dashboard/change_status/<?php echo $list->post_id; ?>" ><?php if($list->status == 0){ echo "Active"; }else{ echo "Deactive"; }; ?></a></td>
											   <td><a href="<?php echo base_url(); ?>Admin_dashboard/post_detail/<?php echo $list->post_id; ?>" >Detail</a></td>
                                                
												
											</tr>
										<?php }} ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>