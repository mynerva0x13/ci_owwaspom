
	
			<?php echo $response ?>
					
		<?php   
		
		// $mydb->setQuery("SELECT * 
				// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
		
                // print_r($output);
		foreach ($output as $result) {

			if ($result->announcement_stat == 'hidden') {
				continue; // Skip this iteration of the loop
			}
			?>
<div class="card p-2 bg-light text-dark">
    <div class="card-body">
		<div id="accordion_<?php echo $result->id_announcement ?>">
        <h3>Announcement &nbsp;<label><?php echo $this->Dates->toDateFormat($result->date_posted) ?></label></h3>
        <div class="form-group"><?php echo $result->announcement_desc ?></div> 
		<form class="form-horizontal span6" action="../SubScholar/announcement/announceScholar/doComment" method="POST">
        <div class="comment-box">
            <div class="form-group">
                <label class="bmd-label-floating">Write a comment...:</label>
                <input name="id_announcement" type="hidden" value="<?php echo $result->id_announcement; ?>">
                <textarea class="form-control border-bottom" id="comment_text" name="comment_text" ></textarea>
                    <div class="form-group">
                        <button class="btn btn-info btn-round" type="submit">Add comment</button>
                        <!-- Uncomment the following line if you want to use a link instead of a button -->
                        <!-- <a class="btn btn-info btn-round" href="<?php echo base_url('Scholar/announcement?view=add&id='.$result->id_announcement.'')?>" style="color: #FFFFFF">Add comment</a> -->
                    </div>
                </div>
            </div>
		</form>
			<a class="text-primary" data-toggle="collapse" data-target="#collapseDetails_<?php echo $result->id_announcement ?>" aria-expanded="false" aria-controls="collapseDetails_<?php echo $result->id_announcement ?>">
                                    <b>Show Comments</b>
		</a>
		<div class="collapse p-2" id="collapseDetails_<?php echo $result->id_announcement ?>" data-parent="#accordion_<?php echo $result->id_announcement ?>" style="max-height: 500px; overflow-y: scroll; background-color: #e8e8e8;">
 <?php   
        $mydb = $this->db->query("SELECT * FROM `comments` ORDER BY comment_id DESC");
        $cur = $mydb->result();

        foreach ($cur as $res) {
          if ($res->comment_status == 'hidden') {
            continue; // Skip this iteration of the loop
          }
          if ($res->announcement_id === $result->id_announcement) {
            $reply = $_SESSION['USERID'];
            $person = $_SESSION['NAME'];
            if ($res->who_commented == $reply) {
              
          
              $mydb = $this->db->query("SELECT * FROM `user_acc` WHERE USERID = $reply ");
              $replay = $mydb->result();
			  
		  echo '<div class="p-3" style="max-height: 250px; overflow-y: scroll; background-color: #bdbdbd;">';
              foreach ($replay as $reply) {
    

          echo '<div class="comment-box1">';
          echo '<h5><span class="commenter">' . $reply->NAME . '</span> <label>' . $this->Dates->toDateFormat($res->comment_created_at) . '</label></h5>';
          echo '<h4>' . $res->comment_text . '</h4>';
              }
          echo '<form class="form-horizontal span6" action="../SubScholar/announcement/announceScholar/doReply" method="POST">';
          echo '<input name="comment_id" type="hidden" value="' . $res->comment_id . '">';
          echo '<input name="id_announcement" type="hidden" value="' . $result->id_announcement . '">';

          $idrep = $res->comment_id;
          $mydb = $this->db->query("SELECT * FROM `replies` WHERE commentid = $idrep ORDER BY reply_id ASC");
          $cur_replies = $mydb->result();
        

          foreach ($cur_replies as $rep) {
            if ($rep->reply_status == 'hidden') {
              continue; // Skip this iteration of the loop
            }
            if ($rep->commentid == $res->comment_id) {
           
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

          echo '</div>';
		  echo '</div>';
          echo '<div class="form-group">';
          echo '<label class="bmd-label-floating">Write a comment...:</label>';
          echo '<textarea class="form-control" id="reply_text" name="reply_text"></textarea>';
          echo '</div>';
          echo '<button class="btn btn-info btn-round" name="save" type="submit">Reply</button>';
          echo '</form><hr/>';
		  
        }
      }
    }
      ?>
		</div>
		</div>
        </div>
    </div>
		<?php } ?>
	