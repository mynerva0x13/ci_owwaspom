      
 <script>
function displaySelectedFile(input) {
  var file = input.files[0];
  var fileLabel = document.getElementById('fileLabel');

  if (file) {
    fileLabel.textContent = file.name;
  } else {
    fileLabel.textContent = 'No file chosen';
  }
}


 </script>               
   <form class="form-horizontal span6" action="../SubScholar/documents/documentsScholar/doInsert" method="POST" enctype="multipart/form-data">

            <div class="row">
            <div class="col-lg-12">
               <h3 >Add New Documents</h3>
              
            </div>
            <!-- /.col-lg-12 -->
         </div> 
                 
                     
                     <div class="row">
                  
                        <div class="col-md-5">
                        <div class="form-group">
                        <div class="custom-file-upload">
                              <!-- <input id="firstname" name="firstname" type="hidden" value="<?php echo $acc; ?>"> -->

                                                            <?php   
                                  
                                 
                                  foreach ($cur as $result) {
                            
?>
        
                              <input id="firstname" name="firstname" type="hidden" value="<?php echo $acc; ?>">
                              <input id="scholar_id" name="scholar_id"  type="hidden" value="<?php echo $result->scholar_id; ?>">
                              <input id="firstname" name="firstname"  type="hidden" value="<?php echo $result->firstname; ?>">
                              <input id="middlename" name="middlename"  type="hidden" value="<?php echo $result->middlename; ?>">
                              <input id="lastname" name="lastname"  type="hidden" value="<?php echo $result->lastname; ?>">
                              <input id="program" name="program"   type="hidden" value="<?php echo $result->program; ?>">
                            <!-- <input type="file" id="fileToUpload" name="fileToUpload" > -->
                            <input type="file" id="fileToUpload" name="fileToUpload" onchange="displaySelectedFile(this)" accept=".pdf,.doc,.docx,image/*">
                            <label for = "fileToUpload">
                              <span>Choose File: </span>
                              <span id="fileLabel" class="file-label">No file chosen</span>
                            </label>
                          
                        </div>
                        </div>
                        </div>

                        <div class="col-md-3">
                              <div class="form-group">               
                                  <label class="bmd-label-floating">Document requirements</label>
                                        <select class="form-control input-sm" name="description" id="description">
                                          <option value="Certificate of Grades">Certificate of Grades</option>
                                          <option value="Semestrial Report">Semestrial Report</option>   
                                          <option value="Transcript Record">Transcript Record</option>
                                          <option value="Certificate of Enrollment">Certificate of Enrollment</option>
                                        </select>
                              </div>    
                          </div>
                        <div class="col-md-2">
                     <div class="form-group">          
                     <label class="bmd-label-floating">Year Level</label>     
                              <select class="form-control input-sm"  name="yearlevel" id="yearlevel">
                                 <option value="1st year">1st year</option>
                                 <option value="2nd year">2nd year</option>   
                                 <option value="3rd year">3rd year</option>
                                 <option value="4th year">4th year</option>  
                                 <option value="5th year">5th year</option>  
                              </select>
                           </div>    
                        </div>

                      <div class="col-md-2">
                        <div class="form-group">
                        <label class="bmd-label-floating">Semester</label>
                              <select class="form-control input-sm"  name="semester" id="semester">
                                 <option value="1st Semester">1st Semester</option>
                                 <option value="2nd Semester">2nd Semester</option>   
                              </select>
                     </div>
                     </div>

                     </div>
                     <div class="row">
                     <div class="col-md-5">
                     <div class="form-group">
                        <p>Click on the "Choose File" button to upload a file:</p>
                        </div>
                          </div>
                          <div class="col-md-4">
                     <div class="form-group">
                      <p>Click the description above:</p>
                          </div>
                        </div>
                      </div>

                    
               <div class="row">
                     <div class="col-md-8"> 
                        <button class="btn btn-info btn-round"  id="save" name="save" type="submit" ><strong>Save</strong></button>  
                        </div>
                     </div> 

            
            
         </form>
                            <?php      } ?>