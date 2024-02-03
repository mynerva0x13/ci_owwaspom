

  
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
  select {

    font-family: arial, sans-serif;
          outline: 0;
          padding: 5px;
          margin-left: 10px;
          margin-right: 10px;
          border-radius: 5px;
          width: 50%;
        }
  </style>
  
          
        <form class="form-horizontal span6" action="<?php echo base_url("SubAdmin/scholar/scholar1/doEditfam?id=$id")?>" method="POST" >
    
          
            <div class="row">
          <div class="col-lg-12">
              <h3>Edit Scholar Family Information</h3>
            </div>
        </div>
                  
                          <input  id="scholar_id" name="scholar_id"  type="hidden" value="<?php echo $singlestudent->scholar_id; ?>"> 
                
                <h4>Fathers Information</h4>
                  <div class="row"> 
                    <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="father_fname" name="father_fname"   type="text" value="<?php echo $singlestudent->father_fname; ?>" required>
                        </div>    
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Middle Name:</label> 
                          <input class="form-control input-sm" id="father_mname" name="father_mname" type="text" value="<?php echo $singlestudent->father_mname; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                          <input class="form-control input-sm" id="father_lname" name="father_lname"   type="text" value="<?php echo $singlestudent->father_lname; ?>" required>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Suffix:</label> 
                          <input class="form-control input-sm" id="father_suffix" name="father_suffix"   type="text" value="<?php echo $singlestudent->father_suffix; ?>" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                      <label class="bmd-label-floating">Status : </label> 
                          <select  name="fatherstatus" id="fatherstatus" value="<?php echo $singlestudent->fatherstatus; ?>">
                                          <option value="Living">Living</option>
                                          <option value="Deceased">Deceased</option>
                                  </select>    
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Occupation:</label> 
                          <input class="form-control input-sm" id="father_occupation" name="father_occupation"   type="text" value="<?php echo $singlestudent->father_occupation; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Educational Attainment:</label> 
                          <input class="form-control input-sm" id="Father_Educ" name="Father_Educ"  type="text" value="<?php echo $singlestudent->Father_Educ; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Contact Number:</label> 
                          <input class="form-control input-sm" id="father_contactnum" name="father_contactnum"  type="text" value="<?php echo $singlestudent->father_contactnum; ?>" required>
                        </div>
                      </div>
                    </div>

                      <h4>Mothers Information</h4>
                  <div class="row"> 
                    <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="mother_fname" name="mother_fname"   type="text" value="<?php echo $singlestudent->mother_fname; ?>" required>
                        </div>    
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Middle Name:</label> 
                          <input class="form-control input-sm" id="mother_mname" name="mother_mname" type="text" value="<?php echo $singlestudent->mother_mname; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                          <input class="form-control input-sm" id="mother_lname" name="mother_lname"   type="text" value="<?php echo $singlestudent->mother_lname; ?>" required>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Suffix:</label> 
                          <input class="form-control input-sm" id="mother_suffix" name="mother_suffix"   type="text" value="<?php echo $singlestudent->mother_suffix; ?>" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                      <label class="bmd-label-floating">Status : </label> 
                          <select  name="motherstatus" id="motherstatus" value="<?php echo $singlestudent->motherstatus; ?>">
                                          <option value="Living">Living</option>
                                          <option value="Deceased">Deceased</option>
                                  </select>     
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Occupation:</label> 
                          <input class="form-control input-sm" id="mother_occupation" name="mother_occupation"   type="text" value="<?php echo $singlestudent->mother_occupation; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Educational Attainment:</label> 
                          <input class="form-control input-sm" id="mother_Educ" name="mother_Educ"  type="text" value="<?php echo $singlestudent->mother_Educ; ?>" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Contact Number:</label> 
                          <input class="form-control input-sm" id="mother_contactnum" name="mother_contactnum"  type="text" value="<?php echo $singlestudent->mother_contactnum; ?>" required>
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