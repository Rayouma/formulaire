<?php
session_start();


if(isset($_POST['val_butt']))
{
    if( isset($_POST['email']) && isset($_POST['mdp'])){
 
        $email = $_POST['email'];
           $mp = $_POST['mdp'];
           $erreur="";
           $user = "root";
           $mdp="";
           $db="form";
           $server="localhost";
           $link=mysqli_connect($server , $user ,  $mdp , $db);
           $req=mysqli_query($link, "SELECT * FROM utilisateurs WHERE email='$email' AND mdp='$mp'");
           $num_ligne=mysqli_num_rows($req);
           if($num_ligne > 0)
           { 
               header("location:bienvenu.php");
               $_SESSION['email']=$email;
               
       
               
           }else{
              $erreur="Adress mail ou mot de passe incorectes!";
           }
       }


}







?>







<!DOCTYPE html>
<html>
    <head>
     <title> Formulaire de connexion</title>
     <meta lang="fran">
     <link href="style.css" rel="stylesheet">
     <meta charset="UTF-8">
     <meta htpp-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <section>
          <h1>Connexion</h1>
          <?php
          if(isset($erreur))
          {  
              echo "<p class='Erreu'>".$erreur."</p>" ;
          }
          ?>
          <form action="" method="POST">
              <label>Adresse Mail</label>
              <input type="text " name="email">
              <label>Mots de Passe</label>
              <input type="password" name="mdp" >
              <input type="submit" value="valider" name="val_butt">
          </form>
      </section>
    </body>
</html>