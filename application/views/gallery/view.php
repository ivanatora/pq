<div id="content">
    <div class="clearing">&nbsp;</div>
    
    <? if(isset($sGalleryType)): ?>
        <h2>From <?= $sGalleryType;?>: <?= $sGalleryTitle;?></h2>
    <? endif;?>
    
    <div id="page_bar">
        <?= $this->pagination->create_links(); ?>
    </div>
    
    <div class="clearing">&nbsp;</div>
    
    <div id="thumbs">
    <? foreach ($aResults as $oItem): ?>
        <span class='thumb_container'>
            <div class='thumb_name'><?= $oItem->p_name;?></div>
            <a href='/submission/view/<?= $oItem->p_url;?>/<?= $oItem->p_id;?>'>
                <img src="/media/storage/submissions/<?= $oItem->p_id?>/<?= $oItem->p_image;?>_thumb.jpg" />
            </a>
            <div class='thumb_meta'>
                by <a href='/gallery/view/user-<?= $oItem->u_username;?>-<?= $oItem->u_id; ?>'><?= $oItem->u_username;?></a> | 
                <?= date("d.m.Y", strtotime($oItem->p_date));?> @ 
                <a href='/gallery/view/quest-<?= $oItem->qpt_topic;?>-<?= $oItem->q_id;?>'><?= $oItem->qpt_topic;?></a>
            </div>
        </span>
    <? endforeach; ?>
    </div> <!-- #thumbs -->
    
    

</div> <!-- #content -->