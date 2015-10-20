
<html>
   <head>
		<meta charset="cp1250">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,latin-ext);' rel='stylesheet' type='text/css'>
		<meta charset="cp1250">
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

		<script src="js/jquery-2.1.1.js"></script>

	

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/barcode.print.css" rel="stylesheet">
		<link href="css/uikit.almost-flat.min.css" rel="stylesheet">
<?php
$barkod = "3858886090045";
?>		 
	   

<script type="text/javascript" src="js/jquery-barcode.js"></script>


<script language="JavaScript" type="text/javascript"> 
<!-- 
function Print(){ 
  var divToPrint=document.getElementById('Printaj');
  newWin= window.open("barkodovi");
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/uikit.almost-flat.min.css\" type=\"text/css\"/>" );
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/barcode.print.css\" type=\"text/css\"/>" );
  newWin.document.write(divToPrint.outerHTML);
  newWin.focus();
  newWin.print();
  newWin.close();
} 
//--> 
</script>


 <script>

  
function NacrtajPlocicu(var1,var2,var3,var4,var5,var6,var7,var8) {
var c=document.getElementById(var7);
var ctx=c.getContext("2d");
ctx.rect(0,0,600,400);
ctx.stroke();
ctx.font="36px Roboto Condensed";
ctx.fillText(var1,5,50);
ctx.font="20px Roboto Condensed";
$(var6).barcode(
			var2, // Value barcode (dependent on the type of barcode)
			"ean13",{barWidth:3, barHeight:100,moduleSize:2,fontSize:10,output:"canvas",posX:var3,posY:var4}// type (string)
				);
ctx.font="86px Arial Bold";
ctx.fillText(var5,50,300);
ctx.font="36px Open Sans";
ctx.fillText(var8,505,370);

// Green rectangle
ctx.beginPath();
ctx.lineWidth="1";
ctx.strokeStyle="#000000";
ctx.rect(0,0,600,64);
ctx.stroke();


}
</script>	
 
</head>
   <body class="tm-background">
				<div class="uk-container uk-container-center">
   <div class="uk-grid">
    <div class="uk-width-1-3">
 <?php
$id = "PLOCICA"; 

?>  
   <canvas id="PLOCICA" width="600" height="400" style="width: 59mm;height:40mm">
   
   <script type="text/javascript">
            NacrtajPlocicu("ZDJELICA 14CM, PORCULAN 407","3858886098218",200,90,"295,00 kn","#PLOCICA","<?php echo $id ?>","KOM");
			
        </script>
	
   </canvas>
   </div>
     <div class="uk-width-1-3">
  
   <canvas id="PLOCICA1" width="600" height="400" style="width: 59mm;height:40mm;border:1px solid">
   
   <script type="text/javascript">
            NacrtajPlocicu("ZDJELICA 14CM, PORCULAN 407","3858886098218",200,90,"295,00 kn","#PLOCICA1","PLOCICA1","KOM");
			
        </script>
	
   </canvas>
  </div>
    <div class="uk-width-1-3">
  
   <canvas id="PLOCICA2" width="600" height="400" style="width: 59mm;height:40mm;border:1pt solid">
   
   <script type="text/javascript">
            NacrtajPlocicu("Nemam pojma neka ŠIFRA PROIZVODA","3858886098318",200,90,"125,00 kn","#PLOCICA2","PLOCICA2","KOM");
			
        </script>
	
   </canvas>
</div>
  
</div>
  </div>
   </canvas>


	
	

   
   
   </body>
</html>  

 
   