<?php

    include 'chromeLogger.php';

    $file = "data/store.json";
    $jsondata = file_get_contents($file);
    $data = json_decode($jsondata);
    $html = "";



    if (empty($data->groups)) {
        $html .= '
        <div class="promo-row">
            <h2 style="color: white;">The store is currently empty</h2>
        </div>
        ';
    } else {

        $html .= '
        <div class="promo-row">
            <div style="background-image:url(apperalImages/'.$data->options->promoImage.')" class="promo"></div>
        </div>
        ';

        foreach ($data->groups as $key => $group) {
            $html .= '
            <h2 class="white big-title store-title">'.$group->title.'</h2>
            <div class="store-items-row mobile-edit">
            ';
            
            foreach ($group->items as $key2 => $item) {
                # code...
                $html .= '
                <div class="store-item-container">
                    <div class="store-card" style="background-image: url(apperalImages/items/'.$item->image.');">
                    <a href="'.$item->url.'"><div class="button regal-blue">View on Aporia</div></a>
                    </div>
                    <p class="store-card-title white">'.$item->name.'</p>
                    <p class="store-card-price white">$ '.$item->price.'</p>
                </div>
                ';
                // Check if its the last member or nah

                if ((count($group->items) - 1) == $key2) {
                } else {
                    $html .= '<div class="blank-divider"></div>';
                }
            }


            $html .= "</div></div></div>";
            if ((count($data->groups) - 1) == $key) {

            } else {

                $html .= '
                <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                </div>';
            }
        }

    }


    echo $html;
?>