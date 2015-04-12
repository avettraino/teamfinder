<?php	
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=site1', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	//initialisation de la variable d'erreur
	$erreur_connexion = "" ;
	if(isset($_POST["boutton_submit_index"]))
	{
		//Recuperation de la valeur des champs du formulaire en enlevant les espaces en debut et fin de chaines
		$pseudo = trim($_POST['pseudo']);
		$pass = trim($_POST['mdp']);
		$pass_sha1 = sha1($pass) ;
		if(empty($pseudo) || empty($pass))
		{
			$erreur_connexion = "<p>Remplissez tout les champs</p>" ;
		}
		if(strlen($pseudo) > 25)
		{
			$erreur_connexion = "<p>Pseudo trop long</p>" ;
		}
		if(strlen($pass_sha1) > 60)
		{
			$erreur_connexion = "<p>Mot de passe trop long</p>" ;
		}
		if($erreur_connexion == "")
		{
			$req = $bdd->prepare('SELECT id FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp');
			$req->execute(array('pseudo' => $pseudo, 'mdp' => $pass_sha1));
			$resultat = $req->fetch();
			$nbr_ligne = $req->rowCount();
			$id = $resultat["id"] ;
			if ($nbr_ligne == 0)
			{
				echo 'Mauvais identifiant ou mot de passe !';
			}

			else
			{
				$_SESSION['id'] = $id ;
				$_SESSION['pseudo'] = $pseudo;
				header("location:membre.php");
			}
		}
	}
?>
			

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style2.css" />
		
        <title>TeamFinder.fr </title>
    </head>
    <body> 
	<?php include 'include/header2.php'; 
		  include 'include/main_menu.php';?>	
		  
		  <section>
			<article>
			<br />
				<h1 id="text_h1"><b><u> Ce que vous pouvez faire sur TeamFinder.fr, gratuitement :</u></b> </h1> 
				<ul id="text_acceuil">
					<li> - Vous inscrire et profiter de notre site pour <b>rencontrer des groupes d'amis avec vos amis</b> ! </li>
					<li>- Postez des photos de vos soirees lors des rencontres avec d'autre groupe et <b>donner votre <br />avis</b> ! </li>
					<li>- <b>Tchater avec les autres groupes</b> que vous avez déjà vus ou pas ! </li>
					<li>- <b>poste une demande de rencontre</b> dans l'onglet"les demandes"  </li>
					<li>- <b>Lorsque vous désirez sortir en discothéques et vous manquez de femmes pour rentrer</b>,<br /> arrangez vous avec un groupe de femme !</li> 
				</ul>
				
				
				
				<div id="div_index_co">
					<p id="text_conn">CONNEXION</p>
					
					<form method="post" action="index.php" id="form_co">
						<div id="div_insc_pseudo">
							<label id="text_pseudo">Pseudo</label> : <input type="text" name ="pseudo" placeholder="Votre Pseudo" id="box_pseudo" > 
						</div>
						
						<br />
						
						<div id="div_co_mdp">
							<label id="text_mdp">Mot de passe </label> :  <input type="password" name="mdp" placeholder="Votre Mot de passe" id="box_mdp">
						</div>
						
						<div id="co_auto">
							<label id="text_co_auto">Connexion automatique </label> :  <input type="checkbox" name="check"  id="box_co_auto">
						</div>
						
						<p>Pas encore inscrit ?<a href="inscription.php" id="link_insc"><b> Inscrit toi !</b></a></p>
					
						<input type="submit" value="Envoyer" name="boutton_submit_index" id="boutton_submit_index">
						
					</form>
					
				</div>
				<p id="enjoy">Enjoy your Night</p>
			</article>
		  </section>
		  <?php
			try
			{
				if(isset($_POST['pseudo']) && empty($_POST['pseudo']))
				{
					echo"<p>Veuillez indiquer votre Pseudo</p>";
				}
				if(isset($_POST['mdp']) && empty($_POST['mdp']))
				{
					echo"<p>Veuillez indiquer votre mot de passe</p>";
				}
				
				
			}
			catch(Exception $e)
			{
				die("Erreur : ".$e->getMessage());
			}
		  ?>
		  
		  
	<br />
	<br />
	<?php include 'include/footer.php'; ?>		
    </body>
</html>