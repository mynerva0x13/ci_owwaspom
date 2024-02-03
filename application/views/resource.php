<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

  <link rel="icon" type="image/png" href="<?php echo base_url("/assets/images/owwa.png") ?>">
	<title>OWWASPOMS (<?php echo $title ?>)</title>
	<link href='<?php echo base_url('/assets/css/bootstrap/bootstrap.min.css'); ?>' rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url('/assets/css/font-awesome/font-awesome.min.css')?>"/>
	<?php echo (!empty($style)) ? $style : ''; ?>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="<?php echo base_url('/assets/scholarMenu/assets/css/material-dashboard.css?v=2.1.1') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('/assets/scholarMenu/assets/demo/demo.css')?>" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css" integrity="sha512-Bhi4560umtRBUEJCTIJoNDS6ssVIls7oiYyT3PbhxZV+9uBbLVO/mWo56hrBNNbIfMXKvtIPJi/Jg+vpBpA7sg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url("/assets/js/summernote/summernote-bs4.css") ?>">
</head>

<body>
  
	<?php echo (!empty($body)) ? $body : ''; ?>
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="<?php echo base_url("/assets/adminMenu/assets/js/core/jquery.min.js")?>"></script>
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/core/popper.min.js")?>"></script>
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/core/bootstrap-material-design.min.js")?>"></script>
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/perfect-scrollbar.jquery.min.js")?>"></script>
    <!-- Plugin for the momentJs  -->
    <script src="https://cdn.jsdelivr.net/npm/wysihtml5@0.5.0/dist/wysihtml5-0.5.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.js" integrity="sha512-XiYIoVJlhi4eG/3R6pdLS2aBa1NiWEQdEQVMT6WpkKbmHN+NTUWbz4nZBtcmIeeoq08iC8PtPw8WxYRzHVGWYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/moment.min.js")?>"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/sweetalert2.js")?>"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/jquery.validate.min.js")?>"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/jquery.bootstrap-wizard.js")?>"></script>
    <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/bootstrap-selectpicker.js")?>"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/bootstrap-datetimepicker.min.js")?>"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/jquery.dataTables.min.js")?>"></script>
    <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/bootstrap-tagsinput.js")?>"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/jasny-bootstrap.min.js")?>"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/fullcalendar.min.js")?>"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/jquery-jvectormap.js")?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/nouislider.min.js")?>"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/arrive.min.js")?>"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/chartist.min.js")?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/plugins/bootstrap-notify.js")?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/js/material-dashboard.js?v=2.1.1")?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url("/assets/adminMenu/assets/demo/demo.js")?>"></script>


  
  <script type="text/javascript" language="javascript" src="<?php echo base_url("/input-mask/jquery.inputmask.js")?>"></script> 
  <script type="text/javascript" language="javascript" src="<?php echo base_url("/input-mask/jquery.inputmask.date.extensions.js")?>"></script> 
  <script type="text/javascript" language="javascript" src="<?php echo base_url("/input-mask/jquery.inputmask.extensions.js")?>"></script> 


<script src="<?php echo base_url("/assets/js/summernote/summernote-bs4.js")?>"></script>

	<?php echo (!empty($script)) ? $script : ''; ?>
  
  <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
      var t = $('#example').DataTable( {
          "bSort": false,
          "columnDefs": [ {
              "searchable": false,
              "orderable": false,
              "targets": 0
          } ],
  

            //vertical scroll
          // "scrollY":        "300px",

          // "scrollCollapse": true,

          //ordering start at column 1
          "order": [[ 1, 'desc' ]]
      } );

      t.on( 'order.dt search.dt', function () {
          t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();
  } );

  </script>


  <script>

  $(function(){
    $(".tds").each(function(i){
      len=$(this).text().length;
      if(len>80)
      {
        $(this).text($(this).text().substr(0,80)+'...');
      }
    });
  });
    // $(function () {
    //   //Add text editor 
    //   $("#ANNOUNCEMENT_WHAT").wysihtml5();
    //   $("#EVENT_WHAT").wysihtml5();
    //   $("#compose-textarea").wysihtml5();
    // });
  </script>
  <script type="text/javascript">
      $(function () {
          $('#datetimepicker2').datetimepicker({ 
              locale: 'en',
              todayBtn:1,
              autoclose: 1,
              todayHighlight: 1, 
              forceParse: 0
          });
      });
  </script>

  <script type="text/javascript">
  $('.TRANSDATE').keypress(function(e){
      // mask: "2/1/y h:s",
      // placeholder: "mm/dd/yyyy hh:mm",
      // alias: "dd/mm/yyyy",
    // mask: "2/1/y h:s ",
    // placeholder: "mm/dd/yyyy hh:mm",
    // alias: "date_time",
    // hourFormat: "24"
    // mask: "h:s",
    // placeholder: "hh:mm",
    // alias: "datetime",
    // hourFormat: "24"
    e.preventDefault();
  });


  $("#retype_user_pass").focusout(function(){

          var pass = $("#user_pass").val();
          var repass = $(this).val();
          if (pass != repass) {
              alert("Password does not match");
          };
  });

  function validatedpass(){

      var pass = $("#user_pass").val();
          var repass = $("#retype_user_pass").val();
          if (pass != repass) {
              alert("Password does not match");
              return false
          }else{
              return true
          };
  }

  $('#date_pickerfrom').datetimepicker({
    format: 'yyyy',
      language:  'en',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
      });


  $('#date_pickerto').datetimepicker({
    format: 'yyyy',
      language:  'en',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
      });



  </script>


  <script>
    function checkall(selector)
    {
      if(document.getElementById('chkall').checked==true)
      {
        var chkelement=document.getElementsByName(selector);
        for(var i=0;i<chkelement.length;i++)
        {
          chkelement.item(i).checked=true;
        }
      }
      else
      {
        var chkelement=document.getElementsByName(selector);
        for(var i=0;i<chkelement.length;i++)
        {
          chkelement.item(i).checked=false;
        }
      }
    }
    function checkNumber(textBox){
          while (textBox.value.length > 0 && isNaN(textBox.value)) {
            textBox.value = textBox.value.substring(0, textBox.value.length - 1)
          }
          textBox.value = trim(textBox.value);
        }
        //
        function checkText(textBox)
        {
          var alphaExp = /^[a-zA-Z]+$/;
          while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
            textBox.value = textBox.value.substring(0, textBox.value.length - 1)
          }
          textBox.value = trim(textBox.value);
        }

    </script>

</body>

</html>
