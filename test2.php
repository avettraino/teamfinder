
			
<?php 
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site2', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	$num_membre = 1;
	do
	{
						
	if(isset($_POST["boutton_ajout_membre"]))
	{		
		$erreur_ajout_membre = "";
							
		$prenom_membre   =   htmlspecialchars(trim($_POST["prenom_membre"]));
		$age_membre      =   htmlspecialchars(trim($_POST["age_membre"]));
		$surnom_membre   =   htmlspecialchars(trim($_POST["surnom_membre"]));
							
		//Test si tout les champs sont remplis
		if(empty($prenom_membre) || empty($age_membre) || empty($surnom_membre))
		{
			$erreur_ajout_membre .= "<p style='color:red'><strong>- Remplissez tous les champs du formulaire</strong></p>" ;
		}
							
		if(strlen($prenom_membre) > 15)
		{
			$erreur_ajout_membre .= "<p style='color:red'><strong>- Votre prenom est trop long\n</strong></p>" ;
		}
							
		if(strlen($surnom_membre) > 15)
		{
			$erreur_ajout_membre .= "<p style='color:red'><strong>- Votre surnom est trop long\n</strong></p>" ;
		}
							
		if($age_membre < 10)
		{
			$erreur_ajout_membre .= "<p style='color:red'><strong>- Votre age est trop petit\n</strong></p>" ;
		}
							
		if($age_membre > 80)
		{
			$erreur_ajout_membre .= "<p style='color:red'><strong>- Votre age est trop grand\n</strong></p>" ;
		}
							
		if($erreur_ajout_membre == "")
		{
							
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
		
			$resultat4 = $bdd->prepare('INSERT INTO membre(prenom, age, surnom, id_grp) VALUES(:prenom_membre, :age_membre, :surnom_membre, '.$_SESSION['id'].')');
			$resultat4->execute(array('prenom_membre'=>$prenom, 'age_membre' =>$age, 'surnom_membre' =>$surnom));
			$num_membre++;
			
			$resul = $bdd->prepare('INSERT INTO jointure_memb_grp(id_grp, id_memb) VALUES('.$_SESSION['id'].', '.$num_membre.')');
			$resul->execute(array());
					
			
			
			
									
		}
	}
	
	}while(isset($_POST['boutton_submit_membre']));


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
		 
		 
		   <img src="image/night.JPG" id="img_back_co2"/> 
		   <h1 class="titre_header">TeamFinder</h1>
		  <img src="image/a.JPG" class ="logo" id="a"/>
		  <img src="image/b.JPG" class="logo" id="b"/>
		 <div id="box_info_memb">
		 <?php $nom_groupe = $_SESSION["nom_groupe"]; ?>
		 <p id="consigne_prenom"><?php echo $nom_groupe; ?></p>
				<div id='box_info'>
						<form method="post" action="test2.php">
								<input type="text" name ="prenom_membre" placeholder="Prenom du membre" id="box_creaton_groupe" > 
								<input type="text" name="age_membre" placeholder="Age du membre" id="box_nb_personnes">
								<input type="text" name="surnom_membre" placeholder="Surnom du membre" id="box_mdp_grp">
								</br>
								<input type="submit" value="Valider" name="boutton_submit_membre"  id="boutton_conf_creation">
								<input type="submit" value="+" name="boutton_ajout_membre"  id="boutton_ajout_creation">
						</form>
						
						<?php
						if(isset($erreur_ajout_membre) && $erreur_ajout_membre != "")
						{
							echo $erreur_ajout_membre ;
						}
						else
						{
							echo "<p id='conf_ajout_membre''><strong>$prenom    |     $age ans   |    AKA $surnom</strong></p>";
						}
						/*$resultat5 = $bdd->prepare('SELECT * FROM membre WHERE id_grp = '.$_SESSION['id'].'');
						$resultat5->execute(array());*/
			
						
						//style='position: absolute; color: white; border : solid black 1px; padding: 8px 8px; border-radius : 20px; font-size: 26px; margin-left: -150px; background-color : rgba(10, 24, 170, 0.6); width : 425px'
						?>
						
						
						
					</div>
				</div>
		 
		
    </body>
</html>