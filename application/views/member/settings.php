<script type="text/javascript">
$(document).ready(function(){
    <? if (isset($success)): ?>
        $('.success_message').fadeIn();
    <? endif;?>
})
</script>

<div class="success_message">Saved!</div>

<div id="content">
    <div class="post">
        <h2>Settings</h2>
        <form action="" method="post">
            <table>
                <tr><td>E-mail</td>
                    <td><input disabled="disabled" value="<?= $oMember->u_mail;?>" /></td></tr>
                <tr><td>Notify me for new topics</td>
                    <td><input name="notify_new_topics" type="checkbox" <?= (isset($oSettings->notify_new_topics) && $oSettings->notify_new_topics == 1) ? 'checked': '';?>/></td></tr>
                <tr><td>Subscribe me for comments</td>
                    <td><input name="notify_new_comments" type="checkbox" <?= (isset($oSettings->notify_new_comments) && $oSettings->notify_new_comments == 1) ? 'checked': '';?>/></td></tr>
                <tr><td></td>
                    <td><input type="submit" class="formSubmit" value="Save" /></td></tr>
            </table>
        </form>
    </div>
</div>