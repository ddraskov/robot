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
	       <script type="text/javascript">
		
		 
                $(document).ready(function(){
                    $("#SIFRA_ARTIKLA").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>
		<script type="text/javascript" src="js/jquery-barcode.js"></script>
		<script language="JavaScript" type="text/javascript"> 
<!-- 
function Print(){ 
 divs=document.getElementsByTagName('DIV'); 
 for (i=0;i<divs.length;i++){ 
  if (divs[i].title!='printMe'){ 
   divs[i].style.display='none'; 
  } 
 } 
 print(); 
 for (i=0;i<divs.length;i++){ 
  divs[i].style.display='block'; 
 } 

} 
//--> 
</script> 


	
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
							 <li><a href="racun_pu.php">Pretraga računa PU format</a></li>
							<li><a href="racun_mp.php">Pretraga mal.računa </a></li>
							<li class="uk-nav-header">BARKODOVI</li>
							<li><a href="barcode.php">Print barcode</a></li>
                            <li><a href="barcode4.php">Print barcode po dokumentu</a></li>
                            
                           
                          
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
							
                            <h1 class="uk-article-title">Računi s odabranim artiklom u razdoblju</h1>
							

                            <p class="uk-article-lead">
							Pronađi sve račune u odabranom razdoblju gdje se pojavljuje zadani artikal.
							</p>
							
						


                            <p class="uk-article-lead"></p>


					</article>
      
	  <form  class="uk-form" method="post" action="po_artiklu2.php">
	
             
			 <input data-uk-tooltip title="Odaberi datum početka" type="text" placeholder="od datuma" uk-icon-calendar data-uk-datepicker="{format:'YYYY-MM-DD'}" name="DATUM_OD">
			 <input data-uk-tooltip title="Odaberi datum kraja" type="text" placeholder="do datuma" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="DATUM_DO">
			  <input data-uk-tooltip title="Odaberi šifru artikla" type="text" placeholder="Šifra artikla" id="SIFRA_ARTIKLA" name="SIFRA_ARTIKLA" />
		
			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $od = $_POST['DATUM_OD'];
						$do = $_POST['DATUM_DO'];
						$artikal = $_POST['SIFRA_ARTIKLA'];
						
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

$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);

if ($conn) 
{ 


$query = "SELECT     CONVERT(VARCHAR(10),dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,104) AS Datum,dbo.DOKUMENT_POS_MP.broj_za_PU, dbo.STAVKA_MP.SIFRA_KASE, dbo.STAVKA_MP.JEDINICNA_CIJENA, dbo.STAVKA_MP.SKLAD_ISPORUKE, 
                      dbo.STAVKA_MP.SIFRA_ARTIKLA,dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA AS DAT
FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                      dbo.STAVKA_MP ON dbo.DOKUMENT_POS_MP.SIFRA_DOKUMENTA_MP = dbo.STAVKA_MP.SIFRA_DOKUMENTA_MP
WHERE ((dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA >= '$od' AND dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA <= '$do') AND dbo.STAVKA_MP.SIFRA_ARTIKLA = '$artikal') 
ORDER BY dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA DESC";




  //perform the query 
  $result=odbc_exec($conn, $query); 
  
  echo "Pregled po ".$artikal." od ".$od." do ".$do;
 
  echo "<table class=\"uk-table uk-table-condensed uk-table-striped\"><tr>"; 
  echo "<thead>";
		echo "<thead>";
		echo "<tr>";
        echo "<th>Datum</th>";
		echo "<th>BR.Računa</th>";
		echo "<th>Kasa</th>";	
		echo "<th>Jed. cijena</th>";	
		echo "<th>Sklad. isporuke</th>";
		echo "<th>Šifra. art.</th>";		
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
      echo odbc_result($result,1);
	  echo "</td>";
	  echo "<td><h4>"; 
      echo "<a href=\"#my-id$count\" data-uk-modal>".odbc_result($result,2)."</a>";
	  $PU_rac = odbc_result($result,2);
	  $PU_dat = odbc_result($result,7);
	 
	 
	 // ------------------------------------------------------------------------OVDJE IDE MODALNI POGLED na RAČUN ---------------------------------
	 
	 
	 
	echo "<div id=\"my-id$count\" class=\"uk-modal\">";
	echo "<div class=\"uk-modal-dialog uk-modal-dialog-large\">";
	echo "<a href=\"\" class=\"uk-modal-close uk-close uk-close-alt\"></a>";
	$server = '192.168.50.10';
	$database = 'POSB0405';
	$user = 'sa';
	$password = 'Robot2012';
	
	$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);

if ($conn) 
{ 
		// -------------SQl UPIT ZAGLAVLJE ----------------------------
		
		$zaglav = "USE POSB0405 SELECT     dbo.DOKUMENT_POS_MP.SIFRA_KASE, CONVERT(VARCHAR(20),dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA,13) as datum, dbo.DJELATNIK.IME_DJELATNIKA, 
                                                          dbo.DJELATNIK.PREZIME_DJELATNIKA, dbo.DOKUMENT_POS_MP.BROJ_POS_MP_RACUNA, dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_KASE, 
                                                          dbo.DOKUMENT_POS_MP.BROJ_ZAKLJUCKA_DANA, dbo.DOKUMENT_POS_MP.napomena, dbo.DOKUMENT_POS_MP.broj_za_PU, 
                                                          dbo.DOKUMENT_POS_MP.datum_slanja
                                   FROM         dbo.DOKUMENT_POS_MP INNER JOIN
                                                          dbo.DJELATNIK ON dbo.DOKUMENT_POS_MP.SIFRA_DJELATNIKA = dbo.DJELATNIK.SIFRA_DJELATNIKA
                                   WHERE     (dbo.DOKUMENT_POS_MP.broj_za_PU = '$PU_rac')  AND (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA ='$PU_dat')";


$zag_ispis=odbc_exec($conn, $zaglav);
?>

<div title="printMe">


<?php
echo "<img src=\"logoR.png\" alt=\"test\">";
echo "</strong>";
		

echo "<div class=\"uk-panel uk-panel-box uk-panel-box-secondary\">";
echo "<div class=\"uk-panel-badge uk-badge\">Zaglavlje računa</div>";
echo "<table class=\"uk-table\" title=\"printMe\"><tr>"; 

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




//Stavke računa
$upit_stavke_rac = "USE POSB0405
					SELECT     dbo.ARTIKAL.SIFRA_ARTIKLA AS Šifra, dbo.ARTIKAL.NAZIV_ARTIKLA AS Naziv, dbo.STAVKA_MP.KOLICINA_IZLAZ AS Količina, 
                      dbo.STAVKA_MP.VRIJEDNOST_SA_PDV AS Cijena, dbo.STAVKA_MP.SKLAD_ISPORUKE AS [Skladište isporuke]
					FROM         dbo.STAVKA_MP INNER JOIN
                      dbo.ARTIKAL ON dbo.STAVKA_MP.SIFRA_ARTIKLA = dbo.ARTIKAL.SIFRA_ARTIKLA INNER JOIN
                      dbo.DOKUMENT_POS_MP ON dbo.STAVKA_MP.SIFRA_DOKUMENTA_MP = dbo.DOKUMENT_POS_MP.SIFRA_DOKUMENTA_MP
					WHERE     (dbo.DOKUMENT_POS_MP.broj_za_PU = '$PU_rac') AND (dbo.DOKUMENT_POS_MP.DATUM_DOKUMENTA ='$PU_dat')"; 
$rezultat=odbc_exec($conn, $upit_stavke_rac); 				
		
	
		echo "<table class=\"uk-table uk-table-condensed uk-table-striped\"><tr>"; 
		echo "<thead>";
		echo "<tr>";
        echo "<th>Šifra art.</th>";
		echo "<th>Naziv artikla</th>";
		echo "<th>Količina</th>";	
		echo "<th>Jed. cijena</th>";	
		echo "<th>Sklad. isporuke</th>";
	
		echo"</tr>";

		echo "</thead>";
		  //fetch tha data from the database 
			while(odbc_fetch_row($rezultat)) 
			{ 
				echo "<tr>"; 
			for($i=1;$i<=odbc_num_fields($rezultat);$i++) 
			{ 
			echo "<td class=\"uk-text-primary\">"; 
			echo odbc_result($rezultat,$i); 
			
			echo "</td>"; 
			} 
			echo "</tr>"; 
			} 

		echo "</td> </tr>"; 
		echo "</table >"; 

		}
		
		
		
		
		
		
  echo  "</div>";
echo "</div>";

	  echo "</td>";
	  echo "<td>"; 
      echo odbc_result($result,3);
	  echo "</td></small>";
	  echo "<td>"; 
      echo odbc_result($result,4);
	  echo "</td>";
	  echo "<td>"; 
      echo odbc_result($result,5);
	  echo "<td>"; 
      echo odbc_result($result,6);
	  echo "</td>";

     
    echo "</tr>"; 
  } 

  echo "</td> </tr>"; 
  echo "</table >"; 

  

  //close the connection 
  odbc_close ($conn); 
} 
else echo "odbc not connected"; 
?>
</div>
<!-- This is the modal -->

                    </div>
                </div>

            </div>
        </div>
   </body>
<html>