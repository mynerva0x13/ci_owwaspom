<?php
// if (!isset($_SESSION['USERID'])) {
//     redirect(web_root . "admin/index.php");
// }

// $id = $_SESSION['USERID'];

// $user = new User();
// $res = $user->single_user($id);

// $student = new Student();
// $singlestudent = $student->single_students();
// $singlestudent = $student->user_id();
?>

<style>
    .hidden {
        display: none;
    }
    .dark-label {
        color: #333; /* Replace #333 with your desired darker color */
    }
</style>

<div class="w-100">
    <div class="card-body pt-0">
        <h3>Unread Notifications</h3>
         <table class="table">
            <thead>
                <tr>
                    <th>  <div class="form-group">
                    <label class="bmd-label-floating">Body</label>
                </div></th>
                <th>  
                <div class="form-group">
                    <label class="bmd-label-floating">Created</label>
                </div>
            </th>    
              <th>  
                <div class="form-group">
                    <label class="bmd-label-floating">Actions</label>
                </div></th>

</tr>
<tbody>
        <?php


    //         $mydb->setQuery("SELECT * FROM `scholar_info` WHERE user_id = $id  ");
    //   $student = $mydb->loadResultList();
      foreach ($student as $students) {
        $ids = $students->scholar_id;
 


    //   $mydb->setQuery("SELECT * FROM `notification` WHERE (notification_for = 'Scholar' OR notification_for = $ids) AND notification_status = 'unread'");
    //   $notifications = $mydb->loadResultList();
      

    //     foreach ($notifications as $notification) {
    //         $type = $notification->notification_type;

    //         $student = new Student();
    //         $scholarid = $student->single_students($id);
    //         $scholar_id = $scholarid ? $scholarid->scholar_id : null;

    //         if ($type == "comment") {
    //             $comment = new Comment();
    //             $res = $comment->single_comments($id);
    //             $commentid = $res ? $res->announcement_id : null;

    //             $announcement_id = null;
    //             $announcement = new Announcement();
    //             $a = $announcement->single_announcement($commentid);
    //             $announcement_id = $a ? $a->id_announcement : null;

    //             $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $id";
    //             $mydb->setQuery($sql);
    //             $link = web_root . "scholar/modules/announcement/index.php?view=add&id=" . $announcement_id;
    //         } elseif ($type == "reply") {    
    //             $reply = new Reply ();
    //             $res = $reply->single_replies($id);
    //             $id = $res ? $res->commentid : null;

    //             $comment = new Comment();
    //             $res = $comment->single_comments($id);
    //             $commentid = $res ? $res->announcement_id : null;

    //             $announcement_id = null;
    //             $announcement = new Announcement();
    //             $a = $announcement->single_announcement($commentid);
    //             $announcement_id = $a ? $a->id_announcement : null;

    //             $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $id";
    //             $mydb->setQuery($sql);
                
    //             $link = web_root . "scholar/modules/announcement/index.php?view=view&id=" . $announcement_id;
    //         } elseif ($type == "request") {    
    //             $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $id";
    //             $mydb->setQuery($sql);  
    //             $link = web_root . "scholar/modules/studentprofile/index.php?view=view&id=" . $scholar_id;
    //         } elseif ($type == "announcement") {
    //             $link = web_root . "scholar/modules/announcement/index.php";
    //         }
    foreach ($mynotif as $notification) {
        // print_r($notification);
        // $id = $notification->catch_id;
            ?>
                <tr>
                    <td>
                    <div class="form-group">
                                <label class="bmd-label-floating dark-label"><?php echo $notification->notification_message?></label>
                            </div>
    </td>
    <td>
    <div class="form-group">
                                <label class="bmd-label-floating dark-label"><?php echo $this->Dates->toDateFormat($notification->notification_date) ?></label>
                            </div>

    </td>
    <td>
    <div class="form-group"> 
                            <a href="../SubScholar/notification/notificationStatus/doUpdate?id=<?php echo $notification->notification_id ?>" class="userinfo btn btn-info" >
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                          </a>                                                              
                            </div>
    </td>
    </tr>
       
                <?php
        }
    }
        ?>
        </tbody>
</table>

    </div>
</div>

    <h3>Notification List</h3>
    <div class="w-100">
        <table id="example" class="table table-striped" style="font-size: 12px" cellspacing="0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Body</th>
                    <th>Status</th>
                    <th>Creator</th>
                    <th>Created</th>
                    <th width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                foreach ($res as $result) {
                    echo '<tr>';
                    echo '<td width="5%" align="center"></td>';
                    echo '<td class="tds">' . $result->notification_message . '' . '<span class="hidden">' . $result->notification_type . '</span>' . '</td>';
                    echo '<td class="tds">' . $result->notification_status . '</td>';
                    echo '<td>' . $result->notif_creator . '</td>';
                    echo '<td>' . $this->Dates->toDateFormat($result->notification_date) . '</td>';
                   
                    echo '<td align="center">
                        <a href="../SubScholar/notification/notificationStatus/doUpdate?id="' . $notification->notification_id .'" class="userinfo btn btn-info" >
                        <i class="fa fa-save fw-fa" aria-hidden="true"></i> View Info
                      </a>  
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
