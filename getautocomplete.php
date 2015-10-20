<?php
$serverName = "192.168.50.13"; //serverName\instanceName
$connectionInfo = array("Database" => "ROBA1505", "UID" => "sa", "PWD" => "Robot2012","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
 
 $term=$_GET["term"];

 $query=sqlsrv_query($conn,"SELECT * FROM ARTIKAL where (AKTIVAN_ARTIKAL ='D' AND FLAG_USLUGA !='D') AND SIFRA_ARTIKLA like '".$term."%' order by SIFRA_ARTIKLA");
 $json=array();
 
    while($student=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
         $json[]=array(
                    'value'=> $student["SIFRA_ARTIKLA"],
                    'label'=>$student["SIFRA_ARTIKLA"]." - ".$student["NAZIV_ARTIKLA"]
                        );
    }
 
 echo json_encode($json);
 
?>