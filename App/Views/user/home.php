<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:/login');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = htmlspecialchars($pid);
   $p_name = $_POST['p_name'];
   $p_name = htmlspecialchars($p_name);
   $p_price = $_POST['p_price'];
   $p_price = htmlspecialchars($p_price);
   $p_image = $_POST['p_image'];
   $p_image = htmlspecialchars($p_image);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'Déjà ajouté à la liste d\'envie !';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'Déjà ajouté au panier !';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'Ajouté à la liste d\envie !';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = htmlspecialchars($pid);
   $p_name = $_POST['p_name'];
   $p_name = htmlspecialchars($p_name);
   $p_price = $_POST['p_price'];
   $p_price = htmlspecialchars($p_price);
   $p_image = $_POST['p_image'];
   $p_image = htmlspecialchars($p_image);
   $p_qty = $_POST['p_qty'];
   $p_qty = htmlspecialchars($p_qty);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'Déjà ajouté au panier !';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'Ajouté au panier !';
   }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page d'accueil</title>

  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../ressources/css/style.css">
   <link rel="stylesheet" href="../ressources/css/footer.css">



</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg">
   
   <section class="home">

      <div class="content">
      
         <span>Un Hamburgé, c'est comme un burger...</span>
         <h2>MAIS EN BIEN MEILLEUR !</h2>
         <p>Un pain du boulanger frais et du matin.</p>
         <p>Une viande de race cuite à votre convenance.</p>
         <a href="/about" class="btn">A-propos</a>
      </div>

      <figure class="hero-banner">
            <img src="../ressources/images/hero-banner-bg.png" width="820" height="716" alt="" aria-hidden="true"
              class="w-100 hero-img-bg">
            <img src="../ressources/images/hero-banner.png" loading="lazy" alt="Burger"
              class="w-100 hero-img">
          </figure>


   </section>

</div>
 <!-- 
        - #CATEGORY
      -->

      <section class="section section-divider white promo">
        <div class="container">

        <h1 class="title">Nos Hamburgés</h1>
        <p>C'est comme des burgers, mais en bien meilleur ! </p>
        <h2>Catégories</h2>
          <ul class="promo-list has-scrollbar">

            <li class="promo-item">
              <div class="promo-card">
                <h3 class="h3 card-title">Nos Hamburgés</h3>
                
                <p class="card-text">
               </p>

                <img src="../ressources/images/promo-3.png" width="300" height="300" loading="lazy" alt="Le Victor"
                  class="w-100 card-banner">

                  <a href="/category?category=hamburges" class="btn">Hamburgés</a>
              </div>
            </li>

            <li class="promo-item">
              <div class="promo-card">


                <h3 class="h3 card-title">A côté</h3>

                <p class="card-text">
                  
                </p>

                <img src="../ressources/images/img-fernandines.png" width="300" height="300" loading="lazy" alt="Le Bartholomé"
                  class="w-100 card-banner">

                  <a href="/category?category=a-cote" class="btn">A-côté</a>

              </div>
            </li>

            <li class="promo-item">
              <div class="promo-card">

                <h3 class="h3 card-title">Desserts</h3>

                <p class="card-text">
                  
                </p>

                <img src="../ressources/images/img-fondantbaulois.png" width="300" height="300" loading="lazy" alt="Le Paulette"
                  class="w-100 card-banner">

                  <a href="/category?category=desserts" class="btn">Desserts</a>

              </div>
            </li>

            <li class="promo-item">
              <div class="promo-card">
                <h3 class="h3 card-title">Boissons</h3>

                <p class="card-text">
                 
                </p>

                <img src="../ressources/images/img-elixir.png" width="300" height="300" loading="lazy" alt="Le Big Fernand"
                  class="w-100 card-banner">

                  <a href="/category?category=boissons" class="btn">Boissons</a>

              </div>
            </li>

          </ul>

        </div>
      </section>

<section class="products">

   <h1 class="title">Nouveaux produits</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price"><span><?= $fetch_products['price']; ?></span>€</div>
      <a href="/views?pid=<?= $fetch_products['id']; ?>">
         <svg width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
         <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
         <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
         </svg>

      </a>
      <img src="../ressources/uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="hidden" type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="Ajouter à la liste d'envie" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="Ajouter au panier" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Aucun produit ajouté pour le moment !</p>';
   }
   ?>

   </div>

</section>







<?php include 'footer.php'; ?>

<script src="./ressources/js/script.js"></script>

</body>
</html>