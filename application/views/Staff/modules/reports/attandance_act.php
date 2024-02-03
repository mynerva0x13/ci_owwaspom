<?php
			if(!isset($_SESSION['USERID'])){
			redirect(web_root."admin/index.php");
		}
		
		?>
		<style>
		
		.button-print {
					margin-left:1400px;
					border-radius: 4px;
					width: 100px;
					height: 26px;
					border-color: lightgray;
					border-radius: 4px;
					margin-bottom: 20px;
	}
	.button-print:hover {
					background-color: rgb(113, 138, 247);
	}

		

	</style>

		<div class="row">
			<div class="col-lg-12"> 
					<h3  >Attended Activities List</h3> 
					
					</div>
				</div>
						<form action="controller.php?action=delete" Method="POST">  
						<div class="table-responsive">			
						<table id="example" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
						<button type="button" class="button-print">Print &nbsp;<i class="fa fa-print"></i></button>
						<thead>
							<tr>
								<th width="5%">#</th>
								<th>Name</th>
								<th>Description</th>
								<th>Semester</th>
								<th>School Year</th>
								<th>Date</th>
								<th width="10%" >Action</th>
						
							</tr>	
						</thead> 
						<tbody>
							<?php   
								foreach ($cur as $result) {
								echo '<tr>';
								echo '<td width="5%" align="center"></td>';
								echo '<td> </a></td>';
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->DEPARTMENTID.'"  class="btn btn-info btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
											<a title="Delete" href="controller.php?action=delete&id='.$result->DEPARTMENTID.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> </a>
											</td>';
								echo '</tr>';
							} 
							?>
						</tbody>
							
						</table>
		
		<br>
					<button class="btn btn-info btn-round" id="return_to_main" type="submit" name="return" style="font-size: 10px; margin-left: 30px"><span class="fa fa-print fw-fa"></span>  Print </button>
<div class="print_reciept" id="print_reciept" style="width: 800px;">
					</div>
						</form>