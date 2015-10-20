<html>
   <head>
		<meta charset="cp1250">
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<script src="dist/js/uikit.min.js"></script>
		<script src="js/jquery-2.1.1.js"></script>

	
		<script src="js/jquery-ui-1.10.4.custom.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/barcode.print.css" rel="stylesheet">
		<link href="css/uikit.almost-flat.min.css" rel="stylesheet">
		 
	   

<script type="text/javascript" src="js/jquery-barcode.js"></script>
<script type="text/javascript" src="js/ean_plocica.js"></script>

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
  newWin.document.write(divToPrint.outerHTML);
  newWin.focus();
  newWin.print();
  newWin.close();
} 
//--> 
</script> 

<script language="JavaScript" type="text/javascript">
	$(document).ready(function() {  
				$('#VRSTA_DOK').change(function (){
				
				
				
			
				});
				});
	</script>
	
<script language="JavaScript" type="text/javascript">
	$(document).ready(function() {  
				
				$('#TRG').change(function (){
				var x_value=$("#TRG").val();
				var vrsta_dok=$("#VRSTA_DOK").val();
				switch (vrsta_dok) {
				case "Ulazna međuskladišnica":
				vrsta_dok = "MUL";
				break;
				case "Zapisnik o izmjeni prodajnih cijena":
				vrsta_dok = "ZIMC";
				break;
				case "Primka":
				vrsta_dok = "PRDR";
				break;
				}
			

				
				$.ajax({
				url:'test.php',
				data:{ "VRSTA_DOK" : vrsta_dok, "TRGOVINA" : x_value  },
				type: 'POST',
				success : function(resp){
					$("#DO").html(resp);               
					},
				error : function(resp){}
				});
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
                            <li><a href="barcode3.php">Print barcode po dokumentu</a></li>
                            
                           
                          
							<li class="uk-nav-header">POS BackOffice</li>
							<li><a href="rekapitulacija_mal.php">Rekapitulacija Maloprodaje</a></li>
							
							<li class="uk-nav-header">SUSTAV</li>
							<li><a href="prava.php">Prava po djelatniku</a></li>
                            
                        </ul>
</div>
                    </div>
                    <div  class="tm-main uk-width-medium-4-5">
	  
					<article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
                            <h1 class="uk-article-title">ISPIS BAR CODE-a </h1>
							

                            <p class="uk-article-lead""></p>
							
						


                            <p class="uk-article-lead">Print barcode po dokumentu.</p>

                         
  
   <?php
                //set up mysql connection
                $serverName = "192.168.50.13"; //serverName\instanceName
                $connectionInfo = array("Database" => "ROBA1405", "UID" => "sa", "PWD" => "Robot2012");
                $conn = sqlsrv_connect($serverName, $connectionInfo);


                if ($conn) {
                $zinc=sqlsrv_query($conn,"SELECT CONVERT(VARCHAR(20),DATUM_DOK,104) as datum , BROJ_DOKUMENTA AS BROJ_DOK, SIFRA_DOKUMENTA AS Sifra FROM dbo.DOKUMENT where ((SIFRA_ORG_UL_MED = '2101') AND (sifra_podtipa_dok = 'PRUM')) ORDER BY DATUM_DOK DESC");   
                } else {
                    echo "Ne mogu se povezati na bazu.<br />";
                    die(print_r(sqlsrv_errors(), true));
                }
 ?>
                            

 
      <form  class="uk-form" method="post" action="barcode_js.php">
	
            <select name="VRSTA_DOK" id="VRSTA_DOK" data-uk-tooltip title="Odaberi vrstu dokumenta">
					<option>Vrsta dokumenta</option>
					<option>Ulazna međuskladišnica</option>
					<option>Zapisnik o izmjeni prodajnih cijena</option>
					<option>Primka</option>
				</select>
				
			 <select name="TRGOVINA" id="TRG" data-uk-tooltip title="Odaberi ORG. Jedinicu ">
						<option>ORG. Jedinica</option>
                        <option>2101</option>
             			<option>2201</option>
						<option>2301</option>
						<option>2401</option>
						<option>2501</option>
						<option>2601</option>
						<option>2801</option>
						<option>2A01</option>
						<option>2B01</option>
						<option>2C01</option>
						<option>2D01</option>
						<option>2G01</option>
						<option>2k01</option>
				   
                    </select>
					
					
					
			   <select name="DOKUMENT" id="DO">
			   <span data-uk-tooltip="" title="" data-cached-title="Pokreniupit"></span>
               <option>Broj dokumenta</option>
				</br>
         
            </select>	
			
					
			
		
			 <button class="uk-button uk-button-primary" data-uk-tooltip="{pos:'bottom-left'}" title="Pokreni Upit" name="submit" type="submit">Pokreni</button>
			</form>
			<div class="uk-form-controls">
                 
                  <input type="radio" id="form-s-r1" name="radio"> <label for="form-s-r1">Plocica   </label>
                   <label><input type="radio" name="radio">Plocica 2   </label>
                
             </div>
			  <?php
                    if (isset($_POST['submit'])) {
					
                        $sif_dok = $_POST['DOKUMENT'];
						$org_jed = $_POST['TRGOVINA'];

						
$barcod = sqlsrv_query($conn, "SELECT     dbo.BAR_KOD.SIFRA_BAR_KODA AS BARKOD FROM dbo.ARTIKAL INNER JOIN dbo.BAR_KOD ON dbo.ARTIKAL.SIFRA_ARTIKLA = dbo.BAR_KOD.SIFRA_ARTIKLA
								WHERE     dbo.ARTIKAL.SIFRA_ARTIKLA = '$artikal'") or die(sqlsrv_error());						
						
						
$naziv_artikla = sqlsrv_query($conn,"SELECT [NAZIV_ARTIKLA]
      
  FROM [ROBA1405].[dbo].[ARTIKAL]
WHERE [SIFRA_ARTIKLA] = '$artikal'") or die(sqlsrv_error());

$plocica = sqlsrv_query($conn, "SELECT     dbo.STAVKA.SIFRA_ARTIKLA AS sifra, dbo.STAVKA.PROD_CIJENA_STAVKE AS Cijena, dbo.ARTIKAL.NAZIV_ARTIKLA AS Naziv, 
                      dbo.ARTIKAL.JEDINICA_MJERE AS Jedinica, dbo.BAR_KOD.SIFRA_BAR_KODA AS barkod
FROM         dbo.STAVKA INNER JOIN
                      dbo.ARTIKAL ON dbo.STAVKA.SIFRA_ARTIKLA = dbo.ARTIKAL.SIFRA_ARTIKLA LEFT OUTER JOIN
                      dbo.BAR_KOD ON dbo.STAVKA.SIFRA_ARTIKLA = dbo.BAR_KOD.SIFRA_ARTIKLA
WHERE     (dbo.STAVKA.SIFRA_DOKUMENTA = '$sif_dok') AND (dbo.BAR_KOD.default_bar_kod = 'D')") or die(sqlsrv_error());
		
													
													}
													
               
?>


	   </article>
	   <hr class="uk-article-divider">

 



	



 
    

<?php				
			
$count =0;
$break =0;	
echo "<div id=\"Printaj\">";			
while ($row = sqlsrv_fetch_array($plocica, SQLSRV_FETCH_ASSOC)) {

$cijena = number_format($row['Cijena'], 2, ',', '.');
$break = $break+1;
$bnaziv = $row['Naziv'];
$sifra = $row['sifra'];
$jed_mje =	$row['Jedinica'];	
$barkod = $row['barkod'];
$count = $count +1;
$id_div = "barcode".$count;
$barcode_prozor ="#barcode".$count;
$kn =$cijena." kn";

?>	
   <canvas id="<?php echo $id_div ?>" width="600" height="400" style="width: 59mm;height:40mm">
   
   <script type="text/javascript">
            NacrtajPlocicu("<?php echo $bnaziv ?>","<?php echo $barkod ?>",200,90,"<?php echo $kn ?>","<?php echo $barcode_prozor ?>","<?php echo $id_div ?>","<?php echo $jed_mje ?>","<?php echo $sifra ?>");
		
        </script>
	
   </canvas>

<?php
	
	
		if ($break % 16 ==0) {
		echo "<p style=\"page-break-after:always;\"></p>";
		}



	
}
echo "</div>";

sqlsrv_free_stmt($data);
?>
	
	 </div>
	<hr class="uk-article-divider">
	
	
		

               
            </div>
 </div>
</div>


</body>
   


<html>