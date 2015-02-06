<?php
	// If you set $pagetitle on a page before calling the header, the value in that variable will be put in the title. If the variable is not set, 
	if (!array_key_exists('pagetitle', $GLOBALS)) {
		global $pagetitle;
		$pagetitle = 'Home - ';
	} else {
		$pagetitle .= ' - ';
	}
?>
<html>
	<head>
		<title><?php echo $pagetitle ?>110% Echt Bier!</title>
		<base href="http://localhost/webs2/hw/">
		<link rel="stylesheet" type="text/css" href="css/mainstyles.css" />
	</head>
	<body>
		
	</body>
</html>