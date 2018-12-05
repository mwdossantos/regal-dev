<?php

    include 'chromeLogger.php';

    $staffFile = "data/staffs.json";
    $jsondata = file_get_contents($staffFile);
    $staffData = json_decode($jsondata);
    $staffHTML = "";

    if (empty($staffData->staffs)) {
        // Start building up the HTML
        // Empty roster
        // PUT SOME STUFF HERE
    } else {

        $staffHTML .= '<div class="team-row"><div class="team-container">';

        foreach ($staffData->staffs as $key => $staff) {
            $staffHTML .= '
            <div class="team-item" style="background-image: url(staffImages/'.$staff->image.')!important">
                <h1 class="team-title white">'.$staff->title.'</h1>
            </div>
            <div class="team-member-holder mobile-edit">';
            
            foreach ($staff->members as $key2 => $member) {
                # code...
                $staffHTML .= '
                <div class="team-member-container">
                    <div class="team-member" style="background-image: url(staffImages/members/'.$member->image.')!important">
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

                if ((count($staff->members) - 1) == $key2) {
                } else {
                    $staffHTML .= '<div class="blank-divider"></div>';
                }
            }


            $staffHTML .= "</div></div></div>";
            if ((count($staffData->staffs) - 1) == $key) {
                ChromePhp::Log("End has been found");

            } else {
                ChromePhp::Log("End has not been found");

                $staffHTML .= '
                <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                </div>';
            }
        }

    }


    echo $staffHTML;
?>