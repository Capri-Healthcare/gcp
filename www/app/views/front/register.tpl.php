<?php echo $header; ?>
<section class="my-login-page my-register-page">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <center>
                            <div class="tab_main">
                                <a href="#" title="" alt="">
                                    <div onclick="chnageRegisterForm(event)" class="tab_button active_tab" data-register="optician">
                                        <i class="fas fa-glasses"></i>
                                        <p>I'm an Optometrist</p>
                                    </div>
                                </a>
                                <a href="#" title="" alt="">
                                    <div onclick="chnageRegisterForm(event)" class="tab_button" data-register="patient">
                                        <i class="fas fa-procedures"></i>
                                        <p>I'm a Patient</p>
                                    </div>
                                </a>
                            </div>
                        </center>
                        <form method="post" action="<?php echo URL . DIR_ROUTE . 'register'; ?>">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group main_box">
                                        <label for="register-first-name">First Name <span class="error">*</span></label>
                                        <input id="register-first-name" type="text" class="form-control" name="firstname" pattern="[A-Z,a-z, ]*" value="" required autofocus>
                                        <input type="hidden" name="_token" value="<?php echo $token; ?>">
                                        <input type="hidden" name="register_from" id="register_from" value="optician">
                                        <div class="invalid-feedback">
                                            First name is invalid
                                        </div>
                                    </div>

                                    <div class="form-group main_box">
                                        <label for="register-last-name">Last Name <span class="error">*</span></label>
                                        <input id="register-last-name" type="text" class="form-control" name="lastname" pattern="[A-Z,a-z, ]*" value="" required data-eye>
                                        <div class="invalid-feedback">
                                            Last name is required
                                        </div>
                                    </div>


                                    <div class="form-group main_box">
                                        <label for="register-email">E-Mail Address <span class="error">*</span></label>
                                        <input id="register-email" type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" required autofocus>
                                        <div class="invalid-feedback">
                                            Email is invalid
                                        </div>
                                    </div>

                                    <div class="form-group main_box">
                                        <label for="register-mobile">Preferred Contact Number<span class="error">*</span></label>
                                        <input id="register-mobile" type="text" class="form-control" maxlength="11" name="mobile" pattern="[0-9]*" value="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" required>
                                        <div class="invalid-feedback">
                                            Preferred Contact Number is invalid
                                        </div>
                                    </div>
                                    <div class="form-group main_box" id="register-optician-practice-div">
                                        <label for="register-optician-practice-name">Optician Practice Name <span class="error">*</span></label>
                                        <input type="text" class="form-control" name="optician_shop_name" id="register-optician-practice-name" value="" autofocus>
                                        <div class="invalid-feedback">
                                            Optician practice name is invalid
                                        </div>
                                    </div>

                                    <div class="form-group main_box" id="register-goc-div">
                                        <label for="register-goc-registration">GOC registrations <span class="error">*</span></label>
                                        <input type="text" class="form-control" name="optician_register_number" id="register-goc-registration" value="" autofocus>
                                        <div class="invalid-feedback">
                                            GOC registrations is invalid
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group main_box" id="register-user-div">
                                        <label for="register-user-name">Username <span class="error">*</span></label>
                                        <input type="text" class="form-control" name="username" id="register-user-name" value="">
                                        <div class="invalid-feedback invalid-user">
                                            Username is required
                                        </div>
                                    </div>

                                    <div class="form-group main_box" id="register-optician-gppractice-div" style="display: none">
                                        <label for="gp_practice">GP Practice<span class="error">*</span></label>
                                        <select class="form-control" name="gp_practice" id="gp_practice" value="" autofocus>
                                            <option value="">Select GP Practice</option>
                                            <?php foreach (constant('GP_PRACTICE') as $key => $list) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $list; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            GP Practice is required
                                        </div>
                                    </div>

                                    <div class="form-group main_box">
                                        <label for="register-password">Password <span class="error">*</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="<ul><li style='text-align: justify;'>At least 8 characters.</li><li style='text-align: justify;'>A mixture of both uppercase and lowercase letters.</li><li style='text-align: justify;'>A mixture of letters and numbers.</li><li style='text-align: justify;'>Inclusion of at least one special character</li></ul>"></i></label>
                                        <input type="password" class="form-control" name="password" id="register-password" value="" onkeyup="return passwordChanged();" required>
                                        <div class="invalid-feedback invalid-password">
                                            Password is required
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group main_box">
                                        <label for="register-confirm-password"><?php echo $lang['text_confirm_password']; ?> <span class="error">*</span></label>
                                        <input type="password" class="form-control" name="confirmpassword" id="register-confirm-password" value="" required>
                                        <div class="invalid-feedback invalid-confirm-password">
                                            <?php echo $lang['text_password_error']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group main_box form-bot-check">
                                        <label for="register-bot" id="register-bot-label"><?php echo $lang['text_what_is'] . ' ' . rand(1, 10) . ' ' . $lang['text_plus'] . ' ' . rand(1, 10); ?>
                                            = <em> *</em></label>
                                        <input type="number" name="bot-check" class="form-control" id="register-bot" required>
                                        <div class="invalid-feedback">
                                            Please enter correct value!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 privacy_policy form-group">
                                        <input type="checkbox" name="privacy_policy" id="privacy_policy" value="Y" class="privacy_policy" required />&nbsp;
                                        I agree with the <a target="_blank" href="<?php echo URL."public/uploads/test.pdf";?>">terms and condition</a> and <a target="_blank" href="<?php echo URL.DIR_ROUTE."privacy-policy";?>">privacy policy</a>.
                                        <div class="invalid-feedback ml-3">
                                            Please agree with terms and condition and privacy policy
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-0">
                                        <button type="submit" id="register-submit" name="register" class="btn btn-primary btn-block">
                                            Create Account
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center form-group">
                                        Already have an account? <a href="<?php echo URL . DIR_ROUTE; ?>login">Login</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php echo $footer; ?>