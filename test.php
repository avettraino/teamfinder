
	<?php
		/*$bdd = new PDO('mysql:host=localhost;dbname=site2', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);*/
	/*include "connexion_bdd.php" ;
	if(isset($_POST["boutton_submit_creation"]))
	{
		//Initialisation de la variable d'erreur
		$erreur_inscription = "" ;
		//Recuperation des valeurs du formulaire dans des variables
		$nom_groupe 			= trim($_POST["nom_groupe"]) ;
		$mdp_groupe 				= trim($_POST["mdp_groupe"]) ;
		$mdp_groupe2        = trim($_POST["mdp_groupe2"]);
		//$confirm_mdp 		= trim($_POST["mdp2"]) ;

		//Test si tout les champs sont remplis
		if(empty($nom_groupe) || empty($mdp_groupe) || empty($mdp_groupe2))
		{
			$erreur_inscription .= "<p>Remplissez tout les champs du formulaire</p>" ;
		}
		//Test si les deux mot de passe sont identiques
		if($mdp_groupe != $mdp_groupe2)
		{
			$erreur_inscription .= "<p>Les mots de passes doivent être identiques</p>" ;
		}
		//Test de la taille des valeurs
		if($nom_groupe > 25)
		{
			$erreur_inscription .= "<p >Votre nom de groupe est trop long</p>" ;
		}
		//Verification de la complexiter du mot de passe : doit comporter 1 chiffre minimum et doit faire entre 5 et 11 caracteres
		if((!preg_match("#^[a-z][a-z]*[0-9]+[a-z0-9]$#i", $mdp_groupe)) || (!preg_match("#^.{5,11}$#", $mdp_groupe)))
		{
			$erreur_inscription .= "<p>Le mot de passe doit faire entre 5 et 11 caractères et doit contenir au minimum 1 chiffre</p>" ;
		}
		//Test si le pseudo est disponible
		$sql_pseudo = $bdd->prepare("SELECT * FROM groupe WHERE nom_grp = :nom_groupe");
		$sql_pseudo -> execute(array(":nom_groupe" => $nom_groupe));
		if (($sql_pseudo->rowCount() != 0))
		{
			$erreur_inscription .= "<p>Ce nom de groupe n'est pas disponible</p>";
		}
		$sql_pseudo->closeCursor();
		//Si il n'y a aucune erreur alors on passe a la suite de l'inscription
		if($erreur_inscription == "")
		{
			setcookie("groupe", $nom_groupe);
			setcookie("mdp", $mdp_groupe);
			header("location:test2.php");
		}
	}*/
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		
        <title>TeamFinder.fr </title>
    </head>
    <body> 		
		 
		 
		  <img src="image/night.JPG" id="img_back_co2"/> 
		   <h1 class="titre_header">TeamFinder</h1>
		  <img src="image/a.JPG" class ="logo" id="a"/>
		  <img src="image/b.JPG" class="logo" id="b"/>
		  <a href="#" id="dsc_teamfinder">TeamFinder, qu'est ce que c'est ?
			<span>
				<p id="titre_bulle">LE PRINCIPE</p>
				TeamFinder est un reseau social permettant de <b>rentrer en contacte avec d'autres groupes d'ami(e)s</b>.
				Pour ce faire, creez un groupe et vous pourrez :</br>
				- Tchater avec des groupes de votre region</br>
				- Tchater avec une personne individuellement</br>
				- Donner des rendez vous à d'autres groupes</br>
				</br>
				<p id="titre_bulle2">LES GROUPES</p>
				Les groupes sont composés de 20 personnes maximum, les informations de chaques membres du groupe se limitent à son prénom, son âge, son surnom au sein du groupe et une photo.
				L'administrateur du groupe possede les pouvois suivant :</br>
				- Ajouter qui il veut à son groupe</br>
				- Supprimer qui il veut de son groupe</br>
				- Donner les surnoms des membres de son groupe
				
			</span>
		  </a>
		  <div id="bloc">
			<div id="bloc_crea_grp">
				<p id="titre_crea_grp"> Creer un groupe : </p>
				<form method="post" action="test2.php" id="form_crea_grps">
						<div id="saisie_insc_grp">
							<input type="text" name ="nom_groupe" placeholder="Nom du groupe" id="box_creaton_groupe" > 
							<input type="password" name="mdp_groupe" placeholder="Mot de passe du groupe" id="box_mdp_grp">
							<input type="password" name="mdp_groupe2" placeholder="Retapper votre mot de passe" id="box_mdp_grp2">							
						</div>
						<input type="submit" value="Creer" name="boutton_submit_creation"  id="boutton_submit_creation">	
						
				</form>
			</div>
			
			<div id="bloc_co_grp">
				<p id="titre_co_grp"> Connexion </p>
				<div id="saisie_insc_grp">
							<input type="text" name ="nom_groupe_co" placeholder="Nom du groupe" id="box_co_groupe" > 
							<input type="text" name="mdp_grp_co" placeholder="Mot de passe du groupe" id="box_mdp_grps">
				</div>
				<input type="submit" value="Connexion" name="boutton_submit_conn"  id="boutton_submit_conn">
			</div>
		  </div>
		
    </body>
</html>