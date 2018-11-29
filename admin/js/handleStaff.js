$(document).ready(function() { 

    setInterval(function () {
        if ($('#staff-image-name').val() == "") {
            $('#drop-area-staff').hide('fast');
        } else {
            $('#drop-area-staff').show('fast');
        }

        if ($('#member-name').val() == "" || $('#member-twitter').val() == "" || $('#staff-select').val() == "" || $('#member-youtube').val() == "" || $('#member-email').val() == "") {
            $('#drop-area-member').hide('fast');
        } else {
            $('#drop-area-member').show('fast');
        }

    },100)


    $("#drop-area-staff").dmUploader({
        url: 'includes/uploadStaffImage.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#staff-image-name').val()
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert($('#staff-image-name').val() + " staff has been created, the page will be reloaded");
            location.reload();
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-staff').show('fast');
            $('#percentage-staff').text(percent + "% uploaded");
        }
      });

      $("#drop-area-member").dmUploader({
        url: 'includes/createNewStaffMember.php',
        multiple: false,
        queue: false,
        extraData: function() { 
            return {
              "name": $('#member-name').val(),
              "gameName": $('#staff-select').val(),
              "twitterHandle": $('#member-twitter').val(),
              "youtubeHandle": $('#member-youtube').val(),
              "emailHandle": $('#member-email').val(),
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert($('#member-name').val() + " has been added to " + $('#staff-select').val());
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