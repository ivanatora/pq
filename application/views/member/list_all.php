<div id="content">
    <div class="post">
        <h2>User list</h2>
        <ul>
            <? foreach ($aUsers as $oUser): ?>
                <li><a href='/gallery/view/user-<?= $oUser->u_username.'-'.$oUser->u_id;?>'>
                        <?= $oUser->u_username;?>
                    </a> 
                    with <?= $oUser->num_photos; ?> photos
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</div>