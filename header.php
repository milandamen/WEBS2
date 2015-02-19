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
		<?php
			$persoon = 'corina';
			$baseurl = ($persoon === 'milan') ? 'http://localhost/webs2/hw/' : 'http://localhost/WEBS2/WEBS2/';
		?>
		<base href="<?php echo $baseurl ?>" src="<?php echo $baseurl ?>">
		<link rel="stylesheet" type="text/css" href="css/mainstyles.css" />
		<link rel="stylesheet" type="text/css" href="css/product.css" />
		<link rel="stylesheet" type="text/css" href="css/shoppinglist.css" />
	</head>
	<body>
		<div id="maincontent">
			<div id="header">
			<div id="headerbar">
				<img id="logo" src="img/logo.png"/>
				<img id="headerimg" src="img/bier.jpg"/>


			</div>
			<?php include('menu.php'); ?>

		</div>
			