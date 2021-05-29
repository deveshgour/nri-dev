<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Connect to root</h1>
                      <a href="<?php echo base_url(); ?>admin/add_root_detail" style="margin-left: 88%;">Add root detail</a>  
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>#</th>
                                                <th>Root</th>
												<th>Title</th>
												<th>Main text</th>
                                                <th>Status</th>
                                                <th></th>                                                
                                            </tr>
                                        </thead>
										
                                        
                                        <tbody>
										<?php if(!empty($root_detail)){
											$i=1;
                                                  foreach($root_detail as $list){
													  $connect_to_root = $this->Common_model->getsingle("connect_to_root",array("root_id" => $list->root_id));
 											?>
                                            <tr>
											<td><?php echo $i++; ?></td>
                                               <td><?php echo $connect_to_root->connect_root; ?></td>
											   <td><?php echo $list->title; ?></td>
											   <td><?php 
											   $val_length = str_word_count($list->root_detail);
											  if($val_length >10){
												  echo word_limiter($list->root_detail, 10);
											  }else{
												 echo $list->root_detail;  
											  }
											   ?></td>
											   <td><?php if($list->status == 1){ echo "Active"; }else{ echo "Deactive"; } ?></td>
											   <td><a href="<?php echo base_url(); ?>admin/root_detail/<?php echo $list->root_id; ?>/<?php echo $list->detail_id; ?>" >Detail</td>
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