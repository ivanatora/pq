<script type="text/javascript">
$(document).ready(function(){
    <? if (isset($error)): ?>
            $('.warning_message').html('<?=$error;?>');
            $('.warning_message').fadeIn();
    <? endif; ?>
        
    <? if ($contact_success): ?>
        $('.success_message').fadeIn();
    <? endif; ?>
})
</script>

<div id="content">
    <div class="post">
        <h2>Contact Us</h2>
        <div class="warning_message"></div>
        <form class="formCentered" action="" method="post">
            <table>
                <tr>
                    <td>Your name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Your email</td>
                    <td><input type="text" name="email"</td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><textarea name="message"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="formSubmit" type="submit" name="submit_btn" value="Send"></td>
                </tr>
            </table>
        </form>
        <div class="success_message">
            Message sent!
        </div>
    </div>
</div>