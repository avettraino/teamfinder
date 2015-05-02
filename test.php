
	<?php	
	$bdd = new PDO('mysql:host=localhost;dbname=site2', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	if(isset($_POST["boutton_submit_creation"]))
	{
		//Initialisation de la variable d'erreur
		$erreur_inscription = "" ;
		//Recuperation des valeurs du formulaire dans des variables
		$nom_groupe 			= htmlspecialchars(trim($_POST["nom_groupe"])) ;
		$mdp_groupe 			= htmlspecialchars(trim($_POST["mdp_groupe"]));
		$mdp_groupe2        	= htmlspecialchars(trim($_POST["mdp_groupe2"]));
		//$confirm_mdp 		= trim($_POST["mdp2"]) ;

		//Test si tout les champs sont remplis
		if(empty($nom_groupe) || empty($mdp_groupe) || empty($mdp_groupe2))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 270px; position: absolute'><strong>- Remplissez tous les champs du formulaire</strong></p>" ;
		}
		//Test si les deux mot de passe sont identiques
		if($mdp_groupe != $mdp_groupe2)
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 270px; position: absolute'><strong>- Les mots de passes doivent être identiques\n</strong></p>" ;
		}
		//Test de la taille des valeurs
		if(strlen($nom_groupe) > 15)
		{
			$erreur_inscription .= "<p style='color:red;  margin-top: 270px; position: absolute'><strong>- Votre nom de groupe est trop long\n</strong></p>" ;
		}
		//Verification de la complexiter du mot de passe : doit comporter 1 chiffre minimum et doit faire entre 5 et 11 caracteres
		if((!preg_match("#^[a-z][a-z]*[0-9]+[a-z0-9]$#i", $mdp_groupe)) || (!preg_match("#^.{5,11}$#", $mdp_groupe)))
		{
			$erreur_inscription .= "<p style='color:red;  margin-top: 270px; position: absolute'><strong>- Le mot de passe doit faire entre 5 et 11 caractères et doit contenir au minimum 1 chiffre</strong></p>" ;
		}
		//Test si le pseudo est disponible
		$sql_pseudo = $bdd->prepare("SELECT * FROM groupe WHERE nom_grp = :nom_groupe");
		$sql_pseudo -> execute(array(":nom_groupe" => $nom_groupe));
		if (($sql_pseudo->rowCount() != 0))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 270px; position: absolute'><strong>- Ce nom de groupe est déja utilisé \n</strong></p>";
		}
		$sql_pseudo->closeCursor();
		//Si il n'y a aucune erreur alors on passe a la suite de l'inscription
		if($erreur_inscription == "")
		{
			session_start();
			/*setcookie("nom_groupe", $nom_groupe);
			setcookie("mdp_groupe", $mdp_groupe);*/
			 if (isset($_POST['nom_groupe']) && trim($_POST['nom_groupe']))
			{
									
				  $nom_groupe = $_POST['nom_groupe'];
				  $_SESSION['nom_groupe'] = $nom_groupe;
				  
				  
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
			$_SESSION['id'] = $id;
			
			$_SESSION['nom_groupe'] = $nom_groupe;
			header("location:test2.php");
		}
	}
	
	/*if(isset($_POST["boutton_submit_conn"]))
	{
		$erreur_inscription2 = "" ;
		
		if(isset($_POST['nom_groupe_co']) && trim($_POST['nom_groupe_co']))
		{
			$nom_groupe_conn = $_POST['nom_groupe_co'];
		}
		
		if (isset($_POST['mdp_groupe_co']))
		{									
			 $mdp_groupe_conn = sha1($_POST['mdp_groupe_co']);
		}
		
		$req2 = $bdd->prepare('SELECT mdp_grp FROM groupe WHERE nom_grp = :nom_groupe_co');
		$req2->execute(array('nom_groupe_co'=>$nom_groupe_conn));
		$resultat3 = $req2->fetch();
		$nbr_ligne = $req2->rowCount();
		$mdp_bdd = $resultat3["mdp_grp"] ;
		
		if(sha1($_POST['mdp_groupe_co']) != $mdp_bdd)
		{
			$erreur_inscription2 .= "<p>Le mot de passe entre est incorrect</p>" ;
		}
		
		if($erreur_inscription2 == "")
		{
			header("location:test3.php");
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
		    	<?php
				if(isset($erreur_inscription) && $erreur_inscription != "")
		   		{
		   			echo $erreur_inscription ;
		   		}
			?>
			<div id="bloc_crea_grp">
				<p id="titre_crea_grp"> Creer un groupe : </p>
				<form method="post" action="test.php" id="form_crea_grps">
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
				<form method="post" action="test.php" >
				<div id="saisie_insc_grp">
							<input type="text" name ="nom_groupe_co" placeholder="Nom du groupe" id="box_co_groupe" > 
							<input type="password" name="mdp_grp_co" placeholder="Mot de passe du groupe" id="box_mdp_grps">
				</div>
				<input type="submit" value="Connexion" name="boutton_submit_conn"  id="boutton_submit_conn">
				</form>
			</div>
		  </div>
		  
		  <?php
				if(isset($erreur_inscription2) && $erreur_inscription2 != "")
		   		{
		   			echo "Erreur : \n" . $erreur_inscription2 ;
		   		}
			?>
		
    </body>
</html>