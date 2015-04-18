
			
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


$resultat = $bdd->prepare('INSERT INTO groupe(nom_grp, mdp_grp) VALUES(:nom_groupe, :mdp_groupe)');
$resultat->execute(array('nom_groupe'=>$nom_groupe, 'mdp_groupe' =>$mdp_groupe));

$req = $bdd->prepare('SELECT id_grp FROM groupe WHERE nom_grp = :nom_groupe');
$req->execute(array('nom_groupe'=>$nom_groupe));
$resultat2 = $req->fetch();
$nbr_ligne = $req->rowCount();
$id = $resultat2["id_grp"] ;
echo $id;
								
$result = $bdd->prepare('INSERT INTO jointure_memb_grp(id_grp) VALUES('.$id.')');
$result->execute(array());


//$resultat = $bdd->prepare('INSERT INTO membre(id_grp) VALUES('.$id.')');
//$resultat->execute(array());
//$resultat2 = $bdd->prepare('IN LEFT JOIN joiture_memb_grp ON groupe.id_grp = jointure_memb_grp.id_grp');

/*$var = $resultat2->fetch();
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
						<form method="post" >
								<input type="text" name ="prenom_membre" placeholder="Prenom du membre" id="box_creaton_groupe" > 
								<input type="text" name="age_membre" placeholder="Age du membre" id="box_nb_personnes">
								<input type="text" name="surnom_membre" placeholder="Surnom du membre" id="box_mdp_grp">
								</br>
								<input type="submit" value="Valider" name="boutton_submit_membre"  id="boutton_submit_creation">
								<input type="submit" value="+" name="boutton_ajout_membre"  id="boutton_ajout_creation">
						</form>
						<?php
						$bdd = new PDO('mysql:host=localhost;dbname=site2', 'root', '');
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
						$num_membre = 1;
						if (isset($_POST['prenom_membre']) && trim($_POST['prenom_membre']))
							{
						
								$prenom = $_POST['prenom_membre'];
								$_SESSION['prenom'] = $prenom;
	  
							}

							if (isset($_POST['age_membre']))
							{
						
								$age = $_POST['age_membre'];
	
							}

							if (isset($_POST['surnom_membre']))
							{
						
								$surnom = $_POST['surnom_membre'];
							}
							
							if(isset($_POST["boutton_ajout_membre"]))
							{
								$num_membre++;
								echo $num_membre;
								$resultat4 = $bdd->prepare('INSERT INTO membre(prenom, age, surnom) VALUES(:prenom_membre, :age_membre, :surnom_membre)');
								$resultat4->execute(array('prenom_membre'=>$prenom, 'age_membre' =>$age, 'surnom_membre' =>$surnom));
								
								$resul = $bdd->prepare('INSERT INTO jointure_memb_grp(id_memb) VALUES('.$num_membre.') WHERE id_grp = '.$id.'');
								$resul->execute(array());
							}
							
							/*if(isset($_POST["boutton_submit_membre"]))
							{
							$resultat4 = $bdd->prepare('INSERT INTO membre(prenom, age, surnom) VALUES(:prenom_membre, :age_membre, :surnom_membre)');
							$resultat4->execute(array('prenom_membre'=>$prenom, 'age_membre' =>$age, 'surnom_membre' =>$surnom));
							
							$req = $bdd->prepare('SELECT id_grp FROM groupe WHERE nom_grp = :nom_groupe');
$req->execute(array('nom_groupe'=>$nom_groupe));
$resultat2 = $req->fetch();
$nbr_ligne = $req->rowCount();
$id = $resultat2["id_grp"] ;
echo $id;
						$result = $bdd->prepare('UPDATE membre SET id_grp = '.$id.' WHERE prenom = :prenom_membre');
							$result->execute(array());
							}*/
					
				
						
							
							/*for($num_membre = 0; $num_membre < $nombre_personne; $num_membre++)
							{
								if(isset($_POST["boutton_submit_membre"]))
								{
									$num_membre++;
									$resultat3 = $bdd->prepare('SELECT prenom, age, surnom FROM membre WHERE prenom = :prenom');
									$resultat3->execute(array('prenom_membre'=>$prenom));
									$var2 = $resultat3->fetch();
									$nbr_ligne = $resultat3->rowCount();
									$nombre_personne = $var2["nb_pers"] ;
									header("location:test2.php");
									/*$resultat5 = $bdd->prepare('INSERT INTO membre(id_grp) SELECT id_grp FROM groupe WHERE id_grp = "'.$lastInsertId.'"');
							$resultat5->execute(array('id_grp' => $lastInsertId));
								}
							}
							echo $num_membre;*/
						?>
					</div>
				</div>
		 
		
    </body>
</html>