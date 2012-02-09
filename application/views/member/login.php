<script type="text/javascript">
$(document).ready(function(){
    <? if (isset($error)): ?>
            $('.warning_message').html('<?=$error;?>');
            $('.warning_message').fadeIn();
    <? endif; ?>
})
</script>

<div id="content">
    <div class="warning_message"></div>
    <form class="formCentered" action="" method="post">
        <table>
            <tr>
                <td>E-mail</td>
                <td><input type="text" name="email"></td>
                <td><span id="warning_email" class="register_warning_hidden"></span></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="idFldLoginPassword"></td>
                <td><span id="warning_password" class="register_warning_hidden"></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="formSubmit" id="submitFormLogin" type="submit" value="Login"></td>
                <td></td>
            </tr>
        </table>
    </form>

    <!--
    <fb:login-button show-faces="false" width="200" max-rows="1"></fb:login-button>
    -->
</div> <!-- #content -->