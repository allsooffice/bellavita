<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Bella Vita Pizza</title>
   <?php
   //INCLUDE HEAD LNKS;
   include("parts/head-links.php");
   ?>
   <link rel="stylesheet" href="style/pizza-type.css"/>

</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
       <div class="box">
          <div class="cart-info">
            <i class="icon-cancel-2" id="exit" title="Zamknij okno"></i>
             <h2><i class="icon-check"></i><span>Produkt dodany do zamówienia</span></h2>
             <ol>
                <li title="Kliknij aby wrócic do menu"><a href="menu">Wróć do menu</a></li>
                <li><a href="order.php" title="Kliknij aby przejść do koszyka"><i class="icon-basket"></i>Przejdź do zamówienia</a></li>
             </ol>
          </div>
       </div>
         <h1 id="head-menu">Menu</h1>
         <ul>
            <li id="pizza">
            Pizza
               <div class="visualisation" style="background-image: url(img/pizza.png);">
               </div>
            </li>
               <div class="pizza-types">
                    <h2>Wybierz rodzaj ciasta</h2>
                     <div class="pizza-box">
                      <div class="bella-tittle">
                          Ciasto
                          <span>Neapolitańskie 32 cm</span>
                       </div>
                        <img src="img/neapolitan_dough.png" alt="Neapolitańskie">
                     </div>
                     <div class="pizza-box">
                      <div class="bella-tittle">
                          Ciasto
                          <span>Rzymskie 32 / 42 cm</span>
                       </div>
                        <img src="img/roma_dough.png" alt="Bella Vita">
                     </div>
                     <div class="pizza-box">
                      <div class="bella-tittle">
                          Ciasto
                          <span>Calzone</span>
                       </div>
                        <img src="img/calzone_dough.png" alt="Calzone">
                     </div>
                     <div class="pizza-box">
                      <div class="bella-tittle">
                          Ciasto
                          <span>Bezglutenowe 28 cm</span>
                       </div>
                        <img src="img/no_gluten_dough.png" alt="No-gluten">
                     </div>
                     <div style="clear: both;"></div>
               </div>
               <ul class="pizza-types-list">
                  <li id="neapolitana-dough" class="pizza-dough">Ciasto <span>Neapolitańskie 32 cm</span></li>
                  <li id="bella-dough" class="pizza-dough">Ciasto <span>Rzymskie 32 / 42 cm</span></li>
                  <li id="calzone-dough" class="pizza-dough">Ciasto <span>Calzone</span></li>
                  <li id="no_gluten-dough" class="pizza-dough">Ciasto <span>Bezglutenowe</span></li>
               </ul>
               
               <div class="choosen-pizza-list">
                  
               </div>
            <li id="lasagne">
               Lasagne
               <div class="visualisation" style="background-image: url(img/lasagne.png); top: 8%; left: 67%;">

               </div>
            </li>
            <div class="choosen-lasagne-list">

            </div>
            <li id="panini">
               Panini
               <div class="visualisation" style="background-image: url(img/panini.png); top: 8%;">

               </div>
            </li>
            <div class="choosen-panini-list">

            </div>
            <li id="makarony">
               Pasty
               <div class="visualisation">

               </div>
            </li>
            <div class="choosen-makarony-list">

            </div>
            <li id="focaccia">
               Focaccia Nadziewana
               <div class="visualisation">

               </div>
            </li>
            <div class="choosen-focaccia-list">

            </div>
            <li id="antipasti">
               Antipasti
               <div class="visualisation">

               </div>
            </li>
            <div class="choosen-antipasti-list">

            </div>
            <li id="zupy">
               Zupy
               <div class="visualisation">

               </div>
            </li>
            <div class="choosen-zupy-list">

            </div>
            <li id="insalate">
               Insalate
               <div class="visualisation" style="background-image: url(img/salatki.png); top: 8%; left: 67%;">

               </div>
            </li>
            <div class="choosen-insalate-list">

            </div>
          <li id="desery">
               Desery
               <div class="visualisation" style="background-image: url(img/desery.png); top: 8%;">

               </div>
            </li>
            <div class="choosen-desery-list">

            </div>
            <li id="napoje">
               Napoje
               <div class="visualisation" style="background-image: url(img/napoje.png); top: 8%; left: 65%;">

               </div>
            </li>
            <div class="choosen-napoje-list">

            </div>
         </ul>
      </div>
      <?php
      //INCLUDE FOOTER
      include("parts/footer.php");
      ?>
   </div>
</body>
     <script src="js/jquery-3.2.1.slim.min.js"></script>
<!--   <script type="text/javascript" src="js/mobile/jquery-1.11.1.min.js"></script>-->
<!--   <script src="js/mobile/jquery.mobile-1.4.5.min.js"></script>-->
<!--       <script src="js/mobile/jquery-scrollLock.min.js"></script>-->
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/cart.js"></script>
   <script type="text/javascript" src="js/pizza-list-operation.js"></script>
   <script type="text/javascript" src="js/xxx.js"></script>
</html>