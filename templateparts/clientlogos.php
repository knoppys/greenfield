<div>
<h2>Some of our BIG brand clients</h2>
<?php
$bbclients = get_field('big_brand_clients',20);
$i = 0;
foreach ($bbclients as $client) { 

	if ($i == 0) {echo '<div class="row">';}
	echo '<div class="col-xs-6"><img src="'.$client['bb_logo'].'"></div>';
	if ($i == 1) {echo '</div>';}
	$i++;
	
}?>
</div>
<div>
<h2>Some of our SME clients</h2>
<?php
$bbclients = get_field('sme_clients',20);
$i = 0;
foreach ($bbclients as $client) { 

	if ($i == 0) {echo '<div class="row">';}
	echo '<div class="col-xs-6"><img src="'.$client['sme_logo'].'"></div>';
	if ($i == 1) {echo '</div>';}
	$i++;
	
}?>
</div>

