<?php

$file = "data/pages.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";

$html .= '
<div class="socials">
    <a href="'.$data->socialIcons->twitter.'" target="_blank"><img src="css/twitter.png" class="social-icon twitter" alt="social-icon"></a>
    <a href="mailto:'.$data->socialIcons->email.'"><img src="css/mail.png" class="social-icon mail" alt="social-icon"></a>
    <a href="'.$data->socialIcons->youtube.'" target="_blank"><img src="css/yt.png" class="social-icon yt" alt="social-icon"></a>
</div>
';


echo $html;


