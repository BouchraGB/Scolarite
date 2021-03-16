<?php
session_start();
include 'db.php';

$conn = openCon();

$id = $_POST["idDoc"];
$date = $_POST["dateDoc"];

$sql = "SELECT idDocument, titreDocument, contDocument from documents where idDocument = '$id' ";

$result = $conn -> query($sql);

$row = $result -> fetch_assoc();

$idDoc = $row["idDocument"];
$file = $row["titreDocument"];
$content = $row["contDocument"];


?>


<form action = "functions.php" method = "POST">
<object data="data:application/pdf;base64,<?php echo base64_encode($content) ?>" type="application/pdf" style="height:200px;width:60%" ></object>

<p><?php echo "Publie par " . $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></p>
<p><?php echo $file; ?></p>
<p><?php echo $date; ?></p>
<input type="submit" name = "submitDownload" value="download">
<input name="idDoc" value="<?php echo $idDoc ?>" style="display: none;"/>

</form>


<?php
// header("Content-Disposition: attachment; filename=$file");
// ob_clean();
// flush();
// echo $content;

// while($row = $result->fetch_assoc()){
//   echo "<p> " . $row["titreDocument"] . "</p>" ;
//   echo "<p> " . $row["contDocument"] . "</p>" ;
// }



?>