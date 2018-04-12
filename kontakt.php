<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Kontakt - Bella Vita Pizza</title>
   <meta name="description" content="Bella Vita Pizza - Prawdziwa włoska pizza na dowóz" />
	<meta name="keywords" content="bella, vita, pizza, pizzeria, białystok, bialystok, dowóz, dowoz, wloska, włoska" />
   <link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Walter+Turncoat" rel="stylesheet">
   <link rel="stylesheet" href="fontello/css/fontello.css">
   <link rel="stylesheet" href="style/master.css">
   <link rel="stylesheet" href="style/contact.css">
</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
         <h1>Kontakt</h1>
            <p>Tel: 511-511-565</p>
            <p>email: info@pizza.bellavita.pl</p>
           <h1>Godziny otwarcia:</h1>
           <p>Poniedziałek: 11:00 - 23:00</p>
           <p>Wtorek: 11:00 - 23:00</p>
           <p>Sroda: 11:00 - 23:00</p>
           <p>Czwartek: 11:00 - 23:00</p>
           <p>Piątek: 11:00 - 23:00</p>
           <p>Sobota: 11:00 - 23:00</p>
           <p>Niedziela: 11:00 - 23:00</p>
           
            <h1>Formularz kontaktowy</h1>
            <input type="text" class="email" placeholder="Twój email">
            <textarea id="message" cols="30" rows="10" placeholder="Twoja wiadomość"></textarea>
            <p class="message-info"></p>
            <input id="send-message" type="button" class="btn" value="Wyślij">
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
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/cart.js"></script>
   <script type="text/javascript" src="js/contact.js"></script>
</html>