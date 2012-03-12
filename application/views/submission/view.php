<script type="text/javascript">
$(document).ready(function(){
    <? if (isset($error)): ?>
            $('.warning_message').html('<?=$error;?>');
            $('.warning_message').fadeIn();
    <? endif; ?>
        
    $('#delete_photo').click(function(){
        $( "#dialog-delete" ).dialog({
			resizable: false,
			height:220,
            width: 350,
			modal: true,
			buttons: {
				"Delete": function() {
                    $.ajax({
                        url: '/submission/delete',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: <?=$oPhoto->p_id?>
                        },
                        success: function(res){
                            if (res.success){
                                window.location = 'http://' + location.hostname;
                            }
                        }
                    })
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});

    })
    
})
</script>

<div id="content">
    <div class="post">

    <div class="warning_message"></div>
    
    <h2><?=$oPhoto->p_name;?></h2>
    <p class="postmeta">
        Posted by <a href='/gallery/page/1/user/<?= $oPhoto->u_username;?>/<?=$oPhoto->u_id;?>'><?=$oPhoto->u_username;?></a> | 
        <a href='/gallery/page/1/quest/<?=$oPhoto->qpt_topic;?>/<?=$oPhoto->q_id;?>'><i><?=$oPhoto->qpt_topic;?></i></a> |
        <?= date("d.m.Y", strtotime($oPhoto->p_date)); ?>
        <? if (isset ($iMemberId) && $oPhoto->u_id == $iMemberId): ?>
            <a href='#' id='delete_photo' photo_id='<?=$oPhoto->p_id;?>'>
                <img src='/media/images/delete-16.png' />
            </a>
        <? endif;?>
    </p>

    <div class="img_container">
        <a href='/media/storage/submissions/<?=$oPhoto->p_id;?>/<?= $oPhoto->p_image;?>.jpg'>
            <img src='/media/storage/submissions/<?=$oPhoto->p_id;?>/<?= $oPhoto->p_image;?>_preview.jpg' />
        </a>
    </div>
    <br />
    <input type="hidden" id="original_rating" value="<?=$oPhoto->r_rating_average;?>" />
    <input type="hidden" id="original_poster" value="<?=$oPhoto->u_id;?>" />
    <input type="hidden" id="original_photo_id" value="<?=$oPhoto->p_id;?>" />
    
    <div class="submission_exif">
        Camera: <?=$oPhoto->p_exif_camera;?>;
        <?if ($oPhoto->p_exif_shutter != 'unknown'): ?>Shutter speed: <?=$oPhoto->p_exif_shutter;?>s;<?endif;?>
        <?if ($oPhoto->p_exif_iso != 0):?>ISO: <?=$oPhoto->p_exif_iso;?>;<?endif;?>
        <?if ($oPhoto->p_exif_aperture != 0): ?>Aperture: <?= ($oPhoto->p_exif_aperture != 'unknown') ? 'F' : ''?><?=$oPhoto->p_exif_aperture;?>;<?endif;?>
        <?if ($oPhoto->p_exif_focal != 0): ?>Focal length: <?=$oPhoto->p_exif_focal;?>mm<?endif;?>
    </div>
    
    <img class="star_rating" id="star_1" src='/media/images/star_<? if ($oPhoto->r_rating_average < 0.5):?>empty<? elseif ($oPhoto->r_rating_average < 1):?>half<? else:?>full<? endif;?>.png' />
    <img class="star_rating" id="star_2" src='/media/images/star_<? if ($oPhoto->r_rating_average < 1.5):?>empty<? elseif ($oPhoto->r_rating_average < 2):?>half<? else:?>full<? endif;?>.png' />
    <img class="star_rating" id="star_3" src='/media/images/star_<? if ($oPhoto->r_rating_average < 2.5):?>empty<? elseif ($oPhoto->r_rating_average < 3):?>half<? else:?>full<? endif;?>.png' />
    <img class="star_rating" id="star_4" src='/media/images/star_<? if ($oPhoto->r_rating_average < 3.5):?>empty<? elseif ($oPhoto->r_rating_average < 4):?>half<? else:?>full<? endif;?>.png' />
    <img class="star_rating" id="star_5" src='/media/images/star_<? if ($oPhoto->r_rating_average < 4.5):?>empty<? elseif ($oPhoto->r_rating_average < 5):?>half<? else:?>full<? endif;?>.png' />
    <div id="thanksForVoting">Thanks for voting!</div>
    
    <br />
    <? if (isset($iMemberId)):?>
        <textarea id="fldEnterComment" ></textarea>
        <input id="btnPostComment" class="formSubmit" type="button" value="Post" />
    <? endif;?>
    <div id="comments">
        <? foreach ($oPhoto->aComments as $oComment) :?>
            <div class='comment'>
                <?= date("d.m.Y H:i", strtotime($oComment->c_date));?> | <a href='#'><?=$oComment->u_username;?></a><br />
                <?=$oComment->c_text;?>
            </div>
        <? endforeach;?>
    </div>
    
    </div> <!-- .post -->
</div> <!-- #content -->


<div id="dialog-delete" title="Delete?" style="display:none;">
	<p>
        <span class="delete_icon" style="float:left; margin:0 7px 20px 0;">
        </span>
        This photo will be permanently deleted and cannot be recovered. Are you sure?
    </p>
</div>
