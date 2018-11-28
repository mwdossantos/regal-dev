<?php

    include 'chromeLogger.php';

    $newsFile = "data/news.json";
    $jsondata = file_get_contents($newsFile);
    $newsData = json_decode($jsondata);

    foreach ($newsData->articles as $newsItem) {

    ChromePhp::log($newsData);

        // Start building up the HTML
        $newsHTML .= '<div class="news-row">';
        $newsHTML .= '<div class="news-item">';

        // Image
        $newsHTML .= '<div style="background-image:url('.$newsItem->newsImage.')!important" class="news-image teamwin"></div>';
        $newsHTML .= '<div class="news-content">';

        // Title
        $newsHTML .= '<h2 class="news-title">'.$newsItem->title.'</h2>';
        $newsHTML .= '<div class="news-divider"></div>';

        // Body
        $newsHTML .= '<p class="news-text">'.$newsItem->body.'</p>';

        // Image 
        $newsHTML .= '<img src="'.$newsItem->images[0].'" class="news-content-image" alt="'.$newsItem->images[0].'">';

        // Date
        $newsHTML .= '<p class="news-date">'.$newsItem->date.'</p>';

        // Author
        $newsHTML .= '<p class="news-author">Written by '.$newsItem->author.'</p>';

        $newsHTML .= '</div></div></div>';

        // Divider 

        $newsHTML .= '
            <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        ';
    }

    echo $newsHTML;
?>