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
				<form method="post" action="next_inscription.php" enctype="multipart/form-data">
					<div id="div_insc_pseudo">
					<label id="text_pseudo">Pseudo</label> :<input type="text" name ="pseudo" placeholder="Votre Pseudo" id="box_pseudo" > 
					</div>
					<div id="div_insc_mdp">
						<label id="text_mdp">Mot de passe</label>:<input type="password" name="mdp" placeholder="Votre Mot de passe" id="box_mdp">
						
					</div>
					<input type="password" name="mdp2" placeholder="Retapper votre mot de passe" id="box_mdp2">
				<input type="submit" value="Envoyer" id="boutton_submit">	
				</form>	
			</div>
		   
		
	
		<?php include 'include/footer.php'; ?>		
    </body>
</html>