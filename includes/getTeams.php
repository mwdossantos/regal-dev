<?php

    include 'chromeLogger.php';

    $teamFile = "data/teams.json";
    $jsondata = file_get_contents($teamFile);
    $teamData = json_decode($jsondata);
    $teamHTML = "";

    if (empty($teamData->teams)) {
        $teamHTML .= '<h2 style="color: white">There are no teams</h2>';

    } else {

        $teamHTML .= '<div class="team-row"><div class="team-container">';

        foreach ($teamData->teams as $key => $team) {
            $teamHTML .= '
            <div class="team-item" style="background-image: url(teamImages/'.$team->image.')!important">
                <img src="teamImages/logos/'.$team->logo.'" style="filter: invert(1)" alt="teamlogo">
            </div>
            <div class="team-member-holder mobile-edit">';
            
            foreach ($team->members as $key2 => $member) {
                # code...
                $teamHTML .= '
                <div class="team-member-container">
                    <div class="team-member" style="background-image: url(teamImages/members/'.$member->image.')!important">
                        <div class="social-icon-holder">
                            <a href="https://twitter.com/'.str_replace("@","",$member->twitterHandle).'"><div class="social-icon-team-member regal-blue twitter-member"></div></a>
                            <a href="mailto:'.$member->emailHandle.'"><div class="social-icon-team-member regal-blue mail-member"></div></a>
                            <a href="'.$member->youtubeHandle.'"><div class="social-icon-team-member regal-blue yt-member"></div></a>
                        </div>
                    </div>
                    <p class="team-member-name white">'.$member->name.'</p>
                    <p class="team-member-username white">'.$member->twitterHandle.'</p>
                </div>
                ';
                // Check if its the last member or nah

                if ((count($team->members) - 1) == $key2) {
                } else {
                    $teamHTML .= '<div class="blank-divider"></div>';
                }
            }


            $teamHTML .= "</div></div></div>";
            if ((count($teamData->teams) - 1) == $key) {
                ChromePhp::Log("End has been found");

            } else {
                ChromePhp::Log("End has not been found");

                $teamHTML .= '
                <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                </div>';
            }
        }

    }


    echo $teamHTML;
?>