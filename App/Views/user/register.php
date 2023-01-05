<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = htmlspecialchars($name);
   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   $pass = md5($_POST['pass']);
   $pass = htmlspecialchars($pass);
   $cpass = md5($_POST['cpass']);
   $cpass = htmlspecialchars($cpass);

   $image = $_FILES['image']['name'];
   $image = htmlspecialchars($image);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = './ressources/uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'L\'adresse e-mail de l\'utilisateur existe déjà !';
   }else{
      if($pass != $cpass){
         $message[] = 'Le mot de passe ne correspond pas !';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image='default-img.jpg']);

         if($insert){
            if($image_size > 5000000){
               $message[] = 'La taille de l\'image est trop grande !';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'Enregistré avec succès!';
               header('location:/login');
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inscription</title>

  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./ressources/css/components.css">
   <link rel="stylesheet" href="./ressources/css/footer.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>

         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>

      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>S'inscrire maintenant</h3>
      <p>pour avoir une meilleur expérience! 😋</p>
      <input type="text" name="name" class="box" placeholder="Entre votre nom complet" required>
      <input type="email" name="email" class="box" placeholder="Entrer votre email" required>
      <input type="password" name="pass" class="box" placeholder="Entrer votre mot de passe" required>
      <input type="password" name="cpass" class="box" placeholder="Confirmer votre mot de passe" required>
      <!-- <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"> -->
      <input type="submit" value="S'inscrire" class="btn" name="submit">
      <p>Vous avez déjà un compte? <a href="/login">Se connecter</a></p>
   </form>

</section>


</body>
</html>