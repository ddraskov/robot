 <html>
   <head>
		<meta charset="cp1250">
<!--		<script src="vendor/jquery.js"></script>
		<script src="dist/js/uikit.min.js"></script>
		<script src="js/jquery-2.1.1.js"></script>
	
		<script src="js/jquery-ui-1.10.4.custom.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
        href="css/jquery-ui-1.10.4.custom.css" />
		
		<link href="css/uikit.almost-flat.min.css" rel="stylesheet">
-->

<!--	<script src="vendor/jquery.js"></script> -->
		<script src="js/jquery-2.1.1.js"></script> 
		
		<script src="dist/js/uikit.min.js"></script>
 
		<script src="js/jquery-ui-1.10.4.custom.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css" />

		<link href="css/uikit.almost-flat.min.css" rel="stylesheet"> 

		 
		<link rel="stylesheet" href="css/addons/uikit.almost-flat.addons.css" />
		
		<script src="js/addons/datepicker.js"></script>
		<script src="js/addons/sticky.js"></script>


	
	<script type="text/javascript">
		
		 
                $(document).ready(function(){
                    $("#SIFRA_ARTIKLA").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>
	

		
		
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
							<li class="uk-nav-header">BARKODOVI</li>
							<li><a href="barcode.php">Print barcode</a></li>
                            <li><a href="barcode2.php">Print barcode po dokumentu</a></li>
                            
                            <li><a href="racun_pu.php">Pretraga računa PU format</a></li>
							<li><a href="racun_mp.php">Pretraga mal.računa </a></li>
                          
							<li class="uk-nav-header">POS BackOffice</li>
							<li><a href="rekapitulacija_mal.php">Rekapitulacija Maloprodaje</a></li>
							<li><a href="posbo_placanje.php">Rekapitulacija po vrsti plačanja</a></li>
							
							<li class="uk-nav-header">SUSTAV</li>
							<li><a href="prava.php">Prava po djelatniku</a></li>
                            
                        </ul>
</div>
                    </div>
                    <div class="tm-main uk-width-medium-4-5">
	
	  
	      <article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
							
                            <h1 class="uk-article-title">Rek. po vrsti plaćanja</h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead"></p>


					</article>
      
	  <form  class="uk-form" method="post" action="posbo_placanje.php">
	
             
			 <input type="text" placeholder="od datuma" uk-icon-calendar data-uk-datepicker="{format:'YYYY-MM-DD'}" name="DATUM_OD">
			 <input type="text" placeholder="do datuma" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="DATUM_DO">
			<select name="VRSTA_PLACANJA">
                        <option>GOTOVINA</option>
             			<option>KARTICE</option>
				
						
                        
                    </select>
		
			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $od = $_POST['DATUM_OD'];
						$do = $_POST['DATUM_DO'];
						$artikal = $_POST['VRSTA_PLACANJA'];
						
						}
                    ?>
			
      </form>

 <hr class="uk-article-divider">
 	  <!-- This is the anchor toggling the modal -->
		



<?php 

//connect to a DSN "myDSN" 


$server = '192.168.50.10';
$database = 'POSB0405';
$user = 'sa';
$password = 'Robot2012';
$broj_racuna = array();
$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);
$sum =0;
$odd = $od." 00:00:00";
$doo = $do." 23:59:59";
if ($conn) 
{ 

switch ($artikal) {
    case "GOTOVINA":
			$query = "USE POSB0405 SELECT DISTINCT CONVERT(VARCHAR(20),dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,104)+ '   ' + CONVERT(VARCHAR(8), dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,108) as datum, dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA, dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_DANA, CONVERT (decimal(15 , 2),dbo.DOKUMENT_POS_MP.IZNOS_POS_MP_RACUNA) AS Iznos,
					dbo.PLACENO.SIFRA_KARTICE AS kartica, 
                      dbo.PLACENO.SIFRA_VRSTE_PLACANJA AS vrsta_placanja, dbo.PLACENO.IZNOS_U_VALUTI
FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                      dbo.PLACENO ON dbo.DOKUMENT_POS_MP.SIFRA_DOKUMENTA_MP = dbo.PLACENO.SIFRA_DOKUMENTA_MP
			WHERE ((dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >= '$odd' AND dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <= '$doo') AND 
                      (dbo.PLACENO.SIFRA_VRSTE_PLACANJA = 'G')) 
			ORDER BY dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA";

       
        break;
    case "KARTICE":
			$query = "USE POSB0405 SELECT DISTINCT CONVERT(VARCHAR(20),dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,104)+ '   ' + CONVERT(VARCHAR(8), dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,108) as datum, dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA, dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_DANA, CONVERT (decimal(15 , 2),dbo.DOKUMENT_POS_MP.IZNOS_POS_MP_RACUNA) AS Iznos,
					dbo.PLACENO.SIFRA_KARTICE as kartica, 
                      dbo.PLACENO.SIFRA_VRSTE_PLACANJA AS vsrta_placanja,dbo.PLACENO.broj_transakcije, dbo.PLACENO.IZNOS_U_VALUTI
FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                      dbo.PLACENO ON dbo.DOKUMENT_POS_MP.SIFRA_DOKUMENTA_MP = dbo.PLACENO.SIFRA_DOKUMENTA_MP
			WHERE ((dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >= '$odd' AND dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <= '$doo') AND 
                      (dbo.PLACENO.SIFRA_VRSTE_PLACANJA = 'K')) 
			ORDER BY dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA";
       
        break;
	

}






  //perform the query 
  $result=odbc_exec($conn, $query);


  $od_god = substr($od, 0, 4);
  $od_mj = substr($od, 5, 2);
  $od_dan = substr($od, 8, 2);
  $do_god = substr($do, 0, 4);
  $do_mj = substr($do, 5, 2);
  $do_dan = substr($do, 8, 2);
  
  echo "<div data-uk-sticky>";
  echo "<div class=\"uk-panel uk-panel-box uk-panel-box-primary\">";
  echo "<h2>Rekapitulacija maloprodajnih računa sa vrstom plaćanja za ".$artikal." od ".$od_dan.".".$od_mj.".".$od_god."    do   ".$do_dan.".".$do_mj.".".$do_god."</h2>";
 echo "</div>";
 echo "</div>";
  echo "<table class=\"uk-table uk-table-condensed uk-table-striped\"><tr>"; 
  echo "<thead>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>R.B</th>";
        echo "<th>Datum</th>";
		echo "<th>BR.Računa</th>";
		echo "<th>Br. Zaključka</th>";	
		echo "<th class=\"uk-text-right\">Iznos</th>";
		echo "<th class=\"uk-text-right\">ŠIF.kartice</th>";	
		
		echo "<th class=\"uk-text-right\">BR. tran.</th>";	
		echo"</tr>";
echo "</thead>";

  //fetch tha data from the database 
   
  while(odbc_fetch_row($result)) 
  { 
    $count = $count +1;
    $priv = odbc_result($result,2);
	array_push($broj_racuna,"$priv");
   
	
    echo "<tr>"; 
   
    
	
	  echo "<td>"; 
      echo $count;
	  echo "</td>";
      echo "<td>"; 
      echo odbc_result($result,1);
	  echo "</td>";
	  echo "<td>"; 
      echo "<a href=\"#my-id$count\" data-uk-modal>".odbc_result($result,2)."</a>";
	  $PU_rac = odbc_result($result,2);

	  $PU_dat = odbc_result($result,7);
	 
	 
	 // OVDJE IDE MODALNI POGLED na RAČUN ---------------------------------
	 
	 
	 
	echo "<div id=\"my-id$count\" class=\"uk-modal\">";
	echo "<div class=\"uk-modal-dialog uk-modal-dialog-large\">";
	echo "<a href=\"\" class=\"uk-modal-close uk-close uk-close-alt\"></a>";
	$server = '192.168.50.10';
	$database = 'POSB0405';
	$user = 'sa';
	$password = 'Robot2012';
	
	$conn = odbc_pconnect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);

if ($conn) 
{ 
		//stavke u modalnom prozoru
		
		
		$zaglav = "USE POSB0405 SELECT     dbo.DOKUMENT_POS_MP.SIFRA_KASE, CONVERT(VARCHAR(20),dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,13) as datum, dbo.DJELATNIK.IME_DJELATNIKA, 
                                                          dbo.DJELATNIK.PREZIME_DJELATNIKA, dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA, dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_KASE, 
                                                          dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_DANA, dbo.DOKUMENT_POS_MP.napomena, dbo.DOKUMENT_POS_MP.broj_za_PU, 
                                                          dbo.DOKUMENT_POS_MP.datum_slanja
                                   FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                                                          dbo.DJELATNIK ON dbo.DOKUMENT_POS_MP.SIFRA_DJELATNIKA = dbo.DJELATNIK.SIFRA_DJELATNIKA
                                   WHERE     (dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA = '$PU_rac') AND (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >='$odd' AND dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <='$doo')";
		
		

		// zaglavlje računa 
		

$zag_ispis=odbc_exec($conn, $zaglav);
$prozor ='';
$prozor = "Printaj".$count;

echo "<div id=\"Printaj$count\">";

echo "<img src=\"logoR.png\" alt=\"test\">";
?>
<script language="JavaScript" type="text/javascript"> 
<!-- 
function Print(mojProzor){ 
  var MyStringProzor = "<?php Print($prozor); ?>";
  var divToPrint=document.getElementById(mojProzor);
  newWin= window.open("");
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/uikit.almost-flat.min.css\" type=\"text/css\"/>" );
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
} 
//--> 
</script> 

<?php




// Zaglavlje Maloprodajnog računa
echo "<button class=\"uk-button uk-button-danger uk-right\" onclick=\"javascript:Print('$prozor');\">Print</button>";


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

// ------------------------- STAVKE RAČUNA U MODALNOM PRIKAZU ---------------------------------------------

	$server = '192.168.50.10';
	$database = 'POSB0405';
	$user = 'sa';
	$password = 'Robot2012';
	$conn = odbc_pconnect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);

$upit_stavke_rac = "USE POSB0405
					SELECT     dbo.ARTIKAL.SIFRA_ARTIKLA AS Šifra, dbo.ARTIKAL.NAZIV_ARTIKLA AS Naziv, dbo.STAVKA_MP.KOLICINA_IZLAZ AS Količina, dbo.STAVKA_MP.JEDINICNA_CIJENA AS Cijena, dbo.STAVKA_MP.RABAT_POSTO AS Rabat,
                      dbo.STAVKA_MP.VRIJEDNOST_SA_PDV AS Iznos, dbo.STAVKA_MP.SKLAD_ISPORUKE AS [Skladište isporuke]
					FROM         dbo.STAVKA_MP INNER JOIN
                      dbo.ARTIKAL ON dbo.STAVKA_MP.SIFRA_ARTIKLA = dbo.ARTIKAL.SIFRA_ARTIKLA INNER JOIN
                      dbo.DOKUMENT_POS_MP ON dbo.STAVKA_MP.SIFRA_DOKUMENTA_MP = dbo.DOKUMENT_POS_MP.SIFRA_DOKUMENTA_MP
					WHERE     (dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA = '$PU_rac') AND (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >='$odd' AND dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <='$doo')"; 
$rezultat=odbc_exec($conn, $upit_stavke_rac); 				
		
	
		echo "<table class=\"uk-table uk-table-condensed\"><tr>"; 
		echo "<thead>";
		echo "<tr>";
        echo "<th>Šifra art.</th>";
		echo "<th>Naziv artikla</th>";
		echo "<th>Količina</th>";	
		echo "<th class=\"uk-text-right\">Cijena</th>";	
		echo "<th class=\"uk-text-right\">Rabat</th>";
		echo "<th class=\"uk-text-right\">Iznos</th>";	
		echo "<th class=\"uk-text-right\">Sklad. isporuke</th>";
	
		echo"</tr>";
		echo "<thead>";
		
		
// --------------------- STAVKE RAČUNA ISPIT TABLICE  ---- MAODALNI PROZOR
		  $ukupno_mo =0;
			while(odbc_fetch_row($rezultat)) 
			{ 
	echo "<tr>"; 
  
	$cijen_mo = odbc_result($rezultat,4);
	$iznos_mo = odbc_result($rezultat,5);
    $cijena_mo = number_format($cijen_mo, 2, ',', ' ');
	$ukupi_mo = number_format($iznos_mo, 2, ',', ' ');
	
	
  
      echo "<td>"; 
      echo odbc_result($rezultat,1);
      echo "</td>"; 
	  echo "<td>"; 
      echo odbc_result($rezultat,2);
      echo "</td>"; 
	  echo "<td>"; 
      echo odbc_result($rezultat,3);
      echo "</td>"; 
	  echo "<td class=\"uk-text-right\">"; 
      echo  $cijena_mo ;
      echo "</td>"; 
	  echo "<td class=\"uk-text-right\">"; 
      echo odbc_result($rezultat,5);
      echo "</td>"; 
	  echo "<td class=\"uk-text-right\">"; 
      $iznos_mo=odbc_result($rezultat,6);
	  $ukupno_mo = $iznos_mo+ $ukupno_mo; 
	  echo number_format($iznos_mo, 2, ',', ' ');
      echo "</td>"; 
	     echo "<td class=\"uk-text-right\">"; 
      echo odbc_result($rezultat,7);
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
  echo"</td>";
    echo"<td>";
	echo "Ukupno";
  echo"</td>";
   echo"<td>";
    $sum_mo = number_format($ukupno_mo, 2, ',', ' ');
  echo "<h3 class=\"uk-text-right\">".$sum_mo;
   echo "</td>";
   echo "</tr>";
   
   echo "</tfoot>";
  echo "</table >";

		}
		
		
		
		
		
		
  echo  "</div>";
echo "</div>";

	  echo "</td>";
	  echo "<td>"; 
      echo odbc_result($result,3);
	  echo "</td></small>";
	  echo "<td class=\"uk-text-right\">";
	  $iznos = odbc_result($result,4);
	  $sum =$sum+$iznos;
	  $cijena = number_format($iznos, 2, ',', ' ');
	  
      echo $cijena;
	  echo "<td>";
	   echo "<td>"; 
      echo odbc_result($result,5);
	  echo "</td></small>";

	     echo "<td>"; 
      echo odbc_result($result,7);
	  echo "</td></small>";

     
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
    echo"<td><h3 class=\"uk-text-right\">";
	echo "Ukupno";
  echo"</td>";
   echo"<td>";
    $ukupno = number_format($sum, 2, ',', ' ');
  echo "<h3 class=\"uk-text-right\">".$ukupno;
   echo "</td>";
   echo "</tr>";
   
   echo "</tfoot>";
  echo "</table >"; 
  echo "</br>";
 echo  "</div>";

  //close the connection 
  odbc_close ($conn); 
} 

else echo "odbc not connected"; 
?>
<!-- This is the modal -->
<?php

?>
                    </div>
                </div>

            </div>
        </div>
   </body>
<html>