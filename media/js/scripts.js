$(document).ready(function(){
    
    var bVotingThisPictureDisabled = false;
    /*
    if ($("#original_poster").val() == iUserId){
        bVotingThisPictureDisabled = true;
    }*/
    
    $(".star_rating").hover(function(){
        if (bVotingThisPictureDisabled){
            return;
        }
        var iThisRating = $(this).attr('id').replace(/^.+_/, '');
        for (var i = 1; i <= 5; i++){
            var sFindId = "star_" + i;
            if (i > iThisRating){
                $("#" + sFindId).attr('src', '/media/images/star_empty.png');
            }
            else {
                $("#" + sFindId).attr('src', '/media/images/star_full.png');
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
                $("#" + sFindId).attr('src', '/media/images/star_half.png');
                continue;
            }
            
            if (i > iOriginalRating){
                $("#" + sFindId).attr('src', '/media/images/star_empty.png');
            }
            else if (i < iOriginalRating + 1) {
                $("#" + sFindId).attr('src', '/media/images/star_full.png');
            }
        }
    })
    
    $(".star_rating").click(function(){
        var iThisRating = $(this).attr('id').replace(/^.+_/, '');
        $.ajax({
            url: '/submission/ajax_add_rating',
            type: 'POST',
            dataType: 'json',
            data: {
                id        : $("#original_photo_id").val(),
                rating    : iThisRating
            },
            success: function(res){
                if (res.success){
                    $("#thanksForVoting").fadeIn("slow");
                }
                else {
                    if (typeof res.msg != 'undefined'){
                        $('#votingError').html(res.msg);
                        $('#votingError').fadeIn('slow');
                    }
                }
            }
        })
    })
    
    $("#btnPostComment").click(function(){
        var sComment = $("#fldEnterComment").val();
        $.ajax({
            url: '/submission/ajax_post_comment',
            type: 'POST',
            dataType: 'json',
            data: {
                id        : $("#original_photo_id").val(),
                comment   : sComment
            },
            success: function(res){
                if (res.success){
                    addComment(sComment);
                    $("#fldEnterComment").val('');
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
                url: '/quest/ajax_suggest',
                type: 'POST',
                dataType: 'json',
                data: {
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
    $("#idFldUpladTitle").blur(function(){
        if ($(this).val() == ''){
            $("#idFldUpladTitle").val('Set a title');
        }
    })
    
    
    
    $("#showInactive").click(function(e){
        e.preventDefault();
        $(".inactive").toggle();
    })
    
    $('.ui-widget-overlay').live('click', function(e){
        $('#dialog-delete').dialog('close');
    })
})

