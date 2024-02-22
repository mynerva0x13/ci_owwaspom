<?php
// check_message();

// @$IDNO = $_GET['id'];
?>
<style>
	th {
		padding: 5px;
		text-align: center;
	}
</style>

<?php echo $response ?>
<div class="row">
	<div class="col-lg-12">
		<h3>Student Profile</h3>
		<?php
function findToDisable($x, $disable) {
    if (!empty($disable)) {
        foreach ($disable as $item) {
            if ($item->request_description == $x) {
                if ($item->request_status == "pending") {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
    return false;
}


		foreach ($cur as $result) {


			?>

			<div class="student-profile py-4">
				<!-- the whole student form -->
				<div class="container">
					<!-- table  -->
					<div class="row">

						<div class="col">
							<div class="card shadow-sm">
								<div class="card-body bg-transparent border-0">
									<div class="card-header bg-transparent text-center">
										<img class="profile_img" src="C:\xampp\htdocs\OWWASPOM\images\profile.jpg"
											alt="student dp">
										<h5>
											<?php echo $result->firstname; ?>
											<?php echo $result->middlename; ?>
											<?php echo $result->lastname; ?>
										</h5>
									</div>
									<div class="card-body d-flex align-items-center justify-content-center">
										<div class="text-left">
											<p class="mb-0"><strong class="pr-1">Scholar ID:</strong>
												<?php echo $result->scholar_id; ?>
											</p>
											<p class="mb-0"><strong class="pr-1">Scholarship Program:</strong>
												<?php echo $result->program; ?>
											</p>
											<p class="mb-0"><strong class="pr-1">School:</strong>
												<?php echo $result->school; ?>
											</p>
											<p class="mb-0"><strong class="pr-1">Year:</strong>
												<?php echo $result->year_level; ?>
											</p>
										</div>
									</div>
									<div class="text-right">
										<?php
										
							if(!findToDisable(1, $disable)){ ?>
										<a href="<?php echo base_url('Scholar/studentProfile?view=editme&id='.$result->scholar_id) ?>">
											<button type="button" class="btn btn-success btn-floating">
												<i class="fa fa-pencil-square-o"></i>
											</button>
										</a>
										<?php 
							}
										else {
echo "<div class='badge bg-warning text-dark'><h5>You can't edit. wait for admin approval</h5></div>";
										}
?>
									</div>
									<h4 class="mb-0"><i class="fa fa-user pr-3"></i>Scholars Information
									</h4>

								</div>

								<div class="card-body pt-0">
									<table class="table table-hover table-sm">
										<tr>
											<td width="50%"><strong>Permanent Address </strong>:
												<?php echo $result->address; ?>
											</td>
											<td width="50%"><strong>Present address : </strong>
												<?php echo $result->presentaddress; ?>
												</$td>
										</tr>

										<tr>
											<td width="50%"><strong>Gender: </strong>
												<?php echo $result->gender; ?>
											</td>
											<td width="50%"><strong>Age: </strong>
												<?php echo $result->age; ?>
											</td>
										</tr>
										<tr>
											<td width="50%"><strong>Birthday : </strong>
												<?php echo $result->birthdate; ?>
											</td>
											<td width="50%"><strong>Place of Birth : </strong></td>

										</tr>
										<tr>
											<td width="50%"><strong>Telephone Number: </strong></td>
											<td width="50%"><strong>Cellphone Number : </strong>
												<?php echo $result->phone_num; ?>
											</td>

										</tr>
										<tr>
											<td width="50%"><strong>Religion : </strong>
												<?php echo $result->religion; ?>
											</td>
											<td width="50%"><strong>Citizenship : </strong>
												<?php echo $result->citizenship; ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<!-- end of table -->

					</div>
					<!-- end of whole student form -->

				</div>

				<div class="student-profile py-4">
					<!-- Relationship to OFW form -->
					<div class="container">
						<!-- table  -->
						<div class="row">
							<!-- <div class="col-lg-4">
								<div class="card shadow-m">
								</div>
							</div> -->

							<div class="col-lg-12">
								<div class="card shadow-sm">
									<div class="card-body bg-transparent border-0">
										<div class="card-header bg-transparent text-center">
											<h4>Relationship to OFW </h4><br>
										</div>
										<div class="card-body d-flex align-items-center justify-content-center">
											<div class="text-left">
												<h5>Name of the OFW :
													<?php echo $result->OFW_firstname; ?>
													<?php echo $result->OFW_middlename; ?>
													<?php echo $result->OFW_lastname; ?>
												</h5>
												<p class="mb-0"><strong class="pr-1">Relationship : </strong>
													<?php echo $result->OFW_relationship; ?>
												</p>
												<p class="mb-0"><strong class="pr-1">Category: </strong>
													<?php echo $result->category; ?>
												</p>
											</div>
										</div>
										<div class="text-right">
											<?php
							if(!findToDisable(2, $disable)){ ?>
											<a href="<?php echo base_url('Scholar/studentProfile?view=editfam&id='.$result->scholar_id) ?>">
												<button type="button" class="btn btn-success btn-floating">
													<i class="fa fa-pencil-square-o"></i>
												</button>
											</a>
											<?php
							}

else {
	echo "<div class='badge bg-warning text-dark'><h5>You can't edit. wait for admin approval</h5></div>";
											}

?>
										</div>
										<h4 class="mb-0"><i class="fas fa-user-circle pr-3"></i>Family background</h4>
									</div>
									<div class="card-body pt-0">
										<table class="table table-hover table-sm">
											<tr>
												<td width="50%"><strong class="pr-3">Number of siblings :</strong>
													<?php echo $result->number_siblings; ?>
												</td>
												<td></td>
											</tr>
											<tr>
												<th colspan="2">Father's information</th>
												<td></td>
											</tr>
											<tr>
												<td width="50%"><strong>Name: </strong>
													<?php echo $result->father_fname; ?>
													<?php echo $result->father_mname; ?>
													<?php echo $result->father_lname; ?>
												</td>
												<td width="50%"><strong> Status: </strong>
													<?php echo $result->fatherstatus; ?>
												</td>
											</tr>
											<tr>
												<td width="50%"><strong>Occupation: </strong>
													<?php echo $result->father_occupation; ?>
												</td>
												<td width="50%"><strong>Educational Attainment: </strong>
													<?php echo $result->Father_Educ; ?>
												</td>
											</tr>
											<tr>
												<td width="50%"><strong>Contact numbers: </strong>
													<?php echo $result->father_contactnum; ?>
												</td>
												<td width="50%"></td>
											</tr>
											<tr>
												<th colspan="2">Mother's information</th>
												<td></td>
											</tr>
											<tr>
												<td width="50%"><strong>Name: </strong>
													<?php echo $result->mother_fname; ?>
													<?php echo $result->mother_mname; ?>
													<?php echo $result->mother_lname; ?>
												</td>
												<td width="50%"><strong>Status: </strong>
													<?php echo $result->motherstatus; ?>
												</td>
											</tr>
											<tr>
												<td width="50%"><strong>Occupation: </strong>
													<?php echo $result->mother_occupation; ?>
												</td>
												<td width="50%"><strong>Educational Attainment: </strong>
													<?php echo $result->mother_Educ; ?>
												</td>
											</tr>
											<tr>
												<td width="50%"><strong>Contact numbers: </strong>
													<?php echo $result->mother_contactnum; ?>
												</td>
												<td></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<!-- end of table -->
							<!-- Whole table -->
							<div style="height: 26px"></div>
							<div class="col-lg-12">
								<div class="card shadow-sm">
									<div class="card-body bg-transparent border-0">
										<div class="text-right">
											<?php
							if(!findToDisable(3, $disable)){ ?>
											<a href="<?php echo base_url('Scholar/studentProfile?view=edited&id='.$result->scholar_id )?>">
												<button type="button" class="btn btn-success btn-floating">
													<i class="fa fa-pencil-square-o"></i>
												</button>
											</a>							<?php
							}

else {
	echo "<div class='badge bg-warning text-dark'><h5>You can't edit. wait for admin approval</h5></div>";
											}

?>
										</div>
										<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Educational Information
										</h4>
									</div>
									<div class="card-body pt-0">
										<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div> -->
										<table class="table table-striped table-hover table-sm">
											<tr>
												<th colspan="3">Primary</th>
											</tr>
											<tr>
												<td><strong>School :
														<?php echo $result->primary_school; ?>
													</strong></td>
												<td><strong>Period of Attendance :</strong>
													<?php echo $result->primary_year_from; ?> -
													<?php echo $result->primary_year_to; ?>
												</td>
											</tr>
											<th colspan="3">Secondary</th>
											<tr>
												<td><strong>School : </strong>
													<?php echo $result->secondary_school; ?>
												</td>
												<td><strong>Period of Attendance :</strong>
													<?php echo $result->secondary_year_from; ?> -
													<?php echo $result->secondary_year_to; ?>
												</td>

											</tr>

											<tr>
												<th colspan="3">Tertiary</th>
											</tr>
											<tr>
												<td><strong>School : </strong>
													<?php echo $result->school; ?>
												</td>
												<td><strong>Period of Attendance :</strong>
													<?php echo $result->tertiary_year_from; ?> -
													<?php echo $result->tertiary_year_to; ?>
												</td>
											</tr>


										</table>
									</div>

								</div>
								<!-- end of whole table -->
								<!-- Whole table -->
								<div style="height: 26px"></div>
								<div class="card shadow-sm">
									<div class="card-body bg-transparent border-0">
										<div class="text-right">
                                  <?php
								  
							if(!findToDisable(4, $disable)){ ?>
										<a href="<?php echo base_url('Scholar/studentProfile?view=editapp&id='.$result->scholar_id )?>">
											<button type="button" class="btn btn-success btn-floating">
													<i class="fa fa-pencil-square-o"></i>
												</button></a>							<?php
							}

else {
	echo "<div class='badge bg-warning text-dark'><h5>You can't edit. wait for admin approval</h5></div>";
											}

?>
										</div>
										<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Scholar Application
											Information</h4>
									</div>
									<div class="card-body pt-0">
										<table class="table table-striped table-hover table-sm">
											<tr>
												<td colspan="2"><strong>Name of School :
														<?php echo $result->school; ?>
													</strong></td>
											</tr>
											<tr>
												<td><strong>Course : </strong>
													<?php echo $result->Course; ?>
												</td>
												<td><strong>Year Level : </strong>
													<?php echo $result->year_level; ?>

											</tr>
										</table>
									</div>

								</div>
							</div>
							<!-- end of whole table -->
						</div>
						<!-- end of whole student form -->

					</div>



					<?php
		}
		?>