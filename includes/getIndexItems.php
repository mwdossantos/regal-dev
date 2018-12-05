<?php 

$file = "data/store.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";

$html .= '
<div class="block-row">
<div class="block block-align-left store  grow-2" style="background-image: url(apperalImages/'.$data->options->promoImage.')">
<div class="block-text white">
  <p class="block-title">Dress like the best</p>
  <p class="block-subtitle">Shop our latest apparel</p>
</div>
<div class="button regal-blue store">Shop now</div>
</div>
<div class="blank-divider"></div>
<div class="block block-align-right partners block-partners-image ">
<div class="block-text white">
  <p class="block-title">Our partners</p>
  <p class="block-subtitle">See what keeps us running</p>
</div>
<div class="button regal-blue partners">See more</div>
</div>
</div>
';


echo $html;