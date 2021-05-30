<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Interesting Fact</h1>
                      <a href="<?php echo base_url(); ?>Admin_dashboard/add_fact" style="margin-left: 88%;">Add Fact</a>  
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>#</th>                                                
												<th>Title</th>
												<th>Description</th>
                                                <th>Status</th>
                                                <th></th>                                                
                                            </tr>
                                        </thead>
										
                                        
                                        <tbody>
										<?php if(!empty($fact_list)){
											$i=1;
                                                  foreach($fact_list as $list){
 											?>
                                            <tr>
											<td><?php echo $i++; ?></td>
                                               <td><?php echo $list->title; ?></td>											   
											   <td><?php 
											   $val_length = str_word_count($list->description);
											  if($val_length >10){
												  echo word_limiter($list->description, 10);
											  }else{
												 echo $list->description;  
											  }
											   ?></td>
											   <td><?php if($list->status == 1){ echo "Active"; }else{ echo "Deactive"; } ?></td>
											   <td><a href="<?php echo base_url(); ?>Admin_dashboard/view_fact/<?php echo $list->fact_id; ?>" >View <a href="<?php echo base_url(); ?>Admin_dashboard/edit_fact/<?php echo $list->fact_id; ?>" >Edit <a href="<?php echo base_url(); ?>Admin_dashboard/delete_fact/<?php echo $list->fact_id; ?>">Delete</td>
                                              </td>
                                               
											</tr>
										<?php }} ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>