$(document).ready(function() { 

    setInterval(function () {

        if ($('#item-name').val() == "" || $('#item-price').val() == "" || $('#item-url').val() == "") {
            $('#drop-area-item').hide('fast');
        } else {
            $('#drop-area-item').show('fast');
        }

    },100)

    
    $("#drop-area-item").dmUploader({
        url: 'includes/createNewApperalItem.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#item-name').val(),
              "price": $('#item-price').val(),
              "url": $('#item-url').val(),
              "group": $('#group-select').val(),
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert($('#item-name').val() + " item has been created");
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-item').show('fast');
            $('#percentage-item').text(percent + "% uploaded");
        }
      });

      $("#drop-area-promo").dmUploader({
        url: 'includes/setPromoImage.php',
        multiple: false,
        queue: false,
        extFilter: ["jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF"],
        onInit: function(){
        },
        onUploadComplete: function () {
            alert("Promo image has been succesfully changed");
        },
        onUploadError: function () {
            alert("Upload failed");
        },
        onUploadProgress: function (id, percent) {
            $('#percentage-promo').show('fast');
            $('#percentage-promo').text(percent + "% uploaded");
        }
      });

}); 


function saveApperalGroup () {
    const name = $('#group-name').val();

    if (name == "") {
        return alert("Please make sure you filled in all fields");
    }

    $.ajax({
         type: "POST",
         url: 'includes/createApperalGroup.php',
         data: {
           name: name
         },
         success:function(data) {
            if (data == 1) {
                alert("Apperal group has been created, the page will now reload.");
                location.reload();
            } else {
                alert("Something went wrong, please check if you filled in all fields.");
            }
         }
    });
}


function deleteApperalGroup(id) {

    $.ajax({
         type: "POST",
         url: 'includes/deleteApperalGroup.php',
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

function deleteApperalItem(teamId, playerId) {

    $.ajax({
         type: "POST",
         url: 'includes/deleteApperalItem.php',
         data: {
           teamId: teamId,
           playerId: playerId,
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