<?php
@$IDNO = $_GET['id'];
@$syid = $_GET['sy'];

$ids = (!empty($_GET['id'])) ? "AND notif_creator=".$_GET['id'] : null;
?>

<?php echo $response ?>

<div class="student-profile py-4">

<div class="w-100">

                        <div class="card-body pt-0">
                        <h3>Edit Request Approval</h3>
						<?php if(!empty($_GET["id"])) { ?>
                        <div class="row">
                        <div class="col-sm-5">
                        <div class="form-group">
                            <label class="bmd-label-floating">Body</label>
                        </div>
                        </div> 

                        <div class="col-sm-1">
                        <div class="form-group">
                            <label class="bmd-label-floating">Notification type</label>
                        </div>
                        </div>   

                        <div class="col-sm-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Creator</label>
                        </div>
                        </div>   
                        <div class="col-sm-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Created</label>
                        </div>
                        </div> 
                        <div class="col-sm-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Actions</label>
                        </div>
                        </div> 
                        </div>
                        <!-- <input name="notification_id" type="hidden" value="<?php echo $result->catch_id ?>"> -->
                        <?php

                           $notifications = $this->db->query("SELECT * FROM `notification` WHERE notification_for = 'Administrator' AND notification_status = 'unread' $ids")->result();

                            foreach ($notifications as $notification) {
                                $type = $notification->notification_type;
                                $id = $notification->catch_id;

                                $student = new Student();
                                $scholarid = $student->single_students($id);
                                $scholar_id = $scholarid ? $scholarid->scholar_id : null;


                                if ($type == "comment" ) {
                                    $comment = new Comments();
                                    $res = $comment->single_comments($id);
                                    $commentid = $res ? $res->announcement_id : null;
        
        
                                    $announcement_id = null;
                                    $announcement = new Announcement();
                                    $a = $announcement->single_announcement($commentid);
                                    $announcement_id = $a ? $a->id_announcement : null;
                            
                                    $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
                                    $this->db->query($sql);
                                    $link = base_url("$link2/announcement?view=view&id=" . $announcement_id);
                                } elseif ($type == "reply") {    

                                    $reply = new Replies ();
                                    $res = $reply->single_replies($id);
                                    $id = $res ? $res->commentid : null;

                                    $comment = new Comments();
                                    $res = $comment->single_comments($id);
                                    $commentid = $res ? $res->announcement_id : null;


                                    $announcement_id = null;
                                    $announcement = new Announcement();
                                    $a = $announcement->single_announcement($commentid);
                                    $announcement_id = $a ? $a->id_announcement : null;
                                    $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
                                    $this->db->query($sql);
                                    
                                    $link = base_url("$link2/announcement?view=view&id=" . $announcement_id);
                                } elseif ($type == "request") {    
                                    $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
                                    $this->db->query($sql);  
                                    $link = base_url("$link2/modstudent/index.php?view=view&id=" . $scholar_id);
                                } else {
                                    $link = base_url("admin/index.php");
                                }

                        echo '
                            <div class="bg-light rounded p-2">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notification_message . '</label>
                                        </div>
                                    </div> 
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notification_type . '</label>
                                        </div>
                                    </div>   
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notif_creator . '</label>
                                        </div>
                                    </div>   
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notification_date . '</label>
                                        </div>
                                    </div> 
                                    <div class="col-sm-2">
                                        <div class="form-group"> 
                                        <a href="' . $link . '" class="userinfo btn btn-info" name="save" type="submit" value="' . $notification->notification_id . '"
                                        onclick="updateNotificationStatus(' . $notification->notification_id . ')">
                                        <span class="fa fa-save fw-fa"></span> View Info
                                    </a>                                                              
                                        </div>
                                    </div>
                                </div> 
                            </div>';
                    }
				}
                    ?>


                </div>

	<!-- the whole student form -->
	<div class="container">
		<!-- table  -->
		<div class="row">
			<div class="col-lg-6">
				<div class="student-profile py-4">
					<div class="card shadow-sm mb-5 mt-4">
						<div class="card-header bg-transparent text-center">
							<img class="profile_img" src="C:\xampp\htdocs\OWWASPOM\images\profile.jpg" alt="student dp">
							<h5>
								<?php echo $result->firstname; ?>
								<?php echo $result->middlename; ?>
								<?php echo $result->lastname; ?>
							</h5>
						</div>
						<div class="card-body">
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

						<div class="card-body bg-transparent border-0">
							<div class="text-right">
								<a href="<?php echo base_url("$link2/scholar?view=edit&id=$result->scholar_id")?>">
									<button type="button" class="btn btn-success btn-floating">
										<i class="fa fa-pencil-square-o"></i>
									</button>
								</a>
							</div>


							<h4 class="mb-0"><i class="fa fa-user pr-3"></i>Scholars Information </h4>

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
					<!-- end of table -->
				</div>
			</div>
			<div class="col-lg-6">
				<div class="student-profile py-4 mt-4">
					<div class="card shadow-sm">

						<div class="card-body bg-transparent border-0">
							<div class="text-right">

							</div>
							<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Upload Documents</h4>
						</div>
						<div class="card-body pt-0">
							<table id="example" class="table table-striped table-hover table-sm dataTable ">
								<thead>

									<th>Filename</th>
									<th>Documents</th>
									<th>FileSize</th>
									<!-- <th>Uploader</th> -->
									<!-- <th>Status</th>    -->
									<th>Date/Time Upload</th>
									<!-- <th>Downloads</th> -->
									<th>Action</th>

								</thead>
<tbody>
								<tr>
<?php 
$sql = $this->db->query("SELECT * FROM upload_documents WHERE report_sender=$result->scholar_id")->result();

if(!empty($sql)) {
	foreach($sql as $item) {
	echo "<td>$item->document_name</td>";
	
	echo "<td>$item->document_description</td>";
	
	echo "<td></td>";
	
	// echo "<td>$item->document_description</td>";
	echo "<td>$item->date_submitted</td>";
	echo "<td>";
	echo '<a class="btn btn-primary" href="'.base_url($link2."/scholar?view=viewdoc&id=$item->document_id").'">View</a>';
	echo '<a class="btn btn-primary" href="'.base_url("SubScholar/documents/documentsScholar/doDelete?link=$link2&direct=notif&id=$item->document_id").'">DELETE</a>';
	echo '<a class="btn btn-primary" href="'.base_url("SubScholar/documents/documentsScholar/downloadfile?link=$link2&direct=notif&id=$item->document_id").'">Download</a>';
	echo "</td>";
	} 
}
?>
									<!-- <td width="15%">Certificate of Grades </td>
									<td> 3KB </td>
									<td>June 29,2023 </td>
									<td> <i class="fa fa-download" aria-hidden="true" style="font-size: 22px;"></i></td>


									<td>
										<button class='btn btn-success btn-sm' value=''><i class="fa fa-picture-o"
												aria-hidden="true"></i></button>
										<button class='btn btn-danger btn-sm' value=''><i class="fa fa-trash"
												aria-hidden="true"></i></button>

									</td>

								</tr>
								<td width="15%">Certificate of Enrollment </td>
								<td> 3KB </td>
								<td>June 29,2023 </td>
								<td> <i class="fa fa-download" aria-hidden="true" style="font-size: 22px;"></i></td>


								<td>
									<button class='btn btn-success btn-sm' value=''><i class="fa fa-picture-o"
											aria-hidden="true"></i></button>
									<button class='btn btn-danger btn-sm' value=''><i class="fa fa-trash"
											aria-hidden="true"></i></button>

								</td> -->

								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
			<!-- end of whole student form -->

		</div>


		<!-- Relationship to OFW form -->
		<!-- <div class="container"> -->
		<!-- table  -->
		<div class="row">
			<div class="col-lg-6">
				<div class="student-profile py-4 ">
					<div class="card shadow-m">
						<div class="card-header bg-transparent text-center">
							<h4>Relationship to OFW </h4><br>
						</div>
						<div class="card-body">

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
					<!--</div>
				</div>-->

				<!-- <div class="col-lg-8"> -->
				<!--<div class="card shadow-sm">-->
					<div class="card-body bg-transparent border-0">
						<div class="text-right">
							<a href="<?php echo base_url("$link2/scholar?view=editfam&id=$result->scholar_id") ?>">
								<button type="button" class="btn btn-success btn-floating">
									<i class="fa fa-pencil-square-o"></i>
								</button>
							</a>
						</div>
						<h4 class="mb-0"><i class="fas fa-user-circle pr-3"></i>Family background</h4>
					</div>
					<div class="card-body pt-0">
						<table class="table table-hover table-sm">
							<tr>
								<td width="50%"><strong class="pr-3">Number of siblings :</strong>
									<?php echo $result->number_siblings; ?>
								</td>
							</tr>
							<tr>
								<th>Father's information</th>
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
								<th>Mother's information</th>
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


				<!-- </div> -->
				<!-- end of table -->
				<!-- Whole table -->
				<div style="height: 26px"></div>
				<div class="card shadow-sm">

					<div class="card-body bg-transparent border-0">
						<div class="text-right">
							<a href="<?php echo base_url("$link2/scholar?view=edited&id=$result->scholar_id")?>">
								<button type="button" class="btn btn-success btn-floating">
									<i class="fa fa-pencil-square-o"></i>
								</button>
							</a>
						</div>
						<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Educational Information</h4>
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
							<a href="<?php echo base_url("$link2/scholar?view=editapp&id=$result->scholar_id") ?>">
								<button type="button" class="btn btn-success btn-floating">
									<i class="fa fa-pencil-square-o"></i>
								</button></a>
						</div>
						<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Scholar Application
							Information
						</h4>
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
				<!-- end of whole table -->

				<div style="height: 26px"></div>

			</div>


		</div>
		<!-- end of whole student form -->

		<!-- </div> -->