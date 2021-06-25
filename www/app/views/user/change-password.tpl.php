<?php echo $header; ?>

    <section class="my-login-page">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Reset Password</h4>
                            <form class="my-login-validation"
                                  action="<?php echo URL . DIR_ROUTE; ?>profile/changepassword" method="post"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo $token; ?>">
                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                <input type="hidden" name="hash" value="<?php echo $hash; ?>">
                                <div class="form-group">
                                    <label for="change-password"><?php echo $lang['text_password'] ?> <em>*</em></label>
                                    <input type="password" name="password" id="changepassword" class="form-control">
                                    <div class="invalid-feedback">
                                        <span><?php echo $lang['text_password_error'] ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="change-password-confirm"><?php echo $lang['text_confirm_password'] ?>
                                        <em>*</em></label>
                                    <input type="password" name="confirmpassword" id="changepassword-confirm" class="form-control">
                                    <div class="invalid-feedback">
                                        <span><?php echo $lang['text_password_error'] ?></span>
                                    </div>
                                </div>
                                <div class="form-group main_box form-bot-check">
                                    <label for="login-bot" id="reset-bot-label"><?php echo $lang['text_what_is'] . ' ' . rand(1, 10) . ' ' . $lang['text_plus'] . ' ' . rand(1, 10); ?>
                                        = <em> *</em></label>
                                    <input type="number" name="bot-check" id="login-bot" class="form-control">
                                    <div class="invalid-feedback">
                                        <span><?php echo $lang['text_what_is_error']; ?></span>
                                    </div>
                                </div>
                                <div class="form-submit">
                                    <button type="submit" name="submit" id="changepassword-submit"
                                            class="btn btn-primary btn-block"><?php echo $lang['text_change_password']; ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php echo $footer; ?>