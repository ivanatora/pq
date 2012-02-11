<script type="text/javascript" src="/media/uploadify/swfobject.js"></script>
<script type="text/javascript" src="/media/uploadify/jquery.uploadify.v2.1.4.js"></script>
<script type="text/javascript">
    // <![CDATA[
    $(document).ready(function() {
        $('#fldFileUpload').uploadify({
            'uploader'  : '/media/uploadify/uploadify.swf',
            'script'    : '/submission/ajax_file_upload',
            'cancelImg' : '/media/uploadify/cancel.png',
            'folder'    : '/media/storage/',
            'sizeLimit' : 10000000,
            'fileExt'   : '*.JPG;*.jpg;*.jpeg;*.png',
            'fileDesc'  : 'Image Files',
            'auto'      : true,
            'scriptData': {
                hash: '<?= $sUserhash ?>'
            },
            'onComplete': function(event, ID, fileObj, response, data){
                response = jQuery.parseJSON(response);
                $(".formCentered input[type=hidden]").val(response.id);
                
                $("#previewImage").html("<img src='/media/storage/submissions/" + response.id +
                    "/" + response.filename + "_thumb.jpg' />");
                
                $(".formCentered input[type=submit]").show()
            },
            'onError': function(event, ID, fileObj, errorObj){
                lm("error:")
                lm(errorObj)
            }
        });
    });
    // ]]>
</script>

<form class="formCentered" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="submission_id" value="0" />

    <table>
        <tr>
            <td>Topic</td>
            <td><i><?=$sTodayQuest;?></i></td>
        </tr>
        <tr>
            <td>Step 1:</td>
            <td><input type="text" name="title" id="idFldUpladTitle" value="Set a title"></input></td>
        </tr>
        <tr>
            <td>Step 2:</td>
            <td><input type="file" name="userfile" id="fldFileUpload"/></td>
        </tr>
        <!--<tr><td></td><td><input type="button" value="Upload" id="submitFormUpload" class="formSubmit"></input></td>-->
    </table>
    Allowed extensions: jpg, jpeg, png<br />
    Max filesize: 10MB

    <div id="previewImage"></div>
    <input type="submit" value="Send" style="display: none;"/>
</form>
