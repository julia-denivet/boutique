<?php
    class profile 
    {
        private $host = "localhost";
		private $username = "root";
		private $password = "";
        private $db = "boutique";
        
        public function profil()
		{
			if (isset($_POST['Modifier'])) 
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$requete= "SELECT * FROM utilisateurs WHERE login= '".$_SESSION['login']."'";
				$query= mysqli_query($connexion, $requete);
				$data = mysqli_fetch_assoc($query);
				

				if($_POST['login']!= $data['login'])
					{
						$nouveau_login = "SELECT id FROM utilisateurs WHERE login='".$_POST['login']."'";
						$resultat = mysqli_query ($connexion, $nouveau_login);
						$nombrelogin = mysqli_num_rows($resultat);

						if($nombrelogin < 1)
							{
								$sql = "UPDATE utilisateurs SET login = '".$_POST['login']."' WHERE login = '".$_SESSION['login']."'";
								mysqli_query($connexion, $sql);
								$_SESSION['login'] = $_POST['login'];
								echo "Vos données bien été modifié !";
							}
						else
							{
							echo "Le pseudo '".$_POST['login']."' n'est pas disponible";
							}
					}
				
				if($_POST['passe'] != $data['password'])
				{
					$passe = password_hash($_POST['passe'], PASSWORD_DEFAULT);
				    $sql = "UPDATE utilisateurs SET password = '$passe' WHERE login = '".$_SESSION['login']."'";
				    mysqli_query($connexion, $sql);
					echo "Vos données bien été modifié !";

                }

                if($_POST['prenom'] != $data['prenom'])
                {
                    $sql = "UPDATE utilisateurs SET prenom ='".$_POST['prenom']."' WHERE login = '".$_SESSION['login']."'";
                    mysqli_query($connexion, $sql);
                    echo "Vos données bien été modifié !";
                }

                if($_POST['nom'] != $data['nom'])
			    {
				$sql = "UPDATE utilisateurs SET nom = '".$_POST['nom']."' WHERE login = '".$_SESSION['login']."'";
				mysqli_query($connexion, $sql);
                echo "Vos données bien été modifié !";
			    }
                
                if($_POST['email'] != $data['email'])
			        {
                        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email']))
                        {
                            $nouveau_mail = "SELECT id FROM utilisateurs WHERE email='".$_POST['email']."'";
                            $resultat = mysqli_query ($connexion, $nouveau_mail);
                            $nombre_mail = mysqli_num_rows($resultat);

                            if($nombre_mail < 1)
                            {
                                $sql = "UPDATE utilisateurs SET email = '".$_POST['email']."' WHERE login = '".$_SESSION['login']."'";
                                mysqli_query($connexion	, $sql);
                                echo "Vos données bien été modifié !";
                            }
                            else
                            {
                                echo "Veuillez remplir toutes les casses";
                            }
                        }
                        else
                        {
                            echo "Veuillez remplir toutes les casses";
                        }
			        }
			



			}
			

		}
	}
		
    




?>