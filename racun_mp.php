<html>
   <head>
		<meta charset="cp1250">
       <!-- <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->

	
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/uikit.almost-flat.min.css" />
	<!--	<link rel="stylesheet" href="css/addons/uikit.almost-flat.addons.css" />   -->
        <script src="vendor/jquery.js"></script>
        <script src="js/uikit.min.js"></script>
		<!-- Dodatne kontrole css i javaskript -->
		
		<script src="js/addons/datepicker.js"></script>
  </head>
   <body class="tm-background">
        <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <a class="uk-navbar-brand uk-hidden-small" href="index.php"><img class="uk-margin uk-margin-remove" src="logoR.png" width="90" height="30" title="ROBOT" alt="ROBOT"></a>

                <ul class="uk-navbar-nav uk-hidden-small">
                    <li class="uk-active"><a href="index.php">POČETNA</a></li>
                  
               
                    <li><a href="http://naserver">Sharepoint</a></li>
					 <li><a href="http://www.robot.hr">www.robot.hr</a></li>
                </ul>

                <a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><img src="logoR.png" width="90" height="30" title="Robot" alt="Robot"></div>

            </div>
        </nav>
        <div class="tm-middle">
            <div class="uk-container uk-container-center">

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="tm-sidebar uk-width-medium-1-5 uk-hidden-small">
					<div class="uk-panel uk-panel-box-secondary">
					<h3 class="uk-panel-title"></h3>
   

                      <ul class="uk-nav uk-nav-side" data-uk-nav>
							<li class="uk-nav-header">info</li>
							<li><a href="index.php">Stanje artikla na skladištima</a></li>
							<li class="uk-nav-header">MAL. RAČUNI</li>
                            <li><a href="po_artiklu2.php">Pretraga po artiklu</a></li>
							 <li><a href="racun_pu.php">Pretraga računa PU format</a></li>
							<li><a href="racun_mp.php">Pretraga mal.računa </a></li>
							<li class="uk-nav-header">BARKODOVI</li>
							<li><a href="barcode.php">Print barcode</a></li>
                            <li><a href="barcode4.php">Print barcode po dokumentu</a></li>
							 <li><a href="barcode_js.php">Barcode v2.0</a></li>
                            
                           
                          
							<li class="uk-nav-header">POS BackOffice</li>
							<li><a href="rekapitulacija_mal.php">Rekapitulacija Maloprodaje</a></li>
							
							<li class="uk-nav-header">SUSTAV</li>
							<li><a href="prava.php">Prava po djelatniku</a></li>
                            
                        </ul>
</div>
                    </div>
                    <div class="tm-main uk-width-medium-4-5">
	  
	      <article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
                            <h1 class="uk-article-title">Pretraga po maloprodajnom računu</h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead"></p>


 </article>
      
	  <form  class="uk-form" method="post" action="racun_mp.php">
	
             <input type="text" placeholder="Broj računa XXX-xxxxxx" name="RACUN" />
			 <select name="GODINA">
                        <option>2014</option>
             
						<option>2013</option>
						
                        
                    </select>

		
			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $racun = $_POST['RACUN'];
						$godina = $_POST['GODINA'];
						}
                    ?>
			
      </form>

 <hr class="uk-article-divider">

<?php 
$tek_godina_po = $godina."-01-01 00:00:00";
$tek_godina_kr = $godina."-12-31 23:59:59";
//connect to a DSN "myDSN" 


$server = '192.168.50.10';
$database = 'POSB0405';
$user = 'sa';
$password = 'Robot2012';

$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);

if ($conn) 
{ 	
	//Zaglavlje računa
		$zaglav = "USE POSB0405 SELECT     dbo.DOKUMENT_POS_MP.SIFRA_KASE, CONVERT(VARCHAR(20),dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,104)+ ' ' + CONVERT(VARCHAR(8), dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,108) as datum, dbo.DJELATNIK.IME_DJELATNIKA, 
                                                          dbo.DJELATNIK.PREZIME_DJELATNIKA, dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA, dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_KASE, 
                                                          dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_DANA, dbo.DOKUMENT_POS_MP.napomena, dbo.DOKUMENT_POS_MP.broj_za_PU, 
                                                          dbo.DOKUMENT_POS_MP.datum_slanja
                                   FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                                                          dbo.DJELATNIK ON dbo.DOKUMENT_POS_MP.SIFRA_DJELATNIKA = dbo.DJELATNIK.SIFRA_DJELATNIKA
                                   WHERE    (dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA = '$racun') AND (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >= '$tek_godina_po') AND 
                      (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <= '$tek_godina_kr')";
		
		

		// zaglavlje računa 
		

$zag_ispis=odbc_exec($conn, $zaglav);

// Zaglavlje Maloprodajnog računa
echo "<div class=\"uk-panel uk-panel-box uk-panel-box-secondary\">";
echo "<div class=\"uk-panel-badge uk-badge\">Zaglavlje računa</div>";
echo "<table class=\"uk-table\"><tr>"; 

echo "<tr>"; 
echo "<th>"; 
echo "Broj računa: "."<strong class=\"uk-h3\">".odbc_result($zag_ispis, 5 )."</strong></br>";
echo "Broj računa za PU "."<strong class=\"uk-h3\">".odbc_result($zag_ispis, 9 )."</strong></br>";
echo"</th>";
echo "<th>";
echo "Datum računa: "."<strong class=\"uk-h3\">".odbc_result($zag_ispis, 2 );
echo "</strong></br>";
echo "Blagajnik: "."<strong class=\"uk-h3\">".odbc_result($zag_ispis, 3 )." ".odbc_result($zag_ispis, 4 );
echo "</strong></br>";
echo "</th>"; 
echo "<th>";
echo " Zaključak kase :".odbc_result($zag_ispis, 6 )."</br>"." Zaključak dana :".odbc_result($zag_ispis, 7 );
echo "</br>";
echo "</th>";
echo "</table >";
echo "<div class=\"uk-panel uk-panel-box uk-panel-box\">";
echo "Napomena: ".odbc_result($zag_ispis, 8 );
echo "</div>";
echo "</div>";













  //the SQL statement that will query the database 
  $query = "SELECT     dbo.STAVKA_MP.SIFRA_ARTIKLA, dbo.ARTIKAL.NAZIV_ARTIKLA, dbo.STAVKA_MP.KOLICINA_IZLAZ, dbo.STAVKA_MP.VRIJEDNOST_SA_PDV, dbo.STAVKA_MP.SKLAD_ISPORUKE
FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                      dbo.STAVKA_MP ON dbo.DOKUMENT_POS_MP.SIFRA_DOKUMENTA_MP = dbo.STAVKA_MP.SIFRA_DOKUMENTA_MP INNER JOIN
                      dbo.ARTIKAL ON dbo.STAVKA_MP.SIFRA_ARTIKLA = dbo.ARTIKAL.SIFRA_ARTIKLA
WHERE     (dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA = '$racun') AND (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >= '$tek_godina_po') AND 
                      (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <= '$tek_godina_kr')"; 
  //perform the query 
  $result=odbc_exec($conn, $query); 

  echo "<table class=\"uk-table uk-table-condensed uk-table-striped\"><tr>"; 
  echo "<thead>";
		echo "<tr>";
        echo "<th>Šifra art.</th>";
		echo "<th>Naziv artikla</th>";
		echo "<th>Količina</th>";	
		echo "<th class=\"uk-text-right\">Cijena</th>";	
		echo "<th class=\"uk-text-right\">Iznos</th>";	
		echo "<th class=\"uk-text-right\">Sklad. isporuke</th>";
	
		echo"</tr>";
	echo "<thead>";
	
  //fetch tha data from the database 
  while(odbc_fetch_row($result))
  {
	echo "<tr>"; 
  
	$cijen = odbc_result($result,4);
    $cijena = number_format($cijen, 2, ',', ' ');
  
      echo "<td>"; 
      echo odbc_result($result,1);
      echo "</td>"; 
	  echo "<td>"; 
      echo odbc_result($result,2);
      echo "</td>"; 
	    echo "<td>"; 
      echo odbc_result($result,3);
      echo "</td>"; 
	     echo "<td class=\"uk-text-right\">"; 
      echo  $cijena ;
      echo "</td>"; 
	  echo "<td class=\"uk-text-right\">"; 
      $iznos=odbc_result($result,3)*odbc_result($result,4);
	  $ukupno = $iznos+ $ukupno; 
	  echo number_format($iznos, 2, ',', ' ');
      echo "</td>"; 
	     echo "<td class=\"uk-text-right\">"; 
      echo odbc_result($result,5);
      echo "</td>"; 
    
    echo "</tr>"; 
     } 

  echo "</td> </tr>"; 
   echo "<tfoot>";
   echo "<tr>";
  echo"<td>";
  echo"</td>";
  echo"<td>";
  echo"</td>";
  echo"<td>";
  echo"</td>";
    echo"<td>";
	echo "Ukupno";
  echo"</td>";
   echo"<td>";
    $sum = number_format($ukupno, 2, ',', ' ');
  echo "<h3 class=\"uk-text-right\">".$sum;
   echo "</td>";
   echo "</tr>";
   
   echo "</tfoot>";
  echo "</table >"; 

  //close the connection 
  odbc_close ($conn); 
} 
else echo "odbc not connected"; 
?>
  </div>
</div>  
  </div>
</div>  
   </body>
<html>