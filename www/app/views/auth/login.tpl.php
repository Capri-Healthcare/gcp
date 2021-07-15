<?php echo $header; ?>
<!-- Start Login Section -->
<div class="layer-stretch">
    <div class="layer-wrapper">
        <form class="form-container" action="<?php echo URL.DIR_ROUTE; ?>login" method="post" enctype="multipart/form-data">
            <?php if(!empty($success)) { ?>
                <div class="alert alert-success alert-dismissable">
                    <?php echo $success ?>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                </div>
            <?php } if(!empty($error)) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <?php echo $error ?>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                </div>
            <?php } ?>
            <input type="hidden" name="_token" value="<?php echo $token; ?>">
            <div class="input-box">
                <input type="text" name="email" id="login-email" required>
                <label for="login-email"><?php echo $lang['text_email_address']; ?> <em> *</em></label>
                <span class=""><?php echo $lang['text_email_error']; ?></span>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="login-password" required>
                <label for="login-password"><?php echo $lang['text_password']; ?> <em> *</em></label>
                <span><?php echo $lang['text_password_error']; ?></span>
                <a href="<?php echo URL.DIR_ROUTE.'forgot'; ?>" class="forgot-pass"><?php echo $lang['text_forgot_password']; ?>?</a>
            </div>
            <div class="input-box form-bot-check">
                <label class="" for="login-bot"><?php echo $lang['text_what_is'].' '.rand(1,10).' '.$lang['text_plus'].' '. rand(1,10); ?> = <em> *</em></label>
                <input class="" type="number" name="bot-check" id="login-bot" required>
                <span><?php echo $lang['text_what_is_error']; ?></span>
            </div>
            <div class="form-submit text-center">
                <button type="submit" name="login" id="login-submit" class="btn btn-primary"><?php echo $lang['text_login']; ?></button>
            </div>
            <div class="login-link text-center">
                <span class="paragraph-small"><?php echo $lang['text_do_not_have_an_account?']; ?></span>
                <a href="<?php echo URL.DIR_ROUTE.'register'; ?>"><?php echo $lang['text_register_as_new_user']; ?></a>
            </div>
        </form>
    </div>
</div><!-- End Login Section -->
<?php echo $footer; ?>