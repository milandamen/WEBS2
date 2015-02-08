<?php 

$wishlist = 0;
$shoplist = 0;

    ?>
<div id="sidebar">

<ul class="sidewidget">
<li><a href="#"> Inloggen </a></li>
<li><a href="#">  Verlanglijstje (<?php echo $wishlist; ?>) </a></li>
<li><a href="#">  Winkelmandje (<?php echo $shoplist; ?>)  </a></li>

<br/><br/>
<!-- Hieronder alleen zichtbaar maken als gast ingelogd is.  -->
<li><a href="#">  Mijn gegevens </a></li>
<li><a href="#">  Mijn historie </a></li>

</ul>



</div>