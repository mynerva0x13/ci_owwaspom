
<form class="form-horizontal span6" action="controller.php?action=add" method="POST">

<div class="row">
<div class="col-lg-12">
  <h3 >Add New Event Schedule</h3>
</div>
</div> 

		<div class="row">
		<div class="col-md-11">
		  <div class="form-group">
		  <label class="bmd-label-floating">Event:</label> 
			  <input name="deptid" type="hidden" value="">
			  <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
			</div>
		  </div>
		</div>

		<div class="row">
			<div class = "col-md-4">
				<label class="">Date start:</label>
			</div>
    		<div class="col-md-7">
        		<div class="form-group">
            		<input name="deptid" type="hidden" value="">
            		<input type="datetime-local" class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC">
        		</div>
    		</div>
		</div>
		

		<div class="row">
			<div class = "col-md-4">
				<label class="">Date End:</label>
			</div>
    		<div class="col-md-7">
        		<div class="form-group">
            		<input name="deptid" type="hidden" value="">
            		<input type="datetime-local" class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC">
        		</div>
    		</div>
		</div>

		<div class="row">
		<div class="col-md-11">
		  <div class="form-group">
		  <label class="bmd-label-floating">Description of the Event:</label> 
			  <input name="deptid" type="hidden" value="">
			  <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
			</div>
		  </div>
		</div>

  <div class="row">
		  <div class="col-md-8"> 
			<button class="btn btn-info btn-round" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>  
			</div>
		  </div> 

</form>

<script>

