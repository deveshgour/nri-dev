<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Connect to root</h1>
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>#</th>
                                                <th>Connect to root</th>
                                                <th>Status</th>                                                
                                            </tr>
                                        </thead>
										
                                        
                                        <tbody>
										<?php if(!empty($connect_to_root)){
											$i=1;
                                                  foreach($connect_to_root as $list){
 											?>
                                            <tr>
											<td><?php echo $i++; ?></td>
                                               <td><?php echo $list->connect_root; ?></td>
											   <td><?php if($list->status == 1){ echo "Active"; }else{ echo "Deactive"; } ?></td>
                                               
											</tr>
										<?php }} ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>