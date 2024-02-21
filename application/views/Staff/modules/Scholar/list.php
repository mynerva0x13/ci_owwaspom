<?php echo $response;?><?php
$url = "SubAdmin/scholar/scholar1/doDelete";

?>
	<div class="row">
		<div class="col-lg-12"> 
				<h3 >Scholars <small>|  <label class="label label-xs" style="font-size: 20px"><a href="<?php echo base_url("Staff/scholar?view=add1")?>">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4">New</a></i></label> |</small></h3> 
				
				</div>
				<!-- /.col-lg-12 -->
			</div>
				
<form class="row g-3" action="<?php echo base_url($url)?>" method="POST">
	<table id="example"  class="table table-hover" cellspacing="0" style="font-size:12px" >
						
					<thead>
						<tr> 
							<th>#</th>
							<th  width="50"><!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> -->  Id</th>
							<th>Name</th>
							<!-- <th>LASTNAME</th> -->
							<!-- <th>CITYADDRESS</th> -->
							<th>Course</th>
							<th>Program</th>  
							<th>Contact#</th> 
							<th width="10%">Action</th>
							<th width="10%">Status</th>
							
							
						</tr>	
					</thead> 	

				<tbody>
						<?php 
						
							// per place yung staff
							foreach ($cur as $result) {
							echo '<tr>';
							echo '<td width="5%" align="center"></td>';
							echo '<td  width="13%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->scholar_id. '"/></td>';
							// echo '<td ><a href="index.php?view=view&id="><img src="'. $result->image.'" width="60" height="60" title="'.$result->LNAME.'"/></a></td>';
							echo '<td>'. $result->firstname.' ' . $result->lastname .'</td>';
							// echo '<td>'. $result->LASTNAME.'</td>';
							// echo '<td>'. $result->CITYADDRESS.'</td>'; 
							echo '<td>'. $result->Course.'</td>'; 
							echo '<td>'. $result->program.'</td>';  
							echo '<td>'. $result->phone_num.'</td>';

							// echo '<td width="10%" class="d-flex justify-content-center">
							// 		<a title="View Information"  class="btn btn-default btn-sm mr-1" href="'.base_url($link."/scholar?view=view&id=".$result->scholar_id).'" ><i class="fa fa-eye fa-fw"></i></a>
							// 		<a title="Approved" class="btn btn-success btn-sm mr-1" href="'.base_url("SubAdmin/scholar/scholar1/doActivate?status=on&id=".$result->scholar_id."&link=".$link).'"><i class="fa fa-check fa-fw"></i></a>
							// 		<a title="Reject" class="btn btn-danger btn-sm" href="'.base_url("SubAdmin/scholar/scholar1/doActivate?status=off&id=".$result->scholar_id."&link=".$link).'"><i class="fa fa-times fa-fw"></i></a>
						  	// 		</td>';
				
							// echo '<td  width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-success btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';
							
							echo '<td width="10%" class="d-flex justify-content-center">
							<a title="View Information"  class="btn btn-default btn-sm mr-1" href="'.base_url($link."/scholar?view=view&id=".$result->scholar_id).'" ><i class="fa fa-eye fa-fw"></i></a>
							</td>';
							echo '<td  width="10%" >
								<a style="font-size:12px" class="btn btn-info btn-xs" href="'.base_url("SubAdmin/scholar/scholar1/doActivate?status=on&id=".$result->scholar_id."&link=".$link).'">Activate</a>
								<a style="font-size:10px" class="btn btn-default btn-xs " href="'.base_url("SubAdmin/scholar/scholar1/doActivate?status=off&id=".$result->scholar_id."&link=".$link).'">Deactivate</a>
							</td>';
				// echo '<td  width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-success btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
						
					</table>
					<div class="btn-group">
					<!--   <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<button style="margin-left:12px" type="submit" class="btn btn-danger" name="terminate"><span class="glyphicon glyphicon-trash"></span> Terminate Selected</button>
					<button style="margin-left:12px" type="submit" class="btn btn-info" name="activate"><span class="glyphicon glyphicon-trash"></span>Graduate Selected</button>
					
					</form> 