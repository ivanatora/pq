<div id="content">
    <div class="post">
        <h2>Previous quests</h2>
        <p>
            <ul>
                <? foreach($aQuests as $oQuest): ?>
                    <li <? if ($oQuest->num_photos == 0): ?>class="inactive"<? endif; ?>>
                        <a href='/gallery/view/quest-<?= $oQuest->qpt_topic. '-' . $oQuest->q_id;?>'><?= $oQuest->qpt_topic;?></a> 
                        at <?= date("d.m.Y", strtotime($oQuest->qpt_date_selected));?> with <?= $oQuest->num_photos;?> photos
                    </li>
                <? endforeach; ?>
            </ul>
        </p>
        <p>
            <a href='#' id='showInactive'>Show/hide inactive quests</a>
        </p>
    </div>
</div>
