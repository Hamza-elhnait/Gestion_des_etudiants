<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php 
require_once 'connexion.php';
echo "<center>";
echo "<h3>Ajout d'un Etudiant:</h3>";
if($_POST){ // recupéer les données des formulaire de ajout_form.html avec $_POST qui est un tableau associatif
    extract($_POST); //  transformer le tableau associatif $donnee['matricule']= val en $matricule=val1,$cle2=val2....
    $sql = "INSERT INTO etudiants VALUES ('$matricule','$nom_etud','$prenom_etud','$date_nais','$sexe','$adresse')";
    $resultat = mysqli_query($bdd,$sql); // éxécution de la requete
    if($resultat){ // $resultat == true
        echo "L'étudiant <span style='color:red'>$nom_etud $prenom_etud </span >est enregistré avec succès.<br>";
        echo "<a href='liste_etudiants.php'_Retour à la page d'acceuil</a>";

    }
    else{
        echo "Erreur d'enregistrement de l'étudiant <span style='color:green'>$nom_etud $prenom_etud <br>";
        echo "<a href='liste_etudiants.php'_Retour à la page d'acceuil</a>";

    
    }
    mysqli_close($bdd);
}
//header('Location : form-table.html');
echo"<a href='liste_etudiants.php'>Affchier la lsite d'étudiants</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo"<a href='ajout.php'>Retour à la page d'ajout</a>";
echo "</center>";

?>