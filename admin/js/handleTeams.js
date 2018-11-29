$(document).ready(function() { 

    setInterval(function () {
        if ($('#team-image-name').val() == "") {
            $('#drop-area-team').hide('fast');
        } else {
            $('#drop-area-team').show('fast');
        }

        if ($('#member-name').val() == "" || $('#member-twitter').val() == "" || $('#team-select').val() == "" || $('#member-youtube').val() == "" || $('#member-email').val() == "") {
            $('#drop-area-member').hide('fast');
        } else {
            $('#drop-area-member').show('fast');
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
        },
        onUploadComplete: function () {
            alert($('#team-image-name').val() + " team has been created");
            $('#drop-area-team').hide('fast');
            $('#drop-area-team2').show('fast');
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-team').show('fast');
            $('#percentage-team').text(percent + "% uploaded");
        }
      });

      
    $("#drop-area-team2").dmUploader({
        url: 'includes/uploadTeamLogo.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#team-image-name').val()
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert($('#team-image-name').val() + " game logo has been uploaded, the page will now refresh");
            location.reload();
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-team2').show('fast');
            $('#percentage-team2').text(percent + "% uploaded");
        }
      });

      $("#drop-area-member").dmUploader({
        url: 'includes/createNewTeamMember.php',
        multiple: false,
        queue: false,
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
        },
        onUploadComplete: function () {
            alert($('#member-name').val() + " has been added to " + $('#team-select').val());
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-member').show('fast');
            $('#percentage-member').text(percent + "% uploaded");
        }
      });

}); 