<?php 

include_once 'assets/database_lib.php'; 
include_once 'pages/shoplist/actions/functions.php'; 
date_default_timezone_set('UTC');

$wishlist =0;
$shoplist =0;


$db = new db();

// Zorg dat hier via de session en user een current_user_id is op te halen!!!! //
$result = $db->execQuery('SELECT u.id as id,
							c.number as cart, 
							w.number as wish
							FROM user as u
							LEFT JOIN wishlist as w
							ON u.id = w.user_id
							LEFT JOIN cart as c
							ON u.id = c.user_id
							WHERE u.id LIKE 3',
						array(), db::FETCH_OBJ);

$db->dbClose();


foreach($result as $item){
		$wishlist += $item -> wish;
		$shoplist += $item -> cart;
}


    ?>
<div id="sidebar">

<ul class="sidewidget">
	<li><a href="pages/login.php"> Inloggen </a></li>
	<li><a href="pages/shoplist/wishlist.php">  Verlanglijstje (<?php echo $wishlist; ?>) </a></li>
	<li><a href="pages/shoplist/index.php">  Winkelmandje (<?php echo $shoplist; ?>)  </a></li>

	<br/><br/>
<!-- Hieronder alleen zichtbaar maken als gast ingelogd is.  -->
	<li><a href="pages/account/index.php">  Mijn gegevens </a></li>
	<li><a href="pages/account/userhistory.php">  Mijn historie </a></li>

</ul>

</div>