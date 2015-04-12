<?php
	session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		
        <title>NightPlans.fr </title>
    </head>
    <body> 
	<?php include 'include/header.php'; 
	include 'include/main_menu.php';?>
	<img src="image/night.JPG" id="back_next_insc"/>
	
		 <form method="post" action="membre.php" id="form_next_insc" enctype="multipart/form-data">
			
				
				
					<div id="info_supp">
						<div id="div_insc_mail">
							<label id="text_email">E-mail </label>: <input type="email" name="email" placeholder="Votre email" id="box_email" />
						</div>
				
						<div id="div_insc_age">
							<label id="text_age"> Âge </label> : <input type="text"  name="age" id="box_age" />
						</div>
				
						<div id="div_insc_ville">
							<label id="text_ville">Ville</label> : <input type="text" name ="ville" placeholder="Votre ville" id="box_ville" > 
						</div>
				
						<div id="div_insc_sexe">
							<label id="text_sexe"> Sexe </label> : 
							<select name="sexe" id="sexe">
								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>
							</select>
						</div>
				
						<div id="div_insc_amour">
							<label id="text_amour"> Amour </label>: 
							<select name="amour" id="amour">
								<option value="En couple">En couple</option>
								<option value="Celibataire">Célibataire</option>
								<option value="Relation libre">Relation libre</option>
							</select>
						</div>
				
						<div id="div_insc_locom">
							<label id="text_locom">Locomotion </label>: 
							<select name="locomotion" id="locomotion">
								<option value="Voiture">Voiture</option>
								<option value="Scooter">Scooter</option>
								<option value="Transport">Transport</option>
								<option value="Pied">A pied</option>
								<option value="Velo">Vélo</option>
							</select>
						</div>
				</div>
				
				<div id="div_photo_prof">
							<label id="text_photo">Photo de Profil    </label>:<input type="file" name="avatar"><br>
				</div>
				<input type="submit" value="Envoyer" id="boutton_submit_next">
		</form>
	
	 <?php 
	   
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site1', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
if (isset($_POST['pseudo']) && trim($_POST['pseudo']))
{
						
	  $pseudo = $_POST['pseudo'];
	  $_SESSION['pseudo'] = $pseudo;
	  echo 'Bonjours '.$pseudo; 
}

if (isset($_POST['mdp']))
{
						
	 $pass = sha1($_POST['mdp']);
}


$resultat = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mdp) VALUES(:pseudo, :mdp)');
$resultat->execute(array('pseudo'=>$pseudo, 'mdp' =>$pass));
}
catch(Exception $e)
{
	die("Erreur : ".$e->getMessage());
}

?> 


		<?php include 'include/footer.php'; ?>	
    </body>
</html>