<?php
session_start();

function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz0123456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 

$code = createRandomPassword();

?>


<div class="d-flex justify-content-center align-self-center" style="margin-top: 115px;">
    <form action="addGroupe.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="formgroup container-fluid">
            <label for="nom">nom du groupe</label>
            <input type="text" name="nom"/>
        </div>
        <div class="formgroup container-fluid">
        <label for="code">code du groupe</label>
            <input type="text" name="code" value="<?php echo $code; ?>" disabled>

        </div>
        <div class="formgroup container-fluid">
            <label for="submitCreer">Submit </label><br />
            <input type="submit" name="submitCreer"/>
        </div>
    </form>
</div>


<?php

include 'db.php';

$conn = OpenCon();

if($_POST){
    $id = $_SESSION["id"];
    $nom = $_POST["nom"];

    $insert_sql = "INSERT INTO groupes (idProf, nomGroupe, codeGroupe) VALUES ('$id', '$nom', '$code');";
    $res = $conn->query($insert_sql);

    if($res == 1){
        echo "groupe cree";
    }else{
        echo "erreur";
    }
}

CloseCon($conn);
?>