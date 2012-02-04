$(document).ready(function(){
    var fnSubmitLogin = function(evn){
        var aInputEls = $('#formLogin :input')
        var aValues = {};
        aInputEls.each(function(){
            aValues[this.name] = $(this).val();
        })
        
        $.ajax({
            url: '/index.php',
            type: 'POST',
            dataType: 'json',
            data: {
                backend     : true,
                type        : 'json',
                module      : 'user',
                action      : 'doLoginByEmail',
                email       : aValues.email,
                password    : md5(aValues.password1)
            },
            success: function(res){
                if (res.success){
                    if (window.location.href.match(/login/)){
                        window.location = 'http://' + location.hostname;
                    }
                    else {
                        location.reload();
                    }
                }
                else {
                    showWarning("#warning_email", "Wrong email/password");
                }
            }
        })
        evn.preventDefault();
    }

    $("#idFldLoginPassword").keyup(function(evn){
        if (evn.keyCode == 13){
            fnSubmitLogin(evn);
        }
    })
    
    $("#idFldUpladTitle").keyup(function(evn){
        var sTitle = $(this).val();
        oUploader._options.params.title = sTitle;
    })
    
    $("#submitFormRegister").click(function(){
        var aInputEls = $('#formRegister :input')
        var aValues = {};
        aInputEls.each(function(){
            aValues[this.name] = $(this).val();
        })
        
        var bAnyWarnings = false;
        
        // first - validate password
        if (aValues.password1 != aValues.password2){
            showWarning("#warning_password", "Two passwords do not match");
            bAnyWarnings = true;
        }
        else {
            hideWarning("#warning_password");
        }
        
        // first and a half - too short password?
        if (aValues.password1.length < 6){
            showWarning("#warning_passwod", "Password should be at least 6 symbols long");
            bAnyWarnings = true;
        }
        
        // second - validate email string
        if (!isValidEmailAddress(aValues.email)){
            showWarning("#warning_email", "Invalid email address");
            bAnyWarnings = true;
        }
        else {
            hideWarning("#warning_email");
        }
        
        if (bAnyWarnings){
            return;
        }
        
        // third - check if the username is taken
        $.ajax({
            url: '/index.php',
            type: 'POST',
            dataType: 'json',
            data: {
                backend   : true,
                type      : 'json',
                module    : 'user',
                action    : 'isUsernameTaken',
                username  : aValues.username
            },
            success: function(res){
                if (res.success){
                    showWarning("#warning_username", "Username is taken");
                    return;
                }
                
                // everything is cool - proceed
                
                $.ajax({
                    url: '/index.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        backend   : true,
                        type      : 'json',
                        module    : 'user',
                        action    : 'addUserToDb',
                        username  : aValues.username,
                        email     : aValues.email,
                        password  : md5(aValues.password1)
                    },
                    success: function(res){
                        if (res.success){
                            $("#loginSuccess").fadeIn("slow");
                        }
                    }
                })
            }
        })
    })
    
    $("#submitFormLogin").click(fnSubmitLogin);
    
    
    var fldFileUpload = document.getElementById('idFldFile');
    if (fldFileUpload != null){
        var oUploader = new qq.FileUploader({
            element: document.getElementById('idFldFile'),
            action: '/index.php',
            params: {
                module: 'photo',
                action: 'uploadPhoto',
                type: 'json',
                title: ''
            },
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            onSubmit: function(id, fileName){
                lm("submit")
            },
            onProgress: function(id, fileName, loaded, total){
                lm("progres")
            },
            onComplete: function(id, fileName, responseJSON){
                lm("complete")
                location.reload();
            },
            onCancel: function(id, fileName){
                lm("cancel")
            }
        });
    }
    
    var bVotingThisPictureDisabled = false;
    if ($("#original_poster").val() == iUserId){
        bVotingThisPictureDisabled = true;
    }
    
    $(".star_rating").hover(function(){
        if (bVotingThisPictureDisabled){
            return;
        }
        var iThisRating = $(this).attr('id').replace(/^.+_/, '');
        for (var i = 1; i <= 5; i++){
            var sFindId = "star_" + i;
            if (i > iThisRating){
                $("#" + sFindId).attr('src', '/images/star_empty.png');
            }
            else {
                $("#" + sFindId).attr('src', '/images/star_full.png');
            }
        }
    }, function(){
        if (bVotingThisPictureDisabled){
            return;
        }
        var iOriginalRating = $("#original_rating").val();
        var iHalfRating = parseFloat(iOriginalRating) + 0.5;
        for (var i = 1; i <= 5; i++){
            var sFindId = "star_" + i;
            if (i < iHalfRating && i > iOriginalRating){
                $("#" + sFindId).attr('src', '/images/star_half.png');
                continue;
            }
            
            if (i > iOriginalRating){
                $("#" + sFindId).attr('src', '/images/star_empty.png');
            }
            else if (i < iOriginalRating + 1) {
                $("#" + sFindId).attr('src', '/images/star_full.png');
            }
        }
    })
    
    $(".star_rating").click(function(){
        var iThisRating = $(this).attr('id').replace(/^.+_/, '');
        $.ajax({
            url: '/index.php',
            type: 'POST',
            dataType: 'json',
            data: {
                backend   : true,
                type      : 'json',
                module    : 'photo',
                action    : 'doAddRating',
                iPhotoId  : $("#original_photo_id").val(),
                rating    : iThisRating
            },
            success: function(res){
                if (res.success){
                    $("#thanksForVoting").fadeIn("slow");
                }
            }
        })
    })
    
    $("#btnPostComment").click(function(){
        var sComment = $("#fldEnterComment").val();
        $.ajax({
            url: '/index.php',
            type: 'POST',
            dataType: 'json',
            data: {
                backend   : true,
                type      : 'json',
                module    : 'photo',
                action    : 'doAddComment',
                iPhotoId  : $("#original_photo_id").val(),
                comment   : sComment
            },
            success: function(res){
                if (res.success){
                    addComment(sComment);
                }
            }
        })
    })
    
    var addComment = function(sComment){
        var oDate = new Date();
        var sDate = sprintf("%02d", oDate.getDate()) + '.' + 
            sprintf("%02d", oDate.getMonth()+1) + '.' + 
            (parseInt(oDate.getYear()) + 1900) + " " + 
            sprintf("%02d", oDate.getHours()) + ":" + 
            sprintf("%02d", oDate.getMinutes());
        var sHtml = "<div class='comment'>" + sDate + " | <a href='#'>"+sUsername+"</a><br />"+sComment+"</div></div>";
        $("#comments").prepend(sHtml)
    }
    
    
    $("#fldSuggestText").click(function(){
        if ($(this).val() == 'Suggest topic'){
            $(this).val('')
        }
    })
    $("#fldSuggestText").blur(function(){
        if ($(this).val() == '' || $(this).val().match(/\s/)){
            $(this).val('Suggest topic')
        }
    })
    $("#fldSuggestText").keyup(function(){
        var sOldVal = $(this).val();
        var sNewVal = sOldVal.replace(/\s/, '');
        $(this).val(sNewVal)
    })
    $("#btnSuggest").click(function(evn){
        var sVal = $("#fldSuggestText").val();
        if (! sVal.match(/\s/)){
            $.ajax({
                url: '/index.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    backend   : true,
                    type      : 'json',
                    module    : 'quest',
                    action    : 'doSuggestTopic',
                    topic     : sVal
                },
                success: function(res){
                    if (res.success){
                        $("#fldSuggestText").val('Thanks!');
                    }
                    else {
                        if (typeof res.message != 'undefined'){
                            $("#fldSuggestText").val(res.message);
                        }
                    }
                }
            })
        }
        evn.preventDefault();
    })
    
    $("#idFldUpladTitle").click(function(){
        if ($(this).val() == 'Set a title'){
            $(this).val('')
        }
    })
    $("#idFldUpladTitle").keyup(function(){
        if ($(this).val() != ''){
            $(".hideIfNoTitle").fadeIn();
        }
        else {
            $(".hideIfNoTitle").fadeOut();
        }
    })
    $("#idFldUpladTitle").blur(function(){
        if ($(this).val() == ''){
            $("#idFldUpladTitle").val('Set a title');
        }
    })
    
    $("#btnSaveSettings").click(function(evn){
        var aInputEls = $('#formSettings :input[type=checkbox]')
        var aValues = {};
        aInputEls.each(function(){
            aValues[this.name] = $(this).is(':checked');
        })
        
        
        $.ajax({
            url: '/index.php',
            type: 'POST',
            dataType: 'json',
            data: {
                backend   : true,
                type      : 'json',
                module    : 'settings',
                action    : 'saveSettings',
                data      : JSON.stringify(aValues)
            },
            success: function(res){
                if (res.success){
                    $("#txtSettingsSaved").fadeIn().delay(2000).fadeOut();
                }
            }
        })
        
        evn.preventDefault();
    })
    
    $("#delete_photo").click(function(e){
        e.preventDefault();
        if(confirm("Photo will be deleted forever?")){
            $.ajax({
                url: '/index.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    backend     : true,
                    type        : 'json',
                    module      : 'photo',
                    action      : 'delete',
                    id          : $(this).attr('photo_id')
                },
                success: function(res){
                    if (res.success){
                        window.location = 'http://' + location.hostname;
                    }
                }
            })
        }
    })
    
    $("#showInactive").click(function(e){
        e.preventDefault();
        $(".inactive").toggle();
    })
})

