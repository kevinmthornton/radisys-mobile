<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Radisys Mobile <?php print $PageTitle; ?> </title>
<!-- the meta below does a few things with scaling. it lets the user scale but, for the oreientation auto scale, i set the max scale to 1.0 so that 
when you flip the phone, it doesn't 'auto' scale and zoom in. thus keeping the size proper. the javascript doesn't appear to work. when you flip around, it works fine but,
when you go back to 0, it gives all three cases. not sure why.  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" rev="stylesheet" href="css/mobile.css" type="text/css" media="all" charset="utf-8" title="final" />

<script language="Javascript">
//window.onorientationchange = 

function ChangeOrientation() {
var orientation = window.orientation;
	//alert(orientation);
	switch(orientation) {
		case 0:
			 //Portrait mode
			 //alert("Portrait mode");
		case 90: 
			 // Landscape left
			 //alert("Landscape left");
		case -90:
			 //Landscape right
			 //alert("Landscape right");
	}
}

</script>
</head>
<body onorientationchange="ChangeOrientation()">
<a href="index.php"><img src="images/logo.png" width="135" height="38" alt="logo" /></a>
<div id="TopRight"><a href="contact-us.php">Contact Us</a></div>