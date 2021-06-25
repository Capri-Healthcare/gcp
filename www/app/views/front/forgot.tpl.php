<?php echo $header; ?>
    <section class="my-login-page">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Forgot Password</h4>
                            <form method="POST" class="my-login-validation"
                                  action="<?php echo URL . DIR_ROUTE; ?>forgot">
                                <input type="hidden" name="_token" value="<?php echo $token; ?>">
                                <div class="form-group">
                                    <label for="forgot-email">E-Mail Address <span class="error">*</span></label>
                                    <input id="forgot-email" type="email" class="form-control" name="email" value=""
                                           required
                                           autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                    <div class="form-group main_box form-bot-check">
                                        <label for="register-bot"
                                               id="forgot-bot-label"><?php echo $lang['text_what_is'] . ' ' . rand(1, 10) . ' ' . $lang['text_plus'] . ' ' . rand(1, 10); ?>
                                            = <em> *</em></label>
                                        <input type="number" name="bot-check" class="form-control" id="forgot-bot"
                                               required>
                                        <div class="invalid-feedback">
                                            Please enter correct value!
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="forgot" id="forgot-submit"
                                            class="btn btn-primary btn-block">
                                        Send Reset Link
                                    </button>
                                </div>
                                <div class="mt-4 text-center form-group">
                                    Already have an account? <a href="<?php echo URL . DIR_ROUTE; ?>login">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php echo $footer; ?>