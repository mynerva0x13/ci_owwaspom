<?php
			// if (!isset($_SESSION['TYPE'])=='Administrator'){
		//     redirect(web_root."index.php");
		//    }

		?>

<style>
    /* Your CSS styles here */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dots-icon {
      font-size: 20px;
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
<div class="row">
			<div class="col-lg-12"> 
					<h3 >Adding Documents <small>|  <label class="label label-xs" style="font-size: 20px"><a href="<?php echo base_url("Scholar/documents?view=add")?>">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4"> New</a></i></label> |</small></h3> 
					
					</div>
				</div>
						<form action="controller.php?action=delete" Method="POST">  					
						<table id="example" class="table table-hover " cellspacing="0" style="font-size:12px" >
						
						<thead>
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Document Category</th> 
								<!-- if ito ba ay tor, Summary of Grades or etc -->
								<th>Year</th>
								
								<th>Date uploaded</th>	
								<th>Actions</th>	
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
									echo '<td>';
									// Vertical three dots icon
									echo '<div class="dropdown">';
									echo '<div class="dots-icon">&#8942;</div>';
									// Popup menu for edit, delete, view, and download
									echo '<div class="dropdown-content">';
									echo '<a href="'.base_url("Scholar/documents?view=edit&id=$result->document_id").'">Edit</a>';
									echo '<a href="'.base_url("Scholar/documents?view=view&id=$result->document_id").'">View</a>';
									echo '<a onclick="deleteDocument(' . $result->document_id . ')">Delete</a>';
									echo '<a href="#" onclick="downloadDocument(' . $result->document_id . ')">Download</a>';
									echo '</div>';
									echo '</div>';
									echo '</td>';
									echo '</tr>';


							// } 
						}
							?>
						</tbody>
							
						</table> 
						</form> 

						<script>function deleteDocument(ids) {
							let con = confirm("Do you want to delete this table?");

							if(con) {
								// Basic Fetch Example
								fetch('<?php echo base_url('SubScholar/documents/documentsScholar/doDelete') ?>',{
									method: "POST",
									headers: {
    'Content-Type': 'application/json'
  },                                                                                                                                                                                                                                                                                                                                          
									body: JSON.stringify({
										id: ids
									})
								})
  								.then(response => {
									alert("Delete table successfully");
  })
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    // Handle any errors that occurred during the fetch
    console.error('Fetch error:', error);
  });

							}
						}
							</script>