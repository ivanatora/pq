<script type="text/javascript">
$(document).ready(function(){
    <? if (isset($error)): ?>
            $('.warning_message').html('<?=$error;?>');
            $('.warning_message').fadeIn();
    <? endif; ?>
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
                <img src='/images/delete-16.png' />
            </a>
        <? endif;?>
    </p>

    <a href='/media/storage/submissions/<?=$oPhoto->p_id;?>/<?= $oPhoto->p_image;?>.jpg'>
        <img src='/media/storage/submissions/<?=$oPhoto->p_id;?>/<?= $oPhoto->p_image;?>_preview.jpg' />
    </a>
    <br />
    <input type="hidden" id="original_rating" value="<?=$oPhoto->r_rating_average;?>" />
    <input type="hidden" id="original_poster" value="<?=$oPhoto->u_id;?>" />
    <input type="hidden" id="original_photo_id" value="<?=$oPhoto->p_id;?>" />
    
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
