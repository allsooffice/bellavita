<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Koszyk - Bella Vita Pizza</title>
   <meta name="description" content="Bella Vita Pizza - Prawdziwa włoska pizza na dowóz" />
	<meta name="keywords" content="bella, vita, pizza, pizzeria, białystok, bialystok, dowóz, dowoz, wloska, włoska" />
   <link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Walter+Turncoat" rel="stylesheet">
   <link href="icons/css/fontello.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="style/master.css"/>
   <link rel="stylesheet" href="style/cart-style.css"/>
</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
         <h1><i class="icon-basket-1"></i>Twoje zamówienie</h1>
         <div class="cart-list">
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
   <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/cart.js"></script>
</html>