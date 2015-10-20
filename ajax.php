
<?php
echo "test";
		 $serverName = "192.168.50.13"; //serverName\instanceName
         $connectionInfo = array("Database" => "ROBA1505", "UID" => "sa", "PWD" => "Robot2012");
         $conn = sqlsrv_connect($serverName, $connectionInfo);


				$upit = .$_POST['TRGOVINA'];
				echo .$_POST['TRGOVINA']; 
				echo $upit;
				
                $zinc=sqlsrv_query($conn,"SELECT CONVERT(VARCHAR(20),DATUM_DOK,104) as datum , BROJ_DOKUMENTA AS BROJ_DOK, SIFRA_DOKUMENTA AS Sifra FROM dbo.DOKUMENT where ((SIFRA_ORG_UL_MED = '2101') AND (sifra_podtipa_dok = 'PRUM')) ORDER BY DATUM_DOK DESC"); 
				
				       while ($row = sqlsrv_fetch_array($zinc)) {
                 //this the value that corrspond to the selected item of the user
                        echo ' <option value="' . $row['Sifra'] . '"> ';
						
                        //this line will be visible to the user
						
                        echo $row['datum'] . "  -  " . $row['BROJ_DOK'] . ' </option> ';
				
                    }
		?>			
