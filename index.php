<html>
   <head>
		
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
   </head>
   <body class="tm-background">
        <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <a class="uk-navbar-brand uk-hidden-small" href="index.php"><img class="uk-margin uk-margin-remove" src="logoR.png" width="90" height="30" title="ROBOT" alt="ROBOT"></a>

                <ul class="uk-navbar-nav uk-hidden-small">
                    <li class="uk-active"><a href="index.php">PO�ETNA</a></li>


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
							<li><a href="index.php">Stanje artikla na skladi�tima</a></li>
							<li class="uk-nav-header">MAL. RA�UNI</li>
                            <li><a href="po_artiklu2.php">Pretraga po artiklu</a></li>
							 <li><a href="racun_pu.php">Pretraga ra�una PU format</a></li>
							<li><a href="racun_mp.php">Pretraga mal.ra�una </a></li>
							<li class="uk-nav-header">BARKODOVI</li>
							<li><a href="barcode.php">Print barcode</a></li>
                            <li><a href="barcode4.php">Print barcode po dokumentu</a></li>
							 <li><a href="barcode_js.php">Barcode v2.0</a></li>



							<li class="uk-nav-header">POS BackOffice</li>
							<li><a href="rekapitulacija_mal.php">Rekapitulacija Maloprodaje</a></li>
							<li><a href="posbo_placanje.php">Rekapitulacija po vrsti pla�anja</a></li>

							<li class="uk-nav-header">SUSTAV</li>
							<li><a href="prava.php">Prava po djelatniku</a></li>

                        </ul>
</div>
                    </div>
                    <div class="tm-main uk-width-medium-4-5">

					<article class="uk-article">
							<img class="uk-align-medium-right" src="logoR.png" alt="">
                            <h1 class="uk-article-title">Info PULT</h1>


                            <p class="uk-article-lead""></p>




                            <p class="uk-article-lead">Upit o stanju artikla na skladi�tu.</p>



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

             <input data-uk-tooltip title="Odaberi �ifru artikla.Pretra�ivnje po slovu �ifre" type="text" placeholder="�ifra artikla" id="SIFRA_ARTIKLA" name="SIFRA_ARTIKLA" />

			 <button class="uk-button uk-button-primary" name="submit" type="submit">Pokreni</button>

			  <?php
                    if (isset($_POST['submit'])) {

                        $artikal = $_POST['SIFRA_ARTIKLA'];

                    ?>
      </form>






<?php

 $data = sqlsrv_query($conn, "SELECT     dbo.ARTIKAL_U_SKL.SIFRA_ARTIKLA, dbo.ARTIKAL.NAZIV_ARTIKLA, dbo.ORG_JEDINICA.KRATKI_NAZIV_OJ,dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE,
                      CONVERT(varchar(12),dbo.ARTIKAL_U_SKL.CIJENA_ART_U_SKL) AS CIJENA, dbo.ARTIKAL_U_SKL.KOLICINA_U_SKL, CONVERT(varchar(12),dbo.ARTIKAL_U_SKL.REZERVIRANA_KOL) AS REZERVIRANO,
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
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '2k01'
OR dbo.ORG_JEDINICA.SIFRA_ORG_JEDINICE = '1101'))
						ORDER BY dbo.ORG_JEDINICA.KRATKI_NAZIV_OJ") or die(sqlsrv_error());

$barcod = sqlsrv_query($conn, "SELECT     dbo.BAR_KOD.SIFRA_BAR_KODA AS BARKOD FROM dbo.ARTIKAL INNER JOIN dbo.BAR_KOD ON dbo.ARTIKAL.SIFRA_ARTIKLA = dbo.BAR_KOD.SIFRA_ARTIKLA
								WHERE     dbo.ARTIKAL.SIFRA_ARTIKLA = '$artikal'") or die(sqlsrv_error());


$naziv_artikla = sqlsrv_query($conn,"SELECT [NAZIV_ARTIKLA]

  FROM [ROBA1405].[dbo].[ARTIKAL]
WHERE [SIFRA_ARTIKLA] = '$artikal'") or die(sqlsrv_error());
                    }

?>

	   </article>
	   <hr class="uk-article-divider">
<div class="uk-panel uk-panel-box uk-panel-box-primary">
    <div class="uk-panel-badge uk-badge">Artikal</div>
	<div class="uk-grid">
    <div class="uk-width-2-3">

	 <?php

	while ($naziv = sqlsrv_fetch_array($naziv_artikla)) {
    echo '<h2 class="uk-text-bold uk-article">' . $artikal ."  -  ". $naziv['NAZIV_ARTIKLA'] .  '</h2>';
	$link =$naziv['NAZIV_ARTIKLA'];
	echo "<a href=\"http://www.robot.hr/pretrazi/?term=.$link\" target=\"_blank\">"."Pretra�i na www.robot.hr"."</a>";
	echo $barcod['BARKOD'];

}
	while ($bk = sqlsrv_fetch_array($barcod)) {

	$barkod = $bk['BARKOD'];

}





?>
</div>
<div class="uk-width-1-3" id="bcTarget">





<div id="demo">
<script language="JavaScript" type="text/javascript">
var MyJSStringVar = "<?php Print($barkod); ?>";

$("#demo").barcode(
MyJSStringVar, // Value barcode (dependent on the type of barcode)
"ean13",{barWidth:2, barHeight:60}// type (string)
);
</script>

</div>


</div>



</div>
</div>

<div title="printMe">
    <table name="printMe" class="uk-table uk-table-condensed uk-table-striped uk-table-hover">
                <thead>
                    <tr>

						<th>Skladi�te</th>
                        <th>Cijena</th>

                        <th>Koli�ina</th>

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
						echo'<td><small class="uk-text-warning">' . $row['KRATKI_NAZIV_OJ'] . '</td></small>';

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

            </div>
        </div>
</div>
   </body>

<html>
