<?php  
  @$id = $_GET['id'];
  if($id == '') {
    redirect("index.php");
  }
?>
<!--Hello worl -->

<!--Hello worl -->
<!--Hello worl -->
<!DOCTYPE html>
<html>

<head>
	<style>
		.comment-box {
			background-color: #f5f5f5;
			/* Light gray background */
			padding: 10px;
			margin-bottom: 15px;
			border-radius: 5px;
		}

		.commenter {
			font-weight: bold;
			color: #007bff;
			/* Blue color for commenter's name */
		}

		.comment-text {
			color: #444;
			/* Dark gray color for comment text */
		}

		.comment-actions span {
			margin-right: 20px;
			cursor: pointer;
			color: #777;
			/* Light gray color for action buttons */
		}

		.comment-actions span:hover {
			color: #007bff;
			/* Blue color on hover for action buttons */
		}

		.comment-like:hover {
			color: #28a745;
			/* Green color for like button on hover */
		}

		.comment-reply:hover {
			color: #dc3545;
			/* Red color for reply button on hover */
		}

	</style>
</head>

<body>
  
<?php echo $res->announcement_desc; ?>
	<h3>Announcement</h3>
	<form class="form-horizontal span6" action="../SubScholar/announcement/announceScholar/doComment<?php echo (!empty($redirect)) ? "?link=$redirect" : '' ?>" method="POST">
		<div class='card-body'>
		</div>

		<div class='card-body'>
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<input name="id_announcement" type="hidden" value="<?php echo $res->id_announcement; ?>">
						<?php echo $_SESSION['USERID'] ?>
						<label class="bmd-label-floating">Write a comment...:</label>
						<textarea class="form-control" id="comment_text" name="comment_text"></textarea>
					</div>
				</div>

				<div class="col-md-2">
					<div class="text-left">
						<button class="btn btn-info btn-round" name="save" type="submit">
							<span class="fa fa-save fw-fa"></span> Save
						</button>
					</div>
				</div>
			</div>
  </div>
	</form>
	<hr> <!-- Add a horizontal rule to separate the comment section from the replies -->

	<?php   
        $mydb = $this->db->query("SELECT * FROM `comments` ORDER BY comment_id DESC");
        $cur = $mydb->result();

        foreach ($cur as $result) {
          if ($result->comment_status == 'hidden') {
            continue; // Skip this iteration of the loop
          }
          if ($result->announcement_id == $res->id_announcement) {
            $reply = $_SESSION['USERID'];
            $person = $_SESSION['NAME'];
            if ($result->who_commented == $reply) {
              
          
              $mydb = $this->db->query("SELECT * FROM `user_acc` WHERE USERID = $reply ");
              $replay = $mydb->result();
              foreach ($replay as $reply) {
    

          echo '<div class="comment-box1">';
          echo '<h5><span class="commenter">' . $reply->NAME . '</span> <label>' . $result->comment_created_at . '</label></h5>';
          echo '<h4>' . $result->comment_text . '</h4>';
              }
          echo '<form class="form-horizontal span6" action="../SubScholar/announcement/announceScholar/doReply" method="POST">';
          echo '<input name="comment_id" type="hidden" value="' . $result->comment_id . '">';
          echo '<input name="id_announcement" type="hidden" value="' . $res->id_announcement . '">';

          $idrep = $result->comment_id;
          $mydb = $this->db->query("SELECT * FROM `replies` WHERE commentid = $idrep ORDER BY reply_id ASC");
          $cur_replies = $mydb->result();
        

          foreach ($cur_replies as $rep) {
            if ($rep->reply_status == 'hidden') {
              continue; // Skip this iteration of the loop
            }
            if ($rep->commentid == $result->comment_id) {
           
              $reply = $rep->who_reply; 
              $mydb = $this->db->query("SELECT * FROM `user_acc` WHERE USERID = $reply ");
              $cur_rep = $mydb->result();
              foreach ($cur_rep as $reps) {
    
              echo ' <div class="comment-box">';
              echo ' <div class="comment-content">';
              echo '  <span class="commenter">' . $reps->NAME . '</span>';
              echo ' <p class="comment-text">Reply: ' . $rep->reply_text . '</p>';
              echo ' </div>  </div>';
          }
            }
          }

          echo '<div class="form-group">';
          echo '<label class="bmd-label-floating">Write a comment...:</label>';
          echo '<textarea class="form-control" id="reply_text" name="reply_text"></textarea>';
          echo '</div>';
          echo '<button class="btn btn-info btn-round" name="save" type="submit">Reply</button>';
          echo '</form>';
          echo '</div>';
        }
      }
    }
      ?>
	</div>
	</form>
</body>

</html>
