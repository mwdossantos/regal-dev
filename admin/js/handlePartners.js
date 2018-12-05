$(document).ready(function() { 

    setInterval(function () {
        if ($('#partner-image-name').val() == "" || $('#partner-url').val() == "") {
            $('#drop-area-partner').hide('fast');
        } else {
            $('#drop-area-partner').show('fast');
        }

    },100)



    $("#drop-area-partner").dmUploader({
        url: 'includes/createNewPartner.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#partner-image-name').val(),
              "url": $('#partner-url').val()
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert($('#partner-image-name').val() + " partner has been created");
            $('#drop-area-partner').hide('fast');
            $('#drop-area-partner2').show('fast');
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-partner').show('fast');
            $('#percentage-partner').text(percent + "% uploaded");
        }
      });

      
    $("#drop-area-partner2").dmUploader({
        url: 'includes/uploadPartnerLogo.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#partner-image-name').val()
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert($('#partner-image-name').val() + " partner logo has been uploaded, the page will now refresh");
            location.reload();
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-partner2').show('fast');
            $('#percentage-partner2').text(percent + "% uploaded");
        }
      });
}); 

function deletePartner(id) {

    $.ajax({
         type: "POST",
         url: 'includes/deletePartner.php',
         data: {
           id: id,
         },
         success:function(data) {
            if (data == 1) {
                location.reload();
            } else {
                alert("Something went wrong, please check if you filled in all fields.");
            }
         }
    });
}
