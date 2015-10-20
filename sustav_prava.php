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
                            <li class="uk-nav-header">Izbornik</li>
                            <li><a href="po_artiklu2.php">Pretraga po artiklu</a></li>
                            
                            <li><a href="racun_pu.php">Pretraga računa PU format</a></li>
							<li><a href="racun_mp.php">Pretraga mal.računa </a></li>
                            <li class="uk-nav-header">info</li>
							<li><a href="index.php">Stanje artikla na skladištima</a></li>
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
                            <h1 class="uk-article-title">Prava korisnika u SUSTAVU</h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead">Prava u Sustavu po pojedinom korisniku p>

                         
  
<?php
  //    SQL SERVER 2005 KONEKCIJA 
$serverName = "192.168.50.13"; //serverName\instanceName
$connectionInfo = array("Database" => "SUSTAV", "UID" => "sa", "PWD" => "Robot2012");
$conn = sqlsrv_connect($serverName, $connectionInfo);

		if ($conn) {
                    
                } else {
                    echo "Ne mogu se povezati na bazu.<br />";
                    die(print_r(sqlsrv_errors(), true));
                }
                // Primi podatke iz baza Zaposlenik o Imenu i mjesec iz baze Evidencija
                $radnik = sqlsrv_query($conn, "SELECT [Sifra_korisnika],[Naziv_korisnika] FROM [SUSTAV].[dbo].[KORISNIK]") or die(sqlsrv_error());
           
 ?>
                            

 
      <form  class="uk-form" method="post" action="sustav_prava.php">
	
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
					
                        $radnik = $_POST['radnik'];
						
                    ?>
      </form>
	  
	  
	  

 
	  




	  </article>
	  <hr class="uk-article-divider">
	<div class="uk-panel uk-panel-box uk-panel-box-primary">
    <div class="uk-panel-badge uk-badge">Artikal</div>

	 
<?php
	echo $radnik;
	
?>
</div>
	

    <table class="uk-table uk-table-condensed uk-table-striped uk-table-hover">
                <thead>
                    <tr>
                        
						<th>Skladište</th>
                        <th>Cijena</th>
					
                        <th>Količina</th>
					
                    </tr>
                </thead>

                    </div>
                </div>

            </div>
        </div>
   </body>
<html>