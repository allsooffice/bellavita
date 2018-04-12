<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Pizza Neapolitańska - Bella Vita Pizza</title>
   <?php
   //INCLUDE HEAD LNKS;
   include("parts/head-links.php");
   ?>
   <link rel="stylesheet" href="style/pizza.css">
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
             <h2><i class="icon-check"></i>Pizza dodana do zamówienia</h2>
             <ol>
                <li title="Kliknij aby wrócic do menu"><a href="menu">Wróć do menu</a></li>
                <li><a href="order.php" title="Kliknij aby przejść do koszyka"><i class="icon-basket"></i>Przejdź do zamówienia</a></li>
             </ol>
          </div>
       </div>
        <h1>Neapolitańska 32 cm</h1>
         <div class="pizza-content">
           <div class="prev"><i class="icon-left-open-1"></i></div>
            <div class="pizza-circle" name="0" ondragstart="return false">
               <div class="pizza-slice-1" name="1"></div>
               <div class="pizza-slice-2" name="2"></div>
               <div class="pizza-slice-3" name="3"></div>
               <div class="pizza-slice-4" name="4"></div>
               <div class="pizza-slice-5"></div>
               <div class="pizza-slice-6"></div>
               <div class="pizza-slice-7"></div>
               <div class="pizza-slice-8"></div>
            </div>
            <div class="next"><i class="icon-right-open-1"></i></div>
         </div>
         <div class="pizza-info">            
            
         </div>
         <div class="pizza-list">
            <ul>

            </ul>
         </div>
      </div>
      <?php
      //INCLUDE FOOTER
      include("parts/footer.php");
      ?>
   </div>
</body>
   <script src="js/jquery-3.2.1.slim.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>
   <script src="js/main.js"></script>
   <script src="js/cart.js"></script>
   <script src="js/pizza-neapolitana.js"></script>
</html>