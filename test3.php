
			
<?php 
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site2', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	/*if(isset($_POST["boutton_page_membre"]))
	{
		for($i = 0 ; $i < count($_POST["choix"]) ; $i++)
		{
			$choix = $_POST['choix'][$i];
			$choix = $bdd->prepare('DELETE FROM membre WHERE id_grp');
			$choix->execute(array('id_grp'=>$id));
		}
	
	}*/

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
		<link rel="stylesheet" href="style/animate.css" />
        <title>TeamFinder.fr </title>
    </head>
    <body> 		
		 
		 
		<div id="div_fond">
				<img src="image/night.JPG" id="img_back_co2"/> 
			</div>
		    <h1 class="titre_header">TeamFinder</h1>
		   <div id="rond1" class="animated fadeIn"></div>
		   <div id="rond2" class="animated fadeIn"></div>
		   <div id="rond3" class="animated fadeIn"></div>
		   <div id="rond4" class="animated fadeIn"></div>
		   <div id="rond5" class="animated fadeIn"></div>
		   <div id="rond6" class="animated fadeIn"></div>
		   <div id="rond7" class="animated fadeIn"></div>
		   <div id="rond8" class="animated fadeIn"></div>
		 <div id="box_info_memb">
			<?php
			$id = $_SESSION['id'];
			$req1 = $bdd->prepare('SELECT prenom, sexe FROM membre WHERE id_grp = '.$_SESSION['id'].'');
			$req1->execute(array('id_grp'=>$id));
			$resultat3 = $req1->fetchAll();
			$nbr_ligne = $req1->rowCount();
			
			echo "<table id='table_memb'>";
			echo "<caption><strong>Cochez les membre à supprimer en cas d'erreur (ex : erreur dans le prenom)</strong></caption>";
			foreach($resultat3 as $row)
			{
				
				echo "<tr>" ;
				if($row["sexe"] == "Femme")
				{
					echo "<td style='background-color : rgba(249, 66, 221, 0.6);'>" . $row["prenom"] . "</td>" . "<td style='background-color : rgba(249, 66, 221, 0.6);'><input type='checkbox' name='choix[]' value='$id'></td>";
				}
				else
				{
					echo "<td id='prenom'>" . $row["prenom"] . "</td>" . "<td><input type='checkbox' name='choix[]' value='$id'></td>";
				}
				echo "</tr>";
				
			}
			echo "</table>";
			
			
			?>
			<?php $req1->closeCursor();?>
			<input type="submit" value="Valider" name="boutton_page_membre"  id="boutton_conf_membre">
		</div>
		 
		
    </body>
</html>