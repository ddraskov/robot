<html>
   <head>
		<meta charset="cp1250">
		
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
		<script type="text/javascript" src="js/jquery-barcode.js"></script>
		<script type="text/javascript" src="js/ean_plocica.js"></script>
		<script type="text/javascript" src="js/ean_barcode.js"></script>

<script language="JavaScript" type="text/javascript"> 
<!-- 
function Print(){ 
  var divToPrint=document.getElementById('Printaj');
  newWin= window.open("barkodovi");
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/uikit.almost-flat.min.css\" type=\"text/css\"/>" );
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/barcode.print.css\" type=\"text/css\"/>" );
  newWin.document.write( "<script type=\"text/javascript\" src=\"js/jquery-2.1.1.js\"></script>" );
  newWin.document.write( "<script type=\"text/javascript\" src=\"js/jquery-barcode.js\"></script>" );
  newWin.document.write( "<script type=\"text/javascript\" src=\"js/ean_plocica.js\"></script>" );
  newWin.document.write( "<script type=\"text/javascript\" src=\"js/ean_barcode.js\"></script>" );
  newWin.document.write(divToPrint.outerHTML);
  newWin.focus();
  newWin.print();
  newWin.close();
} 
//--> 
</script> 
<script language="JavaScript" type="text/javascript"> 
function sendCategories(sel){
    var values = $(select).serialize();
    console.log (values);       // See if you get the serialized data in console.

    $.ajax({
        type: 'POST',
        url: "http://www.mysite.com/update_categories.php"
        data: values,
        success: function (data) {
            document.getElementById("my_div").innerHTML = data;
        }
    });
}
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
				
                <div class="uk-button-group uk-align-right">
                   
                    <button class="uk-button uk-button-danger" onclick="javascript:Print();">Print</button>
                </div>
          
              
		
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
                    <div title="Printaj" class="tm-main uk-width-medium-4-5">
	  
					<article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
                            <h1 class="uk-article-title">BAR CODE</h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead">Info o BarCode.</p>

                         
  
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
                            

 
      <form  class="uk-form" method="post" action="barcode_multi.php">
	
             <input type="text" placeholder="Šifra artikla" id="SIFRA_ARTIKLA" name="SIFRA_ARTIKLA" />
			 <select id="SIFRA_ARTIKLA" name="SIFRA_ARTIKLA" multiple name="categories[]" onclick="sendCategories(this)">
			<option value="0">Category 1</option>
			<option value="1">Category 2</option>
			<option value="2">Category 3</option>
			</select>
			 <select name="TRGOVINA">
                        <option>2101</option>
             			<option>2201</option>
						<option>2301</option>
						<option>2401</option>
						<option>2501</option>
						<option>2601</option>
						<option>2701</option>
						<option>2801</option>
						<option>2A01</option>
						<option>2B01</option>
						
                        
                    </select>
		
			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>
			</form>
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $artikal = $_POST['SIFRA_ARTIKLA'];
						$org_jed = $_POST['TRGOVINA'];

						
$barcod = sqlsrv_query($conn, "SELECT     dbo.BAR_KOD.SIFRA_BAR_KODA AS BARKOD FROM dbo.ARTIKAL INNER JOIN dbo.BAR_KOD ON dbo.ARTIKAL.SIFRA_ARTIKLA = dbo.BAR_KOD.SIFRA_ARTIKLA
								WHERE     dbo.ARTIKAL.SIFRA_ARTIKLA = '$artikal'") or die(sqlsrv_error());						
						
						
$naziv_artikla = sqlsrv_query($conn,"SELECT [NAZIV_ARTIKLA]
      
  FROM [ROBA1405].[dbo].[ARTIKAL]
WHERE [SIFRA_ARTIKLA] = '$artikal'") or die(sqlsrv_error());

$plocica = sqlsrv_query($conn, "SELECT     dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA AS Sifra, dbo.ARTIKAL.NAZIV_ARTIKLA AS Naziv, dbo.ARTIKAL.JEDINICA_MJERE AS jed_mjere, 
                      dbo.ARTIKAL_U_SKL.CIJENA_ART_U_SKL AS Cijena, dbo.BAR_KOD.SIFRA_BAR_KODA AS barkod
FROM         dbo.ARTIKAL_U_SKL INNER JOIN
                      dbo.ARTIKAL ON dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA = dbo.ARTIKAL.SIFRA_ARTIKLA INNER JOIN
                      dbo.BAR_KOD ON dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA = dbo.BAR_KOD.SIFRA_ARTIKLA
WHERE     (dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA = '$artikal') AND (dbo.ARTIKAL_U_SKL.SIFRA_ORG_JEDINICE = '$org_jed') AND (dbo.BAR_KOD.default_bar_kod = 'D')") or die(sqlsrv_error());
		
													
													}
               
?>

	   </article>
	   <hr class="uk-article-divider">
<div class="uk-panel uk-panel-box uk-panel-box-primary">
    <div class="uk-panel-badge uk-badge">Artikal</div>
	<div class="uk-grid">
    <div class="uk-width-1-1">
	 
	 <?php	  
 
	while ($naziv = sqlsrv_fetch_array($naziv_artikla)) {
    echo '<h2 class="uk-text-bold uk-article">' . $artikal ."  -  ". $naziv['NAZIV_ARTIKLA'] .  '</h2>';
	$link =$naziv['NAZIV_ARTIKLA']; 
	echo "<a href=\"http://www.robot.hr/pretrazi/?term=.$link\">"."Pretraži na www.robot.hr"."</a>";
	echo $barcod['BARKOD'];
	
}
	while ($bk = sqlsrv_fetch_array($barcod)) {
    
	$barkod = $bk['BARKOD'];
	
}




	
?>	
</div>



</div>



</div>

<div title="Printaj">

    <table class="uk-table uk-table-condensed uk-table-striped uk-table-hover">
                <thead>
                    <tr>
                        
						<th>Šifra</th>
                        <th>Naziv</th>
						<th>jedinica mjere</th>
                        <th>Cijena</th>
						<th>Barkod</th>
					
                    </tr>
                </thead>
<?php				
			
					
while ($row = sqlsrv_fetch_array($plocica, SQLSRV_FETCH_ASSOC)) {

$cijena = number_format($row['Cijena'], 2, ',', ' ');
	


echo '<tr>';

echo'<td><small class="uk-text-danger uk-text-bold">' . $row['Sifra'] . '</td></small>';
$sifra = $row['Sifra'];
echo'<td><small class="uk-text-danger uk-text-bold">' . $row['Naziv'] . '</td></small>';
$bnaziv = $row['Naziv'];
echo'<td><small class="uk-text-danger uk-text-bold">' . $row['jed_mjere'] . '</td></small>';
							
echo'<td><small>' . $cijena . '</td></small>';
echo'<td><small class="uk-text-danger uk-text-bold">' . $row['barkod'] . '</td></small>';
									

						
	    echo '</tr>';
		 echo '</table>';
		 
	 
$cijena = number_format($row['Cijena'], 2, ',', '.');
$break = $break+1;
$bnaziv = $row['Naziv'];
$sifra = $row['Sifra'];
$jed_mje =	$row['jed_mjere'];	
$barkod = $row['barkod'];
$count = $count +1;
$id_div = "barcode".$count;
$barcode_prozor ="#barcode".$count;
$id_div1 = "barcode1".$count;
$barcode_prozor1 ="#barcode1".$count;
$kn =$cijena." kn";

?>	
<div id="Printaj">
	<div class="uk-grid">
    <div class="uk-width-1-2">
	
	<canvas id="<?php echo $id_div1 ?>" width="600" height="600" style="width: 60mm;height:60mm">
   
   <script type="text/javascript">
            NacrtajEAN("<?php echo $bnaziv ?>","<?php echo $barkod ?>","<?php echo $kn ?>","<?php echo $barcode_prozor1 ?>","<?php echo $id_div1 ?>","<?php echo $jed_mje ?>","<?php echo $sifra ?>");
		
        </script>
	
   </canvas> 
   </div>
    <div class="uk-width-1-2">
   <canvas id="<?php echo $id_div ?>" width="600" height="400" style="width: 59mm;height:40mm">
   
   <script type="text/javascript">
            NacrtajPlocicu("<?php echo $bnaziv ?>","<?php echo $barkod ?>",200,90,"<?php echo $kn ?>","<?php echo $barcode_prozor ?>","<?php echo $id_div ?>","<?php echo $jed_mje ?>","<?php echo $sifra ?>");
		
        </script>
	
   </canvas>
    </div>  
	 </div>  
  
 </div>  
<?php		 
		 
		 
		 
		 
		 
		
}


sqlsrv_free_stmt($data);
?>
                    </div>
					

                </div>


            </div>
        </div>
</div>
<div title="Printaj">


</div>




</div>

   </body>
   


</html>