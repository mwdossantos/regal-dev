<?php

    include 'chromeLogger.php';
    $file = "data/partners.json";
    $jsondata = file_get_contents($file);
    $data = json_decode($jsondata);
    $html = "";
    if (empty($data->partners)) {
        $html .= '
        <div class="team-item partner-item">
            <h2 style="color:white">We do not have any partners yet..</h2>
        </div>
        <div class="blank-divider-horizontal"></div>
        ';
    } else {
        foreach ($data->partners as $key => $partner) {
            $html .= '
            <a href="'.$partner->url.'">
            <div class="team-item partner-item" style="background-image:url(partnerImages/'.$partner->image.')">
            <img src="partnerImages/logos/'.$partner->logo.'" alt="partnerlogo">
            </div>
            <div class="blank-divider-horizontal"></div>
            </a>
            ';
        }
    }

    echo $html;
?>