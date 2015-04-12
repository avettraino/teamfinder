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
		  
		 
		  
	<?php 
	   
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=nightplans', 'root', '');
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
			if (isset($_POST['nom_groupe']) && trim($_POST['nom_groupe']))
			{
						
				$groupe = $_POST['nom_groupe'];
			}

			if (isset($_POST['nb_pers']))
			{
						
				$nb_pers = $_POST['nb_pers'];
			}
			
			$resultat = $bdd->prepare('INSERT INTO groupes(nom_groupe, nb_pers) VALUES(:nom_groupe, :nb_pers)');
			$resultat->execute(array('nom_groupe'=>$_POST['nom_groupe'], 'nb_pers' =>$_POST['nb_pers']));
			
		}
		catch(Exception $e)
		{
			die("Erreur : ".$e->getMessage());
		}
?> 

	<?php include 'include/footer.php'; ?>		
    </body>
</html>