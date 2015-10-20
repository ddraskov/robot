<html>
   <head>
		<meta charset="cp1250">
		<script src="vendor/jquery.js"></script>
		<script src="dist/js/uikit.min.js"></script>
		<script src="js/jquery-2.1.1.js"></script>
	
		<script src="js/jquery-ui-1.10.4.custom.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
        href="css/jquery-ui-1.10.4.custom.css" />
		
		<link href="css/uikit.almost-flat.min.css" rel="stylesheet">
		 
	   
        <script type="text/javascript" src="js/jquery-barcode.js"></script>
		
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
                          
							<li class="uk-nav-header">POS BackOffice</li>
							<li><a href="rekapitulacija_mal.php">Rekapitulacija Maloprodaje</a></li>
							<li class="uk-nav-header">SUSTAV</li>
							<li><a href="sustav_prava.php">Prava po djelatniku</a></li>
                            
                        </ul>
</div>
                    </div>
                    <div class="tm-main uk-width-medium-4-5">
	  
					<article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
                            <h1 class="uk-article-title">Prava po djelatnicima u SUstavu</h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead">.</p>

                         
  
   <?php
                //set up mysql connection
                $serverName = "192.168.50.13"; //serverName\instanceName
                $connectionInfo = array("Database" => "SUSTAV", "UID" => "sa", "PWD" => "Robot2012");
                $conn = sqlsrv_connect($serverName, $connectionInfo);


                if ($conn) {
				
				$radnik = sqlsrv_query($conn, "SELECT [Sifra_korisnika],[Naziv_korisnika] FROM [SUSTAV].[dbo].[KORISNIK]") ;
                    
                } else {
                    echo "Ne mogu se povezati na bazu.<br />";
                    die(print_r(sqlsrv_errors(), true));
                }
 ?>
                            

 
      <form  class="uk-form" method="post" action="prava.php">
	
                       <select name="radnik">
                        <option>Radnik</option>
                        <br>
                      <?php
                        //it fills the selectbox from mysql data
                        while ($row = sqlsrv_fetch_array($radnik)) {
                            //this the value that corrspond to the selected item of the user
                            echo ' <option value="' . $row['Sifra_korisnika'] . '"> ';

                            //this line will be visible to the user

                            echo $row['Naziv_korisnika'] . ' </option> ';
                        }
                       ?>
                    </select>
		
			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>
			
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $djelatnik = $_POST['radnik'];
						
						}
                    ?>
      </form>
	  
	  
	  

	  
	  
<?php


				
						
						

               
?>

	   </article>
	   <hr class="uk-article-divider">
<div class="uk-panel uk-panel-box uk-panel-box-primary">

	 
 <?php	

	echo $djelatnik;
	$pravo_po_korisniku = sqlsrv_query($conn, "select nazgr,tip,nivo,modul,nazprav, case when Vrijednost is null then 'N' else 'D' end
from (select mod=m.Sifra_modula, prav=p.Sifra_prava, grup=sifra_grupe, nazgr=Naziv_grupe, nivo=m.Nivo_modula,modul=m.Naziv_modula,
tip=sifra_tipa_baze, nazprav=p.naziv_prava
from prava p inner join modul m on (m.sifra_modula = p.sifra_modula ),
grupa) pr
left join prava_po_grupi pg on (pg.sifra_modula = pr.mod and pg.sifra_prava = pr.prav and pg.sifra_grupe = pr.grup)
join KORISNIK_U_GRUPI on (KORISNIK_U_GRUPI.Sifra_grupe = pr.grup)
join KORISNIK on (KORISNIK.Sifra_korisnika = KORISNIK_U_GRUPI.Sifra_korisnika)

where KORISNIK.Sifra_korisnika = '$djelatnik'
order by nivo,modul,nazprav") or die(sqlsrv_error());

$grupa= sqlsrv_query($conn, "SELECT     dbo.KORISNIK_U_GRUPI.Sifra_grupe AS Sifra_gr, dbo.KORISNIK_U_GRUPI.Sifra_korisnika AS Korisnik, dbo.GRUPA.Naziv_grupe AS Naziv_gr
FROM         dbo.KORISNIK_U_GRUPI INNER JOIN
                      dbo.GRUPA ON dbo.KORISNIK_U_GRUPI.Sifra_grupe = dbo.GRUPA.Sifra_grupe
WHERE     (dbo.KORISNIK_U_GRUPI.Sifra_korisnika = '$djelatnik')") or die(sqlsrv_error());





//$modul = sqlsrv_query($conn,"
 ?>	
<!--
//<input type="submit" class="uk-button" value="Print" onclick="printIframe(report);"/>
 //  <script>function printIframe(objFrame){ objFrame.focus(); objFrame.print(); bjFrame.save(); }</script>
 //  <iframe name="report" id="report" src=""></iframe>  -->
	
</div>

   
    <table class="uk-table uk-table-condensed uk-table-striped uk-table-hover">
                <thead>
                    <tr>
						<th>Djelatnik</th>
                        <th>Modul</th>
					    <th>Pravo</th>
					
                    </tr>
                </thead>
<?php				
			
					
while ($row = sqlsrv_fetch_array($pravo_po_korisniku, SQLSRV_FETCH_ASSOC)) {
			
			echo "<tr>";
					echo "<td>";
					echo $row['nazgr'] ;
					echo "</td>";
			
					echo "<td>";
					echo $row['tip'] ;
					echo "</td>";
					
					echo "<td>";
					echo $row['modul'] ;
					echo "</td>";
					echo "<td>";
					echo $row['nazprav'];
					echo "</td>";
					echo "<td>";
					echo $row[''];
					echo "</td>";
					
			echo "</tr>";
			
					}				
	

sqlsrv_free_stmt($pravo_po_korisniku);
?>
                    </div>
                </div>

            </div>
        </div>
   </body>
<html>