<div id="content">
    <div class="clearing">&nbsp;</div>
    
    <div id="page_bar">
        <!--
        Page:
    {section name=i loop=$aPages}
        <a href='/gallery/page/{$aPages[i]}{$sPageSuffix}' class='link_gallery_page{if $aPages[i] == $iCurrentPage} current_page{/if}'>{$aPages[i]}</a>
    {/section}
        -->
    </div>
    
    <div class="clearing">&nbsp;</div>
    
    <div id="thumbs">
    <? foreach ($aResults as $oItem): ?>
        <span class='thumb_container'>
            <div class='thumb_name'><?= $oItem->p_name;?></div>
            <a href='/view/<?= $oItem->p_name;?>/<?= $oItem->p_id;?>'>
                <img src="/photo/view/<?= $oItem->p_id?>/thumb" />
            </a>
            <div class='thumb_meta'>
                by <a href='/gallery/page/1/user/<?= $oItem->u_username;?>-<?= $oItem->u_id; ?>'><?= $oItem->u_username;?></a> | 
                <?= date("d.m.Y", strtotime($oItem->p_date));?> @ 
                <a href='/gallery/page/1/quest/<?= $oItem->qpt_topic;?>-<?= $oItem->q_id;?>'><?= $oItem->qpt_topic;?></a>
            </div>
        </span>
    <? endforeach; ?>
    </div> <!-- #thumbs -->
    
    

</div> <!-- #content -->