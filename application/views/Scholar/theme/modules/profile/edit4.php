

<?php

if(!empty($_GET['link'])) {
  $url='SubScholar/profile/acceptEdit/doEditscholarapp'.((!empty($_GET['link'])) ? "?link=".$_GET['link']."&id=$singlestudent->request_info_id" : "");
}
else {
  $url='SubScholar/profile/editUser/doEditscholarapp';
}
?>

<style type="text/css">
  .sidebar-left .main {
    float: right;
  }

  .sidebar-left .sidebar {
    float: left;
  }

  .sidebar-right .main {
    float: left;
  }

  .sidebar-right .sidebar {
    float: right;
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
doEditscholarapp

<form class="form-horizontal span6" action="<?php echo base_url($url) ?>" method="POST">
  
  <div class="row">
    <div class="col-lg-12">
      <h3>Request Edit Scholar Application Information</h3>
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <input id="scholar_id" name="scholar_id" type="hidden" value="<?php echo $singlestudent->scholar_id; ?>">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="bmd-label-floating">Name of School </label>
        <input class="form-control input-sm" id="school" name="school" type="text"
          value="<?php echo $singlestudent->school; ?>" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="bmd-label-floating">Course : </label>
        <input class="form-control input-sm" id="Course" name="Course" type="text"
          value="<?php echo $singlestudent->Course; ?>" required>

      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label class="bmd-label-floating">Year Level:</label>
        <select name="year_level" id="year_level" value="<?php echo $singlestudent->year_level; ?>">
          <option value="1st year">1st year</option>
          <option value="2nd year">2nd year</option>
          <option value="3rd year">3rd year</option>
          <option value="4th year">4th year</option>
          <option value="5th year">5th year</option>
        </select>
      </div>
    </div>


  </div>
  <div class="row">
    <div class="col-md-2">
      <button class="btn btn-success btn-floating" name="save" type="submit">Save</button>
    </div>
    <div class="col-md-2">
      <button class="btn btn-danger btn-floating" name="cancel" value="Cancel" onclick="history.back()">Cancel</button>
    </div>
  </div>

  <!--/.fluid-container-->

</form>