<?php

        $servername = 'localhost';
        $username = 'lindsay';
        $password = 'motdepasse';
        $dbName = 'ackerman';

        $userNom = $_POST['user-nom'] ?? false;
        $userPrenom = $_POST['user-prenom'] ?? false;
        $userAdresse = $_POST['user-adresse'] ?? false;
        $userCp = $_POST['user-cp'] ?? false;
        $userVille = $_POST['user-ville'] ?? false;
        $userPays = $_POST['user-pays'] ?? false;
        $userTel = $_POST['user-tel'] ?? false;
        $userLogin = $_POST['user-login'] ?? false;
        $userPassword = $_POST['user-password'] ?? false;

ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = "lchognon7@gmail.com";
$to = "bastien.bros.pro@hotmail.fr";
$subject = "Test PHP mail";
$message = "Ca putain de marche !";
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);
echo "the email was sent";

        try{
           
            $connexion = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $connexion->beginTransaction();

            $insertion = "INSERT INTO user(userNom, userPrenom, userAdresse, userCp, userVille, userPays, userTel, userLogin, userPassword) 
            VALUES('$userNom','$userPrenom','$userAdresse','$userCp','$userVille','$userPays', '$userTel', '$userLogin', '$userPassword')";            
            
            $connexion->exec($insertion);

            $connexion->commit();

            echo 'Inscription réussie';

        }
  
        catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
      }

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>account-create--process.php</title>
  <style>code{background:#FF0}</style>
</head>
<body>
  <main>
    <p>Bien le bonjour, je suis le fichier <code>account-create--process.php</code> et voici les valeurs que je viens tout juste de recevoir par la méthode <code>POST</code>:</p>
    <ul>
      <li>Nom : <?php echo $userNom; ?></li>
      <li>Prénom : <?php echo $userPrenom; ?></li>
      <li>Adresse : <?php echo $userAdresse; ?></li>
      <li>Code postal : <?php echo $userCp; ?></li>
      <li>Ville : <?php echo $userVille; ?></li>
      <li>Pays : <?php echo $userPays; ?></li>
      <li>Téléphone : <?php echo $userTel; ?></li>
      <li>Adresse électronique : <?php echo $userLogin; ?></li>
      <li>Mot de passe : <?php echo $userPassword; ?></li>
    </ul>
  </main>
</body>
</html>