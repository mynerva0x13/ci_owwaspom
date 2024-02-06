

  
  <style type="text/css">
  .sidebar-left .main{
    float:right;
  }
  .sidebar-left .sidebar{
    float:left;
  }

  .sidebar-right .main{
    float:left;
  }
  .sidebar-right .sidebar{
    float:right;
  }
  
  </style>
  
          
        <form class="form-horizontal span6" action="<?php echo base_url("SubAdmin/scholar/scholar1/doEditme?id=$id&link=$link2")?>" method="POST" >
    
          
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

                    </div>
  
                
                      <div class="row">
                      <div class="col-md-2"> 
                          <button class="btn btn-success btn-floating" name="save" type="submit" >Save</button>  
                        </div>
                        <div class="col-md-2"> 
                      
                          <a class="btn btn-danger btn-floating" name = "cancel" value="Cancel" href="<?php echo base_url("Staff/scholar?view=view&id=$id")?>">Cancel</a>  
                        </div>
                      </div> 
  
  <!--/.fluid-container-->
  
  </form>