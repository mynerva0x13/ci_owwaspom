<?php
   if($_GET['view']=="edit") {
      $url = "SubStaff/User/userAdd/doInsert";
   }
   else {

      $url = "SubStaff/User/userAdd/doInsert";
   }
   ?>
   <form class="form-horizontal span6" action="<?php echo base_url("$url") ?>" method="POST" onsubmit="return validatedpass()">
            <div class="row">
            <div class="col-lg-12">
               <h3 >Add New User</h3>
            </div>

         </div> 
         
                     
                     <div class="row">
                     <div class="col-md-11">
                     <div class="form-group">
                        <label class="bmd-label-floating">Name:</label> 
                           <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="user_name" name="user_name"   type="text" value="<?php echo (!empty($content) ? $content->NAME : "") ?>">
                        </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-md-11">
                     <div class="form-group">
                        <label class="bmd-label-floating">Username:</label> 
                           <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="user_email" name="user_email" type="text" value="<?php echo (!empty($content) ? $content->username : "") ?>">
                        </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-md-11">
                     <div class="form-group">
                        <label class="bmd-label-floating">User Password:</label> 
                           <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="user_pass" name="user_pass"  type="Password" value="">
                        </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-md-11">
                     <div class="form-group">
                        <label class="bmd-label-floating">Re-type Password:</label> 
                           <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="retype_user_pass" name="retype_user_pass"  type="Password" value="">
                        </div>
                     </div>
                     </div> 
               
               <div class="row">
                     <div class="col-md-8"> 
                        <button class="btn btn-info btn-round"  id="usersave" name="save" type="submit" ><strong>Save</strong></button>  
                        </div>
                     </div> 

            
            
         </form>
         