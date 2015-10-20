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
		 
	   
        <script type="text/javascript">
		
		 
                $(document).ready(function(){
                    $("#SIFRA_ARTIKLA").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>
   </head>
  <nav class="uk-navbar">
    <ul class="uk-navbar-nav">
        <li><a href="index.php" class="uk-navbar-nav-subtitle">
            Početna
            <div>...</div>
	
        </a></li>
		<li><a href="po_artiklu.php" class="uk-navbar-nav-subtitle">
            Pretraga po artiklu
       
	
        </a></li>
		       
    </ul>
</nav>
 
   <body class="tm-background">
    <div class="tm-middle">
	  <div class="uk-container uk-container-center">
	  
	      <article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
                            <h1 class="uk-article-title">Info PULT</h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead">Upit o stanju artikla na skladištu.</p>

                         
  
   <?php
                //set up mysql connection
                $serverName = "192.168.50.13"; //serverName\instanceName
                $connectionInfo = array("Database" => "ROBA1405", "UID" => "sa", "PWD" => "Robot2012");
                $conn = sqlsrv_connect($serverName, $connectionInfo);


                if ($conn) {
                    
                } else {
                    echo "Ne mogu se povezati na bazu.<br />";
                    die(print_r(sqlsrv_errors(), true));
                }
 ?>
                            

 
      <form  class="uk-form" method="post" action="index.php">
	
             <input type="text" placeholder="Šifra artikla" id="SIFRA_ARTIKLA" name="SIFRA_ARTIKLA" />
		
			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>
			
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $artikal = $_POST['SIFRA_ARTIKLA'];
						
                    ?>
      </form>
	  
	  
	  

	  
	  
<?php

 $data = sqlsrv_query($conn, "SELECT     TOP 100 PERCENT dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA, dbo.ARTIKAL.NAZIV_ARTIKLA, dbo.ORG_JEDINICA.KRATKI_NAZIV_OJ,dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE, 
                      CONVERT(varchar(10),dbo.ARTIKAL_U_SKL.CIJENA_ART_U_SKL) AS CIJENA, dbo.ARTIKAL_U_SKL.KOLICINA_U_SKL, CONVERT(varchar(10),dbo.ARTIKAL_U_SKL.REZERVIRANA_KOL) AS REZERVIRANO, 
                      dbo.ARTIKAL_U_SKL.ISPISANA_CIJENA
						FROM         dbo.ARTIKAL_U_SKL INNER JOIN
                      dbo.ORG_JEDINICA ON dbo.ARTIKAL_U_SKL.SIFRA_ORG_JEDINICE = dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE INNER JOIN
                      dbo.ARTIKAL ON dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA = dbo.ARTIKAL.SIFRA_ARTIKLA
						WHERE     (dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA = '$artikal' AND ( dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2101' OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2201' 
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2301' OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2401' OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2501' 
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2601' 
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2801'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2A01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2B01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2C01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2D01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2G01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2J01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2k01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '1101'))
						ORDER BY dbo.ORG_JEDINICA.KRATKI_NAZIV_OJ") or die(sqlsrv_error());
$naziv_artikla = sqlsrv_query($conn,"SELECT [NAZIV_ARTIKLA]
      
  FROM [ROBA1405].[dbo].[ARTIKAL]
WHERE [SIFRA_ARTIKLA] = '$artikal'") or die(sqlsrv_error());		
                    }
               
?>

	   </article>
	   <hr class="uk-article-divider">
<div class="uk-panel uk-panel-box uk-panel-box-primary">
    <div class="uk-panel-badge uk-badge">Artikal</div>

	 
	 <?php	  
 
	while ($naziv = sqlsrv_fetch_array($naziv_artikla)) {
    echo '<h2 class="uk-article">' . $artikal ."  -  ". $naziv['NAZIV_ARTIKLA'] .  '</h2>';
}
	
	
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
<?php				
			
					
while ($row = sqlsrv_fetch_array($data, SQLSRV_FETCH_ASSOC)) {

$cijena = number_format($row['CIJENA'], 2, ',', ' ');
$kolicina = number_format($row['KOLICINA_U_SKL'], 0, ',', ' ');		


echo '<tr>';

if ($row['SIFRA_ORG_JEDINICE'] == '1101') {
									echo'<td><small class="uk-text-danger uk-text-bold">' . $row['KRATKI_NAZIV_OJ'] . '</td></small>';
								
									echo'<td><small>' . $cijena . '</td></small>';
								
									echo'<td><small>' . $kolicina . '</td></small>';
							}
			else {
			if ($kolicina == 0) {
						echo'<td><small>' . $row['KRATKI_NAZIV_OJ'] . '</td></small>';
									
									echo'<td><small>' . $cijena . '</td></small>';
									
									echo'<td><strong class="uk-text-warning">' . "NEMA NA STANJU". '</td></strong>';
						}
				else {	
									echo'<td><strong class="uk-text-success">' . $row['KRATKI_NAZIV_OJ'] . '</td></strong>';
									
									echo'<td><small class="uk-text-success">' . $cijena . '</td></small>';
									
									echo'<td><strong class="uk-text-success">' . $kolicina . '</td></strong>';
						}
						}
	    echo '</tr>';
}


sqlsrv_free_stmt($data);
?>
  </div>
</div>  
   </body>
<html>