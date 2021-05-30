<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lets gov</h1>
                      <a href="<?php echo base_url(); ?>Admin_dashboard/add_gov" style="margin-left: 88%;">Add Gov</a>  
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>#</th>                                                
												<th>Title</th>
												<th>Url</th>
                                                <th>Status</th>
                                                <th></th>                                                
                                            </tr>
                                        </thead>
										
                                        
                                        <tbody>
										<?php if(!empty($gov_list)){
											$i=1;
                                                  foreach($gov_list as $list){
 											?>
                                            <tr>
											<td><?php echo $i++; ?></td>
                                               <td><?php echo $list->title; ?></td>											   
											   <td><?php echo $list->url; ?></td>
											   <td><?php if($list->status == 1){ echo "Active"; }else{ echo "Deactive"; } ?></td>
											   <td><a href="<?php echo base_url(); ?>Admin_dashboard/view_gov/<?php echo $list->gov_id; ?>" >View <a href="<?php echo base_url(); ?>Admin_dashboard/edit_gov/<?php echo $list->gov_id; ?>" >Edit <a href="<?php echo base_url(); ?>Admin_dashboard/delete_gov/<?php echo $list->gov_id; ?>">Delete</td>
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