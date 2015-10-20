
<html>
   <head>
		<meta charset="cp1250">
	</head>	
<?php

$upit = $_POST['RADNIK'];


		$serverName = "192.168.50.13"; //serverName\instanceName
         $connectionInfo = array("Database" => "SUSTAV", "UID" => "sa", "PWD" => "Robot2012");
         $conn = sqlsrv_connect($serverName, $connectionInfo);
		 $zinc=sqlsrv_query($conn,"SELECT dbo.KORISNIK_U_GRUPI.Sifra_grupe AS Sifra_gr, dbo.KORISNIK_U_GRUPI.Sifra_korisnika AS Korisnik, dbo.GRUPA.Naziv_grupe AS Naziv_gr
FROM         dbo.KORISNIK_U_GRUPI INNER JOIN
                      dbo.GRUPA ON dbo.KORISNIK_U_GRUPI.Sifra_grupe = dbo.GRUPA.Sifra_grupe
WHERE     (dbo.KORISNIK_U_GRUPI.Sifra_korisnika = '$upit')") or die(sqlsrv_error());
			
				       while ($row = sqlsrv_fetch_array($zinc)) {
			
                   echo ' <option value="' . $row['Sifra_gr'] . '"> ';
						
                        //this line will be visible to the user
						
                        echo $row['Naziv_gr'] .' </option> ';
				
                    }

?>