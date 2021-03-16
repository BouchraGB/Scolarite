<?php
include 'db.php';
$conn = openCon();

        $nom = $_POST["nomGrp"];
        $idg = $_POST["idGrp"];
        $code = $_POST["codeGrp"];
        $idProf = $_POST["profGrp"];

        $sql = "select nom, prenom from profile where idProfile = $idProf";

        $res = $conn -> query($sql);

        $row = $res -> fetch_assoc();

        $nomP = $row["nom"];
        $prenomP = $row["prenom"];





echo "<p> " . $nom . "</p>";
echo "<p> " . $code . "</p>";
echo "cree par : " . $nomP . " " . $prenomP ;

?>

