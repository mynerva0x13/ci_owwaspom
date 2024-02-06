<?php
$url = "SubAdmin/scholar/scholar1/doEdit?id=".$con."link=$link2";

?>

<form class="row g-3" action="<?php echo base_url($url)?>" method="POST">

<input  id="scholar_id" name="scholar_id"  type="hidden" value="<?php echo $singlestudent->scholar_id; ?>"> 
<div class="row">
          <div class="col-lg-12">
              <h3>Edit Scholar Information</h3>
            </div>
        </div>
                  
                          <input  id="scholar_id" name="scholar_id"  type="hidden" value="<?php echo $singlestudent->scholar_id; ?>"> 
                
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="firstname" name="firstname"   type="text" value="<?php echo $singlestudent->firstname; ?>" required>
                        </div>    
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Middle Name:</label> 
                          <input class="form-control input-sm" id="middlename" name="middlename" type="text" value="<?php echo $singlestudent->middlename; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                          <input class="form-control input-sm" id="lastname" name="lastname"   type="text" value="<?php echo $singlestudent->lastname; ?>" required>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Suffix:</label> 
                          <input class="form-control input-sm" id="suffix" name="suffix"   type="text" value="<?php echo $singlestudent->suffix; ?>" >
                        </div>
                      </div>
                    </div>





                    <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                      <label class="bmd-label-floating">Age:</label> 
                          <input class="form-control input-sm" id="age" name="age" type="number" value="<?php echo $singlestudent->age; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Birthdate:</label> 
                          <input class="form-control input-sm" id="birthdate" name="birthdate"   type="date" value="<?php echo $singlestudent->birthdate; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group">
                      <label class="bmd-label-floating">Address:</label> 
                          <input class="form-control input-sm" id="address" name="address"  type="text" value="<?php echo $singlestudent->address; ?>" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Email: </label> 
                          <input class="form-control input-sm" id="email" name="email"   type="email" value="<?php echo $singlestudent->email; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">phone number:</label> 
                          <input class="form-control input-sm" id="phone_num" name="phone_num"    value="<?php echo $singlestudent->phone_num; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Citizenship: </label> 
                            <input class="form-control input-sm" id="citizenship" name="citizenship"   type="text" value="<?php echo $singlestudent->citizenship; ?>" required>
                          </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Religion: </label> 
                          <input class="form-control input-sm" id="religion" name="religion"   type="text" value="<?php echo $singlestudent->religion; ?>" required>
                        </div>
                      </div>

              <div class="col-lg-12">
              <h3> Name of OWWA Member</h3>
            </div>
                    <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="OFW_firstname" name="OFW_firstname"   type="text"  value="<?php echo $singlestudent->OFW_firstname; ?>" required>
                        </div>    
                      </div>
      
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Middle Name:</label> 
                          <input class="form-control input-sm" id="OFW_middlename" name="OFW_middlename" type="text" value="<?php echo $singlestudent->OFW_middlename; ?>" >
                        </div>
                      </div>       

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                          <input class="form-control input-sm" id="OFW_lastname" name="OFW_lastname"   type="text"  value="<?php echo $singlestudent->OFW_lastname; ?>"  required>
                        </div>
                      </div>
                  
                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Suffix:</label> 
                          <input class="form-control input-sm" id="OFW_suffix" name="OFW_suffix" value="<?php echo $singlestudent->OFW_suffix; ?>"   >
                        </div>
                      </div>
                    </div>

                    <div class="row"> 
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Relationship to OFW Member</label> 
                          <input class="form-control input-sm" id="OFW_relationship" name="OFW_relationship" value="<?php echo $singlestudent->OFW_relationship; ?>"  type="text" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email:</label> 
                            <input class="form-control input-sm" id="OFW_email" name="OFW_email"  value="<?php echo $singlestudent->OFW_email; ?>" type="email" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                          <select class="form-control input-sm" name="category" id="category"required>
                                      <option value="" disabled selected>Select category</option>
                                          <option value="Land based" <?php echo($singlestudent->category=="Land based") ? 'selected' : '' ?>>Land based</option>
                                          <option value="Sea based" <?php echo($singlestudent->category=="Sea based") ? 'selected' : '' ?>>Sea based</option>
                                  </select>    
                        </div>
                      </div>
                      </div>

        <!-- buttons -->
        
        <div class="row">
        <div class = "text-right">
              <div class="col-md-6"> 
                  <button class="btn btn-success btn-floating" name="save" type="submit" >Save</button>  
                </div>
              </div>
              <div class = "text-right">
                <div class="col-md-6">  
                  <button class="btn btn-danger btn-floating" name = "cancel" value="Cancel" onclick="history.back()" >Cancel</button> 
                </div>
              </div>
        </div> 
                            
  
  <!--/.fluid-container-->
  
  </form>