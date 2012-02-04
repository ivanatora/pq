FB.init({
    appId  : window.iFbAppId,
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true, // parse XFBML
    channelUrl : window.sSiteUrl + '/channel.html', // channel.html file
    oauth  : true // enable OAuth 2.0
});


FB.getLoginStatus(function(response) {
    if (response.authResponse) {
        // logged in and connected user, someone you know
        lm("FB login:")
        lm(response)
        window.bFbUserLoggedIn = true;
        //$("#btnLogin")[0].style.visibility = "hidden";
    } else {
        lm("yok");
        window.bFbUserLoggedIn = false;
        //$("#btnLogin")[0].style.visibility = "";
    }
});

window.sFbLoginBtn = '<fb:login-button show-faces="false" width="200" max-rows="1"></fb:login-button>';

FB.Event.subscribe('auth.login', function(args){
    $.ajax({
        url: '/index.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'backend' : true,
            'signed_request' : args.authResponse.signedRequest
        },
        success: function(data){
            location.reload(true);
        }
    })
});