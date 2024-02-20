
  
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
          width: 30%;
        }
  </style>
  
          
  <form class="form-horizontal span6" action="<?php echo base_url("SubAdmin/scholar/scholar1/editCourse?id=$id&link=$link2")?>" method="POST" >
    
          
            <div class="row">
          <div class="col-lg-12">
              <h3>Edit Educational Information</h3>
            </div>
        </div>
                  
                          <input  id="scholar_id" name="scholar_id"  type="hidden" value="<?php echo $singlestudent->scholar_id; ?>"> 
                
                <h4>Primary</h4>
                  <div class="row"> 
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Primary School:</label> 
                          <input class="form-control input-sm" id="primary_school" name="primary_school"   type="text" value="<?php echo $singlestudent->primary_school; ?>" required>
                        </div>    
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Year started :</label> 
                        <select id="primary_year_from" name="primary_year_from">
                              <?php
                                  $currentYear = date("Y");
                                  for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                  echo "<option value=\"$i\">$i</option>";
                                  }
                                  ?>
                          </select>
                          </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Year ended</label> 
                      <select id="primary_year_to" name="primary_year_to">
                              <?php
                                  $currentYear = date("Y");
                                  for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                  echo "<option value=\"$i\">$i</option>";
                                  }
                                  ?>
                          </select>
                          </div>
                      </div>
                      
                    </div>
                    <h4>Secondary</h4>
                  <div class="row"> 
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Secondary School:</label> 
                          <input class="form-control input-sm" id="secondary_school" name="secondary_school"   type="text" value="<?php echo $singlestudent->secondary_school ; ?>" required>
                        </div>    
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Year started :</label> 
                        <select id="secondary_year_from" name="secondary_year_from">
                              <?php
                                  $currentYear = date("Y");
                                  for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                  echo "<option value=\"$i\">$i</option>";
                                  }
                                  ?>
                          </select>
                          </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Year ended</label> 
                      <select id="secondary_year_to" name="secondary_year_to">
                              <?php
                                  $currentYear = date("Y");
                                  for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                  echo "<option value=\"$i\">$i</option>";
                                  }
                                  ?>
                          </select>
                          </div>
                      </div>
                      
                    </div>

                    <h4>Tertiary </h4>
                  <div class="row"> 
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Teriary School:</label> 
                          <input class="form-control input-sm" id="tertiary_school" name="tertiary_school"   type="text" value="<?php echo $singlestudent->school ; ?>" required>
                        
                          </div>    
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Year started :</label> 
                        <select id="tertiary_year_from" name="tertiary_year_from">
                              <?php
                                  $currentYear = date("Y");
                                  for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                  echo "<option value=\"$i\">$i</option>";
                                  }
                                  ?>
                          </select>     
                      </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Year ended</label> 
                          <select id="tertiary_year_to" name="tertiary_year_to">
                              <?php
                                  $currentYear = date("Y");
                                  for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                  echo "<option value=\"$i\">$i</option>";
                                  }
                                  ?>
                          </select>
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