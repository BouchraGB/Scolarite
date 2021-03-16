<?php 
session_start();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
    <title>Upload PDF</title>


    </p><h4 class="text-center" style="margin-top: 100px;">Upload A PDF To The Database</h4>
<div class="d-flex justify-content-center align-self-center" style="margin-top: 115px;">
    <form action="uploadDoc.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="formgroup container-fluid">
            <label for="project_name">Project Name</label>
            <input type="text" name="project_name"/>
        </div>
        <div class="formgroup container-fluid">
            <input type="file" name="pdf_file" accept=".pdf"/>
            <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <!--64 MB's worth in bytes-->
        </div>
        <div class="formgroup container-fluid">
            <label for="submit">Submit To Database</label><br />
            <input type="submit" name="submitUpload"/>
        </div>
    </form>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



<?php
include 'db.php';

if(isset($_POST['submitUpload']) && !empty($_FILES['pdf_file']['name'])){
    $conn = OpenCon();

        //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
       if ($_FILES['pdf_file']['error'] != 0) {
           echo 'Something wrong with the file.';
       } else { //pdf file uploaded okay.
           //project_name supplied from the form field
           $project_name = htmlspecialchars($_POST['project_name']);
   
           //attached pdf file information
           $file_name = $_FILES['pdf_file']['name'];
           $file_tmp = $_FILES['pdf_file']['tmp_name'];
           if ($pdf_blob = fopen($file_tmp, "rb")) {
            $content = fread($pdf_blob, filesize($file_tmp));
            $content = addslashes($content);
            $id = $_SESSION["id"];
   
            $insert_sql = "INSERT INTO documents (titreDocument, contDocument) VALUES ( '$project_name', '$content');";

            $db = new PDO('mysql:host=localhost;dbname=mesnotes', 'root', '');

           
                $res = $db->query($insert_sql);
                if($res == 1){
                    $idDoc = $db->lastInsertId("documents");
                    echo "hhhhhhhhhh" . $idDoc;
                    $date = date('d-m-y');
                    $heure = date('h:i');
    
                    $insert_sql2 = "INSERT INTO docprofile (idProf, idDocument, dateDocP, heureDocP) VALUES ( '$id', '$idDoc', '$date', '$heure');";
                    $res2 = $conn->query($insert_sql2);
                    if($res2 == true){
                        echo "New record created successfully";
                    }else {
                    echo "Error: " . $insert_sql2 . "<br>" . $conn->error;
                }
                }   else {
                echo "Error: " . $insert_sql . "<br>" . $db->error;
                }

            // $stmt = $pdo->prepare($insert_sql);
            // $stmt->bindParam(':project_name', $project_name);
            // $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);



           } else {
               //fopen() was not successful in opening the .pdf file for reading.
               echo 'Could not open the attached pdf file';
           }
       }
   }

?>
