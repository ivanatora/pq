<script type="text/javascript">
$(document).ready(function(){
    <? if (isset($error)): ?>
        $('.warning_message').html("<?=$error;?>");
        $('.warning_message').fadeIn();
    <? endif; ?>
        
    <? if (isset($success)): ?>
        $('.success_message').fadeIn();
    <? endif;?>
})
</script>

<div class="success_message">Registration success! You can login now.</div>
<div class="warning_message"></div>


<form class="formCentered" method="post">
<table>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username"></td>
        <td><span id="warning_username" class="register_warning_hidden"></span></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><input type="text" name="email"></td>
        <td><span id="warning_email" class="register_warning_hidden"></span></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
        <td><span id="warning_password" class="register_warning_hidden"></span></td>
    </tr>
    <tr>
        <td>Confirm password</td>
        <td><input type="password" name="confirm_password"></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td><input class="formSubmit" type="submit" value="Register"></td>
        <td></td>
    </tr>
</table>
</form>




