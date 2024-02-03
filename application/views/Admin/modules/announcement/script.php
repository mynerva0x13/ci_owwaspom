<?php
$url =  null;
$val = null;
$desc = null;
if(!empty($_GET['view']) && $_GET['view']=="update") {
    $url = "SubAdmin/annoucement/AnnounceScholar/doEdit?id=".$con->id;
    $desc = $con->desc;
}
else {
    $url = "SubAdmin/annoucement/AnnounceScholar/doInsert";
}
?>

<script>    
$(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert', ['picture', 'link', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ],
        // Enable image upload
        disableDragAndDrop: false,
        imageAttributes: {
          icon: '<i class="note-icon-pencil"/>',
          removeEmpty: true, // Removes empty attributes on removing image
          disableUpload: false, // Disables the upload functionality
        },
        callbacks: {
          onImageUpload: function(files) {
            // Implement your image upload logic here
            // Example using FormData and AJAX
            var formData = new FormData();
            formData.append('file', files[0]);

            $.ajax({
              url: '<?php echo base_url('UploadController/do_upload') ?>', // Replace with your server-side upload endpoint
              method: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                // Handle the response and insert the image into the editor
                response = JSON.parse(response)
                console.log(response)
                console.log("<?php echo base_url("")?>assets/images/uploads/"+response.url)
                $('#summernote').summernote('insertImage', "<?php echo base_url("")?>assets/images/uploads/"+response.url);
              },
              error: function(error) {
                console.error('Image upload failed:', error);
              }
            });
          }
        }
      });

      $('#postDataForm_ann').on('submit', function(e) {
        e.preventDefault();
        // Get the HTML content from the Summernote editor
        var postContent = $('.summernote').summernote('code');

        // You can also get other data if needed, e.g., title, category, etc.

        // Send the data to your server using AJAX
        var formData = new FormData();
            formData.append('content', postContent);

        $.ajax({
            url: '<?php echo base_url($url) ?>', // Replace with your server-side endpoint
            method: 'POST',
            data: formData,
              processData: false,
              contentType: false,
            success: function(response) {
                // Handle the response from the server
                location.href = "<?php echo base_url($link."/announcement?link=".$link) ?>";

                // You may want to redirect or show a success message here
            },
            error: function(error) {
                console.error('Post failed:', error);
            }
        });
    });
    });
</script>