$(document).ready(function() { 

    setInterval(function () {
        if ($('#team-image-name').val() == "") {
            $('#drop-area-team').hide('fast');
        } else {
            $('#drop-area-team').show('fast');
        }
    },100)


    $("#drop-area-team").dmUploader({
        url: 'includes/uploadTeamImage.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#team-image-name').val()
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
          console.log('Callback: Plugin initialized');
        },
        onUploadComplete: function () {
            alert($('#team-image-name').val() + " team has been created");
        },
        onUploadError: function () {
            alert("Upload failed");
        }
      });




}); 


function saveTeamMember () {

    console.log($('#member-name').val());
    console.log($('#team-select').val());
    console.log($('#member-twitter').val());
    console.log($('#member-youtube').val());
    console.log($('#member-email').val());

    $("#drop-area-member").dmUploader({
        url: 'includes/createNewTeamMember.php',
        multiple: false,
        queue: false,
        auto: false,
        extraData: function() {
            return {
              "name": $('#member-name').val(),
              "gameName": $('#team-select').val(),
              "twitterHandle": $('#member-twitter').val(),
              "youtubeHandle": $('#member-youtube').val(),
              "emailHandle": $('#member-email').val(),
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
          console.log('Callback: Plugin initialized');
        },
        onUploadComplete: function () {
            alert($('#member-name').val() + " has been added to " + $('#team-select').val());
        },
        onUploadError: function () {
            alert("Upload failed");
        }
      });
}