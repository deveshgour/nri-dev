<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pages</h1>
                      <a href="<?php echo base_url(); ?>Admin_dashboard/add_page" style="margin-left: 88%;">Add Page</a>  
                        
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
										<?php if(!empty($page_list)){
											$i=1;
                                                  foreach($page_list as $list){
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
											   <td><a href="<?php echo base_url(); ?>Admin_dashboard/view_page/<?php echo $list->page_id; ?>" >View </a><a href="<?php echo base_url(); ?>Admin_dashboard/edit_page/<?php echo $list->page_id; ?>" >Edit </a></td>
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