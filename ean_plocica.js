function NacrtajPlocicu(var1,var2,var3,var4,var5,var6,var7,var8,var9) {
var c=document.getElementById(var7);
var ctx=c.getContext("2d");
ctx.rect(0,0,600,400);
ctx.stroke();
ctx.font="36px Roboto Condensed";
ctx.fillText(var1,5,50);
ctx.font="24px Roboto Condensed";
$(var6).barcode(
			var2, // Value barcode (dependent on the type of barcode)
			"ean13",{barWidth:3, barHeight:100,moduleSize:2,bgColor"transparent",fontSize:10,output:"canvas",posX:var3,posY:var4}// type (string)
				);
ctx.font="86px Arial Bold";
ctx.fillText(var5,50,300);
ctx.font="36px Open Sans";
ctx.fillText(var8,505,370);
ctx.font="42px Open Sans";
ctx.fillText(var9,50,370);

// Green rectangle
ctx.beginPath();
ctx.lineWidth="1";
ctx.strokeStyle="#000000";
ctx.rect(0,0,600,64);
ctx.stroke();


}
