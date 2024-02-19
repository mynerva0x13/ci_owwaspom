<?php echo $response;?><?php
$url = "SubAdmin/scholar/scholar1/doDelete";

?>
	<div class="row">
		<div class="col-lg-12"> 
				<h3 >Request Scholars <small>
				</div>
				<!-- /.col-lg-12 -->
			</div>
				
<form class="row g-3" action="<?php echo base_url($url)?>" method="POST">
	<table id="example"  class="table table-striped table-bordered table-hover" cellspacing="0" style="font-size:12px" >
						
					<thead>
						<tr> 
							<th>#</th>
							<th>Name</th>
							<!-- <th>LASTNAME</th> -->
							<!-- <th>CITYADDRESS</th> -->
							<th>Course</th>
							<th>Program</th>  
							<th>Contact#</th> 
							<th width="10%">Action</th>
							
							
						</tr>	
					</thead> 	

				<tbody>
						<?php 
$view = "";
foreach ($cur as $result) {
    echo '<tr>';
    echo '<td width="5%" align="center"></td>';
    echo '<td>' . $result->firstname . ' ' . $result->lastname . '</td>';
    echo '<td>' . $result->Course . '</td>'; 
    echo '<td>' . $result->program . '</td>';  
    echo '<td>' . $result->phone_num . '</td>';
    ?>
<td>
<?php

if ($result->request_description == "1") {
    $view = "editme";
} elseif ($result->request_description == "2") {
    $view = "editfam";
} elseif ($result->request_description == "3") {
    $view = "edited";
} 
elseif ($result->request_description == "4") {
    $view = "edit";
} 
else {
    $view = "";
}
?>
    <a class="btn btn-success text-light" href="<?php echo base_url("Staff/studentProfile?view=" .$view. "&link=$link&id=$result->request_info_id"); ?>">Review</a>

    <a class="btn btn-danger text-light" href="<?php echo base_url("SubScholar/profile/acceptEdit/dodeny?id=$result->request_info_id&link=$link")?>">Reject</a><?php echo $result->request_description ?>
</td>
    <?php
}
                        ?>
					</tbody>
						
						
					</table>
			
					</form> 