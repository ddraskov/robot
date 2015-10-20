<?php
$serverName = "192.168.50.13"; //serverName\instanceName
$connectionInfo = array("Database" => "ROBA1505", "UID" => "sa", "PWD" => "Robot2012","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
 
 $term=$_GET["term"];

 $query=sqlsrv_query($conn,"SELECT CONVERT(VARCHAR(20),DATUM_DOK,104) as datum , BROJ_DOKUMENTA AS BROJ_DOK, SIFRA_DOKUMENTA AS Sifra FROM dbo.DOKUMENT where ((SIFRA_ORG_UL_MED = '2101') AND (sifra_podtipa_dok = 'PRUM') AND (BROJ_DOKUMENTA LIKE '%".$term."%')) ORDER BY DATUM_DOK DESC");
 $json=array();
 
    while($dokument=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
         $json[]=array(
                    'value'=> $dokument["Sifra"],
                    'label'=> $dokument["BROJ_DOK"]." - ".$dokument["datum"]
                        );
    }
 
 echo json_encode($json);
 
?>