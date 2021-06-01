<?php
	#Fonction à appeler pour se connecter à la base de données
	function connexionBdd() {
		// Permet d'utiliser les variables d'identification pour la connexion
		require('config.php');
		
		// Tentative de connexion à la base de données MySQL 
		try{
            // chaine de connexion avec API PDO
			$querry = new PDO("mysql:host=" . $server .";dbname=" . $dbName, $user, $pass);
			//On définit le mode d'erreur de PDO sur Exception
			$querry->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}		
		// En cas de problème dans la tentative connexion on termine le script php et on affichera le message d'erreur
		catch(PDOException $e){
			die('Erreur : ' . $e->getMessage());
		}
        return $querry;
	}	
?>