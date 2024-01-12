
<?php
try
{
    global $bdd;
    $bdd = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'root', '');
   echo"connexion etablie";
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head><title>Restaurant</title>
    <meta charset="UTF-8"></head>
    <link href="style.css" rel="stylesheet">
    <body>
<header>
<a href="#" class="logo"><img src="logo_restaurant.png" with="100" height="50"><span>C</span>hef</a>
<div class="menutoggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
       <li><a href="#bannière" onclick="toggleMenu();">Accueil</a></li>
       <li><a href="#propos" onclick="toggleMenu();">A propos</a></li>
        <li><a href="#menu" onclick="toggleMenu();">Menu</a></li>
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
    <a href="#reservation" class="btn-reserve" onclick="toggleMenu();">Reservation</a>
</ul>
</header>
<section class="bannière" id="bannière">
    <div class="contenu">
        <h2>Que Des Plats Délicieux</h2>
        <a href="#" class="btn1">Notre Menu</a>
        <a href="#" class="btn2">Table de Reservation</a>
    </div>
</section >
<section class="a propos" id="propos">
<div class="row">
    <div class="col50">
        <h2 class="titre-texte"><span>A</span>propos de nous</h2>
        <p>Le restaurant vous invite à un voyage en italie.Venez déguster
            l'assiète antipasti Burrata et sa fameuse assiète 
            de charcuterie italienne.Partager entre amis la delicieuse
            pizza silicienne ou son Risotto de Poulet accompagné d'un vin
            du pays.
        </p>
        <p>Finissez votre voyage en choisissant parmi nos succulents
            desserts maisons.Toutes l'équipe vous attends pour partager
            un agréable moment.
        </p>
    </div>
    <div>
        <di class="col50">
            <img src="risoto-poulet.jpeg">
        </div>
    </div >
</div>
</section>
    <section class="Menu" id="menu">
     <div class="titre">
            <h2 class="titre-texte"><span>M</span>enu</h2>
            <p>Le restaurant vous invite à un voyage en italie.Venez déguster
                l'assiète antipasti Burrata et sa fameuse assiète 
                de charcuterie itaienne.Partager entre amis la delicieuse
                pizza silicienne ou son Risotto de Poulet accompagné d'un vin
                du pays.
            </p>
        </div>
        <div class="contenue">
            <div class="box">
                <div class="inbox">
                    <img src="plat-chinois.jpg">
                </div>
                <div class="text"> <h3>Plat-special-chinois</h3></div>
            </div>
            <div class="box">
                <div class="inbox">
                    <img src="plat-poisson.jpg">
                </div>
                <div class="text"> <h3>Plat-special-poisson</h3></div>
            </div>
            <div class="box">
                <div class="inbox">
                    <img src="spaghetti-bolognese-recipe.jpg">
                </div>
                <div class="text"> <h3>Spaghetti-bolognese</h3></div>
            </div>
            <div class="box">
                <div class="inbox">
                    <img src="Italian-Grilled-Pizza-with-Fresh-Mozzarella.jpg">
                </div>
                <div class="text"> <h3>Pizza-with-Fresh-Mozzarella</h3></div>
            </div>
            <div class="box">
                <div class="inbox">
                    <img src="boeuf-barbecue-marinade.jpg">
                </div>
                <div class="text"> <h3>Boeuf-barbecue-marinade</h3></div>
            </div>
            <div class="box">
                <div class="inbox">
                    <img src="de-tajine-de-poulet-aux-epices.jpeg">
                </div>
                <div class="text"> <h3>Ttajine-de-poulet-aux-epices</h3></div>
            </div>
        </div>
        <div class="titre">
            <a href="#" class="btn1">Voir Plus</a>
        </div>
      </section>
      <section class="contact" id="contact">
        <div  class="titre"><h2 class="titre-texte"><span>C</span>ontact</h2></div>
        <form class="forme">
            <h3>Envoyer un message</h3>
            <div class="inputboit" action="index.php" method="POST">
                <input type="text" placeholder="Nom">
            </div>
            <div class="inputboit" action="index.php" method="POST">
                <input type="text" placeholder="email">
            </div>
            <div class="inputboit" action="indx.php" method="POST">
                <textarea placeholder="message"></textarea>
            </div>
            <div class="inputboit" action="index.php" method="POST">
                <input type="submit" value="envoyer">
            <form>
        </div>
      </section><section class="reservation" id="reservation">
        <div  class="titre"><h2 class="titre-texte"><span>R</span>ervation</h2></div>
        <form class="forme">
            <h3>table reservation</h3>
            <div class="inputboit" action="index.php" method="POST">
                <input type="text" placeholder="Nom">
            </div>
            <div class="inputboit" action="index.php" method="POST">
                <input type="text" placeholder="prenom">
            </div>
            <div class="inputboit" action="index.php" method="POST">
                <input type="text" placeholder="email">
            </div>
            <div class="inputboit" action="indx.php" method="POST">
                <input type=" tel" placeholder=" date:jj/mm/aaaa">
            </div>
             
            <div class="inputboit" action="index.php" method="POST">
                <input type="submit" value="envoyer">
            <form>
        </div>
      </section>
      <?php
      if(isset($_POST['nom']) and
      isset ( $_POST['email'])and
      isset ($_POST['msg']))
     {
          $insertion=$bdd->prepare('INSERT INTO contact values(:Nom,:email,:msg)');
          $insertion->bindvalue(':nom',$_POST['nom']);
          $insertion->bindvalue(':email',$_POST['email']);
          $insertion->bindvalue(':msg',$_POST['msg']);
          $verification=$insertion->execute();
          if(verification){
              echo"<br>insertion reussie";
          }
          else{
              echo"echec d'insertion";
          }
  }
      ?>
      <script type="text/javascript">
       window.addEventListener('scroll',function(){
        const header=document.querySelector('header');
        header.classList.toggle('sticky',window.scrollY>0);
       });
       function toggleMenu(){
        const menutoggle=document.querySelector('.menutoggle');
        const navbar=document.querySelector('.navbar');
        menutoggle.classList.toggle('active');
        navbar.classList.toggle('active');
       }
      </script>
    </body>
</html> 