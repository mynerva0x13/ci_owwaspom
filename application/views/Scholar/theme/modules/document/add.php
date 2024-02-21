<?php 
if ($_GET['view'] == "add") {
    $url = "../SubScholar/documents/documentsScholar/doInsert";
} else {
    $url = "../SubScholar/documents/documentsScholar/doEdit";
}
?>
  <title>Add New Documents</title>
  <style>
    /* Add any additional styles as needed */
    .custom-file-upload {
      display: inline-block;
      margin-top: 10px;
    }

    #fileToUpload {
      display: none;
    }

    label[for="fileToUpload"] {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3>Add New Documents</h3>
    </div>
  </div>

  <form class="form-horizontal span6" action="<?php echo $url ?>" method="POST" enctype="multipart/form-data">
<input type='hidden' name="doc_id" value="<?php echo (!empty($cur[0]->document_id) ? $cur[0]->document_id : "")?>"/>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php
          foreach ($cur2 as $result) {
              ?>
              <input type="hidden" id="scholar_id" name="scholar_id" value="<?php echo $result->scholar_id; ?>">
              <input type="hidden" id="firstname" name="firstname" value="<?php echo $result->firstname; ?>">
              <input type="hidden" id="middlename" name="middlename" value="<?php echo $result->middlename; ?>">
              <input type="hidden" id="lastname" name="lastname" value="<?php echo $result->lastname; ?>">
              <input type="hidden" id="program" name="program" value="<?php echo $result->program; ?>">

              <input type="hidden" id="" name="imageName" value="<?php echo (!empty($cur[0]->document_name) ? $cur[0]->document_name : "")?>">
              <?php } ?>
              <label class="bmd-label-floating">Choose File:</label>
              <div class="custom-file-upload">
                  <input type="file" id="fileToUpload" name="fileToUpload" onchange="displaySelectedFile(this)" accept=".pdf,.doc,.docx,image/*">
                  <label for="fileToUpload" id="fileToUpload_nmae"><?= (!empty($cur[0]->document_name) ? $cur[0]->document_name : "No file chosen") ?></label>

              </div>
            
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Document Category</label>
          <select class="form-control" name="description" id="description">
            <option value="Certificate of Grades" <?= (!empty($cur[0]->document_description) && $cur[0]->document_description == 'Certificate of Grades') ? 'selected' : '' ?>>Certificate of Grades</option>
            <option value="Semestrial Report" <?= (!empty($cur[0]->document_description) && $cur[0]->document_description == 'Semestrial Report') ? 'selected' : '' ?>>Semestrial Report</option>
            <option value="Transcript Record" <?= (!empty($cur[0]->document_description) && $cur[0]->document_description == 'Transcript Record') ? 'selected' : '' ?>>Transcript Record</option>
            <option value="Certificate of Enrollment" <?= (!empty($cur[0]->document_description) && $cur[0]->document_description == 'Certificate of Enrollment') ? 'selected' : '' ?>>Certificate of Enrollment</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Year Level</label>
          <select class="form-control" name="yearlevel" id="yearlevel">
            <option value="1st year" <?= (!empty($cur[0]->year_level) && $cur[0]->year_level == '1st year') ? 'selected' : '' ?>>1st year</option>
            <option value="2nd year" <?= (!empty($cur[0]->year_level) && $cur[0]->year_level == '2nd year') ? 'selected' : '' ?>>2nd year</option>
            <option value="3rd year" <?= (!empty($cur[0]->year_level) && $cur[0]->year_level == '3rd year') ? 'selected' : '' ?>>3rd year</option>
            <option value="4th year" <?= (!empty($cur[0]->year_level) && $cur[0]->year_level == '4th year') ? 'selected' : '' ?>>4th year</option>
            <option value="5th year" <?= (!empty($cur[0]->year_level) && $cur[0]->year_level == '5th year') ? 'selected' : '' ?>>5th year</option>
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label class="bmd-label-floating">Semester</label>
          <select class="form-control" name="semester" id="semester">
            <option value="1st Semester" <?= (!empty($cur[0]->semester) && $cur[0]->semester == '1st Semester') ? 'selected' : '' ?>>1st Semester</option>
            <option value="2nd Semester" <?= (!empty($cur[0]->semester) && $cur[0]->semester == '2nd Semester') ? 'selected' : '' ?>>2nd Semester</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-info btn-round" id="save" name="save" type="submit"><strong>Save</strong></button>
      </div>
    </div>
  </form>
</div>
<script>
  function displaySelectedFile(input) {
    var file = input.files[0];
    var fileLabel = document.getElementById('fileToUpload_nmae');

    if (file) {
      fileLabel.textContent = file.name;

      console.log(file.name);
    } else {
      fileLabel.textContent = 'No file chosen';

      console.log(0);
    }
  }
</script>
