<!DOCTYPE html> 
<html> 
<head> 
	<title>Page Title</title> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
	$(document).bind("mobileinit", function(){
  		$.mobile.ajaxLinksEnabled = false;
                $.mobile.ajaxFormsEnabled = false;
                $.mobile.ajaxEnabled = false;
	});
	</script>	
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

	<link rel="stylesheet" href="<?php echo ASSETSPATH;?>css/custom.css" />	
</head> 
<body> 
<div data-role="page"> <!-- soh termina no footer -->
	
