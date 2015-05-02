
			
<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site2', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
if (isset($_POST['nom_groupe']) && trim($_POST['nom_groupe']))
{
						
	  $nom_groupe = $_POST['nom_groupe'];
	  $_SESSION['nom_groupe'] = $nom_groupe;
	  
	  
}

if (isset($_POST['nb_pers_groupe']))
{
						
	 $nb_pers = $_POST['nb_pers_groupe'];
	
}

if (isset($_POST['mdp_groupe']))
{
						
	 $mdp_groupe = sha1($_POST['mdp_groupe']);
}


$resultat = $bdd->prepare('INSERT INTO groupe(nom_grp, nb_pers, mdp_grp) VALUES(:nom_groupe, :nb_pers_groupe, :mdp_groupe)');
$resultat->execute(array('nom_groupe'=>$nom_groupe, 'nb_pers_groupe' =>$nb_pers, 'mdp_groupe' =>$mdp_groupe));
$lastInsertId = $bdd->lastInsertId();
echo $lastInsertId; // Affiche l'id inséré


/*$resultat2 = $bdd->prepare('SELECT nb_pers FROM groupe WHERE nom_grp = :nom_groupe');
$resultat2->execute(array('nom_groupe'=>$nom_groupe));
$var = $resultat2->fetch();
$nbr_ligne = $resultat2->rowCount();
$nombre_personne = $var["nb_pers"] ;*/

}
catch(Exception $e)
{
	die("Erreur : ".$e->getMessage());
}

?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		
        <title>TeamFinder.fr </title>
    </head>
    <body> 		
		 
		 
		<!--  <img src="image/night.JPG" id="img_back_co2"/> -->
		   <h1 class="titre_header">TeamFinder</h1>
		  <img src="image/a.JPG" class ="logo" id="a"/>
		  <img src="image/b.JPG" class="logo" id="b"/>
		 <div id="box_info_memb">
		 <p id="consigne_prenom"><?php echo $nom_groupe; ?></p>
				<div id='box_info'>
				<form method="post" action="test2.php">
						<input type='text' name ='prenom_membre' placeholder='Prenom du membre' id='box_creaton_groupe' > 
						<input type='text' name='age_membre' placeholder='Age du membre' id='box_nb_personnes'>
						<input type='text' name='surnom_membre' placeholder='Surnom du membre' id='box_mdp_grp'>
						</br>
						<input type="submit" value="Enregistrer membre" name="boutton_submit_membre"  id="boutton_submit_creation">
				</form>
						<?php
						
							}
						
						?>
					</div>
				</div>
		 
		
    </body>
</html>