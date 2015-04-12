<?php
	include "connexion_bdd.php" ;

	if(isset($_POST["btn_inscription"]))
	{
		//Initialisation de la variable d'erreur
		$erreur_inscription = "" ;
		//Recuperation des valeurs du formulaire dans des variables
		$pseudo 			= trim($_POST["pseudo"]) ;
		$mdp 				= trim($_POST["mdp"]) ;
		$confirm_mdp 		= trim($_POST["mdp2"]) ;

		//Test si tout les champs sont remplis
		if(empty($pseudo) || empty($mdp) || empty($confirm_mdp))
		{
			$erreur_inscription .= "<p>Remplissez tout les champs du formulaire</p>" ;
		}
		//Test si les deux mot de passe sont identiques
		if($mdp != $confirm_mdp)
		{
			$erreur_inscription .= "<p>Les mots de passes doivent être identiques</p>" ;
		}
		//Test de la taille des valeurs
		if($pseudo > 25)
		{
			$erreur_inscription .= "<p>Votre pseudo est trop long</p>" ;
		}
		//Verification de la complexiter du mot de passe : doit comporter 1 chiffre minimum et doit faire entre 5 et 11 caracteres
		if((!preg_match("#^[a-z][a-z]*[0-9]+[a-z0-9]$#i", $mdp)) || (!preg_match("#^.{5,11}$#", $mdp)))
		{
			$erreur_inscription .= "<p>Le mot de passe doit faire entre 5 et 11 caractères et doit contenir au minimum 1 chiffre</p>" ;
		}
		//Test si le pseudo est disponible
		$sql_pseudo = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
		$sql_pseudo -> execute(array(":pseudo" => $pseudo));
		if (($sql_pseudo->rowCount() != 0))
		{
			$erreur_inscription = "<p>Ce pseudo n'est pas disponible</p>";
		}
		$sql_pseudo->closeCursor();
		//Si il n'y a aucune erreur alors on passe a la suite de l'inscription
		if($erreur_inscription == "")
		{
			setcookie("pseudo", $pseudo);
			setcookie("mdp", $pseudo);
			header("location:next_inscription.php");
		}
	}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		
        <title>Inscription</title>
    </head>
    <body> 
		<?php include 'include/header.php'; 
		 include 'include/main_menu.php';?>	
			<img src="image/blue.JPG" id="img_back_insc"/>
			<div id="formulaire">
			<p class="text_insc">Inscription<p>
				<form method="post" action="inscription.php" enctype="multipart/form-data">
					<div id="div_insc_pseudo">
					<label id="text_pseudo">Pseudo</label> :<input type="text" name ="pseudo" placeholder="Votre Pseudo" id="box_pseudo" > 
					</div>
					<div id="div_insc_mdp">
						<label id="text_mdp">Mot de passe</label>:<input type="password" name="mdp" placeholder="Votre Mot de passe" id="box_mdp">
						
					</div>
					<input type="password" name="mdp2" placeholder="Retapper votre mot de passe" id="box_mdp2">
				<input type="submit" name="btn_inscription" value="Envoyer" id="boutton_submit">	
				</form>	
			</div>
		   <?php
		   		if(isset($erreur_inscription) && $erreur_inscription != "")
		   		{
		   			echo "Erreur : \n" . $erreur_inscription ;
		   		}

		   ?>	
		<?php include 'include/footer.php'; ?>		
    </body>
</html>