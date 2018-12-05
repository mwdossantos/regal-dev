
function login () {
    const username = $('#username').val();
    const password = $('#password').val();

    if (username == ""|| password == "") {
        return alert("Zorg er graag voor dat alle velden zijn ingevuld");
    }

    $.ajax({
         type: "POST",
         url: 'includes/login.php',
         data: {
           username: username,
           password: password
         },
         success:function(data) {
            if (data != 0) {
                window.location.href = "index.php"
            } else {
                alert("Login is incorrect.");
            }
         }
    });
    
}

