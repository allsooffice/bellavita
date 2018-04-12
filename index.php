<!DOCTYPE html>
<?php
include('php/db_connect.php');
$dodawanie = "UPDATE static SET value = value+1 WHERE id = '1'";
// wykonanie dodawania do bazy
$wynik = $mysqli->query($dodawanie); 
?>
<html lang="pl">
<head>
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112998656-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-112998656-1');
   </script>
   <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Bella Vita Pizza - Białystok</title>
   <meta name="description" content="Bella Vita Pizza - Białystok - Smak Włoch Twoim domu. Nasza restauracja stała się przez kilka ostatnich lat jednym z najjaśniejszych punktów na kulinarnej mapie Białegostoku. Niezależnie od rodzaju dania, każde z nich przygotowywane jest z najlepszych włoskich składników, starannie wyselekcjonowanych przez naszego szefa kuchni." />
	<meta name="keywords" content="bella, vita, pizza, pizzeria, białystok, bialystok, dowóz, dowoz, wloska, włoska, pizzeria, na dowóz, z dowozem, dowóz, dostawa" />
   <?php
   //INCLUDE HEAD LNKS;
   include("parts/head-links.php");
   ?>
   <link rel="stylesheet" href="style/index.css">
   <script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '7a6dd6efcbd8e8095ae2f5042aca0f713d2fdfa5');
    </script>
</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
        <div class="left-bar">
           <a class="call-click" href="tel:+48511511565">
              <img src="img/call.png" alt="tel:+48511511565">
           </a>
           <a href="zamow-online"><div class="btn">Zamów online</div></a>
        </div>
        <div class="center-bar">
           <img src="img/bella.png" alt="Bella Vita Pizza">
        </div>
        <div class="right-bar">
          <img src="img/best.png" alt="Najlepsza pizza w mieście">
        </div>
        <div style="clear: both;"></div>
        <div class="bella-tittle">
           Obszar
           <span>dowozu</span>
        </div>
        <div class="map">
           <img src="img/map.png" alt="Mapa">
        </div>
        <div class="map-legend">
           <p class="map-info">obecnie dowozimy pizzę w poniższych dzielnicach białegostoku.</p>
            <ul id="estate-list">
               <li>Centrum</li>
               <li>Słoneczny Stok</li>
               <li>Starosielce</li>
               <li>Białostoczek</li>
               <li>Zielone Wzgórza</li>
               <li>Leśna Dolina</li>
               <li>Wysoki Stoczek</li>
               <li>Bacieczki</li>
               <li>Dziesięciny I</li>
               <li>Dziesięciny 2</li>
               <li>Piaski</li>
               <li>Antoniuk</li>
               <li>Młodych</li>
               <li>Nowe miasto</li>
               <li>Mickiewicza</li>
               <li>Sienkiewicza</li>
               <li>Kawaleryjskie</li>
               <li>Bema</li>
               <li>Zawady</li>
            </ul>
              <p class="colored">wkrótce do naszej listy dołączą kolejne osiedla.</p>
        </div>
        <div style="clear: both;"></div>
      <?php
      //INCLUDE HEAD;
      include("parts/footer.php");
      ?>
      </div>
   </div>
</body>
   <script src="js/jquery-3.2.1.slim.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script src="js/main.js"></script>
   <script type="text/javascript" src="js/cart.js"></script>
   <script src="js/index.js"></script>
</html>