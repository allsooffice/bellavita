<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Twoje zamówienie - Bella Vita Pizza</title>
   <?php
   //INCLUDE HEAD LNKS;
   include("parts/head-links.php");
   ?>
   <link rel="stylesheet" href="style/order-style.css"/>
</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
         <h1><i class="icon-basket-1"></i>Twoje zamówienie</h1>
         <div class="order-cart-list">
            <ul>

            </ul>
         </div>
         <h1>Adres dostawy</h1>
         <div class="data-form">
            <p>Dzielnica: </p>
            <div class="d-s">
               <div class="order-select">Wybierz</div>
               <div class="discounts">
                  <ul>
                     <li>Centrum</li>
                     <li>Słoneczny Stok</li>
                     <li>Białostoczek</li>
                     <li>Piaski</li>
                     <li>Starosielce</li>
                     <li>Sienkiewicza</li>
                     <li>Zielone Wzgórza</li>
                     <li>Leśna Dolina</li>
                     <li>Wysoki Stoczek</li>
                     <li>Bacieczki</li>
                     <li>Dziesięciny I</li>
                     <li>Dziesięciny 2</li>
                     <li>Antoniuk</li>
                     <li>Młodych</li>
                     <li>Mickiewicza</li>
                     <li>Nowe miasto</li>
                     <li>Przydworcowe</li>
                     <li>Kawaleryjskie</li>
                     <li>Bema</li>
                     <li>Zawady</li>
                  </ul>
               </div>
            </div>
            <p>Adres: </p>
            <input id="adress" class="order-input" type="text" placeholder="Twój adres">
            <p>E-mail: </p>
            <input id="email" class="order-input" type="email" placeholder="Twój e-mail">
            <p>Numer telefonu: </p>
            <input id="number" class="order-input" type="text" placeholder="Twój numer telefonu">
         </div>
         <div class="delivery-form">
            <div class="payment-method-list">
               <p>Sposób płatności: </p>
               <label class="payment-method"><input class="choosen-payment" type="radio" name="payment" value="cash"><i class="icon-money"></i> Gotówką przy odbiorze</label>
               <label class="payment-method"><input class="choosen-payment" type="radio" name="payment" value="card"><i class="icon-credit-card"></i> Kartą przy odbiorze</label>
               <label class="payment-method"style="display: none;"><input class="choosen-payment" type="radio" name="payment" value="online"> Płatność online - PolCard</label>
            </div>
            <div class="payment-method-list">
               <p>Dodatkowe informacje: </p>
               <textarea class="information" id="" cols="30" rows="10"></textarea>
            </div>
         </div>
         <div style="clear: both;"></div>
         <div class="form-error"><i class=" icon-info"></i> Uzupełnij wszystkie pola formularza</div>
         <div class="bottom-nav">
            <input id="back" type="button" class="btn" value="Wróć do menu">
            <input id="confirm-order" type="button" class="btn" value="Dalej">
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
   <script type="text/javascript" src="js/order.js"></script>
</html>