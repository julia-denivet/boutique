<?php

class boutique
{
    
		private $host = "localhost";
		private $username = "root";
		private $password = "";
        private $db = "boutique";
        

        public function inscription()
		{
			if(isset($_POST['inscription']))
			{
				if(!empty($_POST['login']) && !empty($_POST['passe']) && !empty($_POST['passe2']) && !empty($_POST['email']))
				{
					$login = $_POST['login'];
					$passe = $_POST['passe'];
					$passe2 = $_POST['passe2'];
                    $mail = $_POST['email'];
                    $prenom = $_POST['prenom'];
                    $nom = $_POST['nom'];
					
					$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
					
					if($passe == $passe2)
					{
						if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $mail))
						{
							$nouveau_mail = "SELECT id FROM utilisateurs WHERE email='".$mail."'";
							$resultat = mysqli_query($connexion, $nouveau_mail);
							$nombre_mail = mysqli_num_rows($resultat);

							if($nombre_mail == 0)
							{
								if (preg_match('#^[a-z0-9_]+#', $login))
								{
									$nouveau_login = "SELECT id FROM utilisateurs WHERE login='".$login."'";
									$resultat = mysqli_query($connexion, $nouveau_login);
									$nombre_login = mysqli_num_rows($resultat);

									if($nombre_login == 0)
									{
										$passe = password_hash($passe, PASSWORD_DEFAULT);
										$sql= "INSERT INTO utilisateurs (login, password, email, prenom, nom) VALUES ('$login', '$passe', '$mail', '$prenom', '$nom')";
										mysqli_query($connexion, $sql);
										mysqli_close($connexion);
										header('Location: connexion.php');
                                    }
									else
									{
										echo "Le pseudo $login est déjà utilisé";
									}
								}
								else
								{
									echo "Votre pseudo n'est pas valide";
								}
							}
							else
							{
								echo "L'adresse email $mail est déjà utilisé";
							}
						}
						else
						{
							echo "L'adresse email $mail n'est pas valide";
						}
					}
					else
					{
						echo "Les deux mots de passe que <br /> vous avez rentrés ne correspondent pas";
					}
				}
				else
				{
					echo "Veuillez remplir toutes les casses";
				}
			}

			if(isset($_POST["connexion"])) {
				header("location:connexion.php");
			}
        }
        
        public function connexion()
        {
                if (isset($_POST['Connexion'])) 
                {
                    if (!empty($_POST['login'] && !empty($_POST['passe']))) 
                    {
                        $connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
                        $sql = "SELECT * FROM utilisateurs WHERE login='".$_POST['login']."'";
                        $req = mysqli_query($connexion, $sql);
                        $data = mysqli_fetch_assoc($req);
                        
                        if(password_verify($_POST['passe'], $data['password']))
                        {
                            $_SESSION['login'] = $_POST['login'];
                            $_SESSION['password'] = $_POST['passe'];
                            $_SESSION['id'] = $data['id'];
                            $_SESSION['id_droits'] = $data['id_droits'];
                            var_dump($_SESSION);
                            header('Location: index.php');
                        }
                        else 
                        {
                            echo "Mauvais login / mot de passe. Merci de recommencer <br />";
                        }
                        mysqli_close($connexion);
                    }
                    else 
                    {
                        echo "Remplissez tous les champs pour vous connectez !";
                    }
                
                    if(isset($_POST["inscription"])) 
                    {
                    header("location:inscription.php");
                    }
                
                }
            }
        
		



}



?>