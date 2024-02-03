		<?php
			// if (!isset($_SESSION['TYPE'])=='Administrator'){
		//     redirect(web_root."index.php");
		//    }

		?>
			<div class="row">
			<div class="col-lg-12"> 
					<h3 >Adding Documents <small>|  <label class="label label-xs" style="font-size: 20px"><a href="documents?view=add">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4"> New</a></i></label> |</small></h3> 
					
					</div>
				</div>
						<form action="controller.php?action=delete" Method="POST">  					
						<table id="example" class="table table-hover table-bordered" cellspacing="0" style="font-size:12px" >
						
						<thead>
							<tr>
								<th>No.</th>
								<th>File Name</th>
								<th>Description</th>
								<th>Year</th>
								<th>Semester</th>	
							</tr>	
						</thead> 
						<tbody>
							<?php 
								
							
								foreach ($cur as $result) {
									if ($result->document_status == 'hidden') {
										continue; // Skip this iteration of the loop
									}

								if ($result->report_sender == $user){
						
									echo '<tr>';
									echo '<td width="5%" align="center"></td>';
									echo '<td> '. $result->document_name.'</td>';
									echo '<td> '. $result->document_description.'</td>';
									echo '<td> '. $result->year_level.'</td>';
									echo '<td> '. $result->semester.'</td>';
									echo '</tr>';
							} 
						}
							?>
						</tbody>
							
						</table> 
						</form> 