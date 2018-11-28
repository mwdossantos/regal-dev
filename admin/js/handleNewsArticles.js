$(document).ready(function() { 

    setInterval(function () {
        if ($('#image-name').val() == "") {
            $('#drop-area').hide('fast');
        } else {
            $('#drop-area').show('fast');
        }
    },100)


    $("#drop-area").dmUploader({
        url: 'includes/uploadNewsImage.php',
        multiple: false,
        queue: false,
        extraData: function() {
            return {
              "name": $('#image-name').val()
            };
        },
        extFilter: ["jpg", "jpeg", "png", "gif"],
        onInit: function(){
          console.log('Callback: Plugin initialized');
        },
        onUploadComplete: function () {
            $('#uploaded-images-div').show('fast');
            $('#uploaded-images').append("<li>"+$('#image-name').val()+"</li>");
        },
        onUploadError: function () {
            alert("Upload failed");
        }
      });


      var simplemde = new SimpleMDE({
        autofocus: false,
        autosave: {
            enabled: true,
            uniqueId: "MyUniqueID",
            delay: 1000,
        },
        blockStyles: {
            bold: "__",
            italic: "_"
        },
        hideIcons: ["fullscreen", "preview", "side-by-side"],
        element: document.getElementById("news-body"),
        forceSync: true,
        indentWithTabs: true,
        insertTexts: {
            horizontalRule: ["", "\n\n-----\n\n"],
            image: ["img*PutImageNameHere", "*img"],
            link: ["url*http://", "*url[]"],
            table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
        },
        lineWrapping: false,
        parsingConfig: {
            allowAtxHeaderWithoutSpace: true,
            strikethrough: false,
            underscoresBreakWords: true,
        },
        placeholder: "News article here...",
        previewRender: function(plainText) {
            return customMarkdownParser(plainText); // Returns HTML from a custom parser
        },
        previewRender: function(plainText, preview) { // Async method
            setTimeout(function(){
                preview.innerHTML = customMarkdownParser(plainText);
            }, 250);
    
            return "Loading...";
        },
    });


}); 