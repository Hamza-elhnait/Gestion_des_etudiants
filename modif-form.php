<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<h2><center>Modification d'un Etudiant</center></h2>
<?php 
 /* 
 -require_once:utilis" dans le cas où le meme fichier rique d'etre inclus et évalué plusiers fois : s'accurer que ce code ne sera ajouté q'une sule fois 
 -require_once: c'est nécéssaire q'une seul fois avant le démarage du scirpt et le script ne peut pas terminer son exécution si require_once 'connexion.php' n'est pas éxécuté
 */ 
require_once 'connexion.php';

if($_POST){
    extract($_POST); //  transformer le tableau associatif $donnee['matricule']= val en $matricule=val1,$cle2=val2....
    $sql = "UPDATE etudiants SET nom_etud='$nom_etud', 
            prenom_etud = '$prenom_etud',
            date_nais='$date_nais',
            sexe='$sexe',
            adresse='$adresse' 
            WHERE matricule ='$matricule'";
    $resultat = mysqli_query($bdd,$sql);
    echo "<center>";
    if($resultat){
        // header ( 'Location:liste_etudiants.php');
        echo "<h3><mark>Etudiant modifié avec succès </mark></h3><br>";
    }
    else{
        echo "<b>Erreur</b> de modification  d'un étudiant <br>";
        echo"<a href='liste_etudiants.php'>Retour à la page d'accueil</a>";
    }
    mysqli_close($bdd);
    unset($_GET); // détruire la variable $_GET s'il existe

}
// formulaire de modification d'un enregistrement de la table d'étudiants
if(isset($_GET['mat_modif'])){ //isset($_GET['mat_modif']) c'est pour recevoir la variable envoié lors de choix de la modification
    $mat_modif=$_GET['mat_modif'];
    $sql = "SELECT * FROM etudiants WHERE matricule = '$mat_modif'";
    $resultat=mysqli_query($bdd,$sql);
    if($resultat==FALSE){
        echo "aucun etudiant avec le matricule : "  .$mat_modif;
        echo "<script>alert('aucun etudiant avec le matricule demandé !!')</script>";
        echo "<br><a href='liste_etudiants.php'>Retour à la page d'acceuil </a>";
    }
    else{
        $rows = mysqli_fetch_assoc($resultat);//stocker la ligne de  $resulat dans un tableau associatif 
        extract($rows); //  transformer le tableau associatif $rows['matricule']= val en $matricule=val1,$cle2=val2....
        mysqli_free_result($resultat);
        mysqli_close($bdd);
    }
}
    echo "</center>" ;
?>
   <?php
           // lors du choix du suppression il faut utiliser la méthoe GET car elle permet d'envoyer des variables dans URL
    // script de suppression d'un enregistrement de la table étudiants lorsqu'on clique sur supprimer dans liste_etudiants.php
    if(isset($_GET['mat_sup'])){ //isset($_GET['mat_sup']) c'est pour recevoir la variable envoié lors de choix de la suppresion
        $mat_sup = $_GET['mat_sup'];
        $sql = "DELETE FROM etudiants WHERE matricule='$mat_sup'";
        $resultat = mysqli_query($bdd,$sql);
        mysqli_close($bdd);
        if($resultat){
            header("Location:liste_etudiants.php?action=vrai&sup=$mat_sup"); // envoié le lien en URL  du navigateur
        }
        else{
            header("Location:liste_etudiants.php?action=non&sup=$mat_sup");

        }
        mysqli_free_result($resultat);
    }
    
    ?>
        <!-- Pour que les variables seront connues il faut que le script soit déclaer avant le chargement du formulaire -->
    <form action="modif-form.php" method="post">
        <table  style="width: auto;margin: 0 auto;" class="table table-hover">
                    <tr>
                        <td>
                            <label>Matricule : </label>
                        </td>                        <!-- $matricule,$nom_etud ... ce sont les variables créer avec extract($row)-->
                        <td><input type="text" name="matricule" value='<?php echo $matricule ?>' size="12" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Nom :</label></td>
                        <td><input type="text" name="nom_etud" value='<?php echo $nom_etud ?>' size="30" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Prénom :</label></td>
                        <td><input type="text" name="prenom_etud"  value='<?php echo $prenom_etud ?>'size="30" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Date de naissance :</label></td>
                        <td><input type="date" name="date_nais" value='<?php echo $date_nais ?>' class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Sexe :</label></td>
                        <td>
                            <select name="sexe" class="custom-select">
                                <option value="M" <?php  if($sexe=='M') echo 'selected' ;?>>Masculin</option>
                                <option value="F" <?php  if($sexe=='F') echo 'selected' ;?>>Féminin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Adresse :</label></td>
                        <td><input type="texte" name="adresse"  value='<?php echo $adresse ?>'size="30" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><input type="submit" name="submit" value="Enregistrer" class="btn btn-primary">
                        <input type="reset" value="Effacer" class="btn btn-danger"></center></td>
                    </tr>
                </table>
    </form>
    <center><a href="liste_etudiants.php">Retourner à la page d'accueuil</a></center>
 