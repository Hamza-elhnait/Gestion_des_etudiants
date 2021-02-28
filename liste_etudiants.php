<?php require_once 'connexion.php'; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<h1>Liste des étudiants</h1>
<table  style="width: auto;margin: 0 auto;" class="table table-hover"> <!--Le début de la table-->
        <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>sexe</th>
                <th>Adresse</th>
                <th>Action</th>
        </tr>

<?php 
    $resulat = mysqli_query($bdd,'SELECT * FROM etudiants');// stocker le résultat de la réquete dans la variable $resulat
    while($donnee=mysqli_fetch_assoc($resulat)){ // ici la conditon de while càd tantque il ya des lignes faire les inscructions suivants
        // stocker à chaque fois chaque ligne de  $resulat dans un tableau associatif 
        extract($donnee); //  transformer le tableau associatif $donnee['matricule']= val en $matricule=val1,$cle2=val2....
            echo "<tr>";
            echo "<td>".$matricule."</td>";
            echo "<td>".$nom_etud."</td>";
            echo "<td>".$prenom_etud."</td>";
            echo "<td>".$date_nais."</td>";
            if($sexe == 'M'){
                echo "<td>Masculin</td>";
            }
            else echo "<td>Féminin</td>";

            echo "<td>".$adresse."</td>";
            echo "<td><a href='modif-form.php?mat_modif=$matricule' class='btn btn-success'>Modifier</a>";
            echo '&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;';
            echo "<a href='modif-form.php?mat_sup=$matricule' class='btn btn-danger'>Supprimer</a>";
            echo "</td></tr>";
        
        }
        echo "</table><br>"; // la fin de la table
        echo "<center>";
        // lors du choix du suppression il faut utiliser la méthoe GET car elle permet d'envoyer des variables dans URL
        if(isset($_GET['action'])){ //isset($_GET['action']) c'est pour recevoir la variable envoié lorsq'on a exécuter le script de suppression dans modif-form.php
            //isset($_GET[supp])
            if($_GET['action']=="vrai")
            echo "<h5><b>NB:</b> L'étudiant ayant le matricule : <span style='color:red'>".$_GET['sup']."</span> est supprimé avec succès </h5> ";
            else
            echo "<h5><b>Attetion:</b>Erreur de suppression de l'étudiant".$_GET['sup']."</h5>";
        }
        echo "<hr><pre><b>";
        echo "<h5><a href='ajout_form.html'>Ajouter un Etudiant </a>";
        echo "(Le nombre actuel des étudiants incrits est : <b>".mysqli_num_rows($resulat)."</b>)</h5><br>";
        echo "</b></center>";
        //Fermer le curseur permt de libérer les données récupérer lors d'une requte sql
        
 mysqli_free_result($resulat); // libérer l'espace mémoire des données sotcker du resultat de la requete 
 mysqli_close($bdd);       // fermer la BD
?>


</table>