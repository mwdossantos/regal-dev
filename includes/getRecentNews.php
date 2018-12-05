<?php


    $newsFile = "data/news.json";
    $jsondata = file_get_contents($newsFile);
    $newsData = json_decode($jsondata);
    $newsHTML = "";

    if (empty($newsData->articles)) {
        // Start building up the HTML
        $newsHTML .= '
        <div class="swiper-slide">
            <div class="swiper-slide-container">
            <p class="swiper-title">There are currently no news articles</p>
            </div>
        </div>
        ';
    } else {
        
        foreach ($newsData->articles as $key => $newsItem) {

            if ($newsItem->public == true) {
                $newsHTML .= '
                <div class="swiper-slide">
                    <div class="swiper-slide-container" style="background-image: url(newsImages/'.$newsItem->newsImage.')">
                    <p class="swiper-title">'.$newsItem->title.'</p>
                    <div class="button regal-blue">Read more</div>
                    </div>
                </div>
                ';
            }
        }
    }


    echo $newsHTML;
?>