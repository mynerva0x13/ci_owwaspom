
    <style>
        .row {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
			width: 100%;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .back-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
<div class="bodyCard">
<div class="card">
    <?php
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        $file_id = $_GET['id'];
        $mydb = $this->db->query("SELECT * FROM `upload_documents` INNER JOIN scholar_info ON scholar_id = report_sender WHERE document_id = {$file_id}")->result()[0];

        if ($mydb) {
            $program = ($mydb->program);
            $lastname = ($mydb->lastname);
            $firstname = ($mydb->firstname);
            $middlename = ($mydb->middlename);

            $file_path = "scholars_document/{$program}/{$lastname}_{$firstname}_{$middlename}/$mydb->document_name";
            $fl = base_url($file_path);
            echo "<img src='$fl' />";
            echo "<p>Filename: $mydb->document_name</p>";
            echo "<p>Document Type: $mydb->document_description</p>";
            echo "<p>Date submitted: $mydb->date_submitted</p>";
			
	echo '<a class="btn btn-primary" href="'.base_url("SubScholar/documents/documentsScholar/downloadfile?link=$link2&direct=notif&id=$mydb->document_id").'">Download</a>';
        }
    }
    ?>

    <button class="back-btn" onclick="goBack()">Back</button>
	
</div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
