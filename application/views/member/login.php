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
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="idFldLoginPassword"></td>
            </tr>
            <tr>
                <td>Remember me</td>
                <td><input type="checkbox" name="remember" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="formSubmit" id="submitFormLogin" type="submit" value="Login"></td>
            </tr>
        </table>
    </form>

    <!--
    <fb:login-button show-faces="false" width="200" max-rows="1"></fb:login-button>
    -->
</div> <!-- #content -->