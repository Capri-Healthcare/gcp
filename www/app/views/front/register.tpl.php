<?php echo $header; ?>
    <section class="my-login-page my-register-page">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <center>
                                <div class="tab_main">
                                    <div class="tab_button active_tab" data-register="optician"
                                         onclick="chnageRegisterForm(event)">
                                        <i class="fas fa-user-nurse"></i>
                                        <p>I'm a Optician</p>
                                    </div>
                                    <div class="tab_button" data-register="patient" onclick="chnageRegisterForm(event)">
                                        <i class="fas fa-procedures"></i>
                                        <p>I'm a Patient</p>
                                    </div>
                                </div>
                            </center>
                            <form method="post" action="<?php echo URL . DIR_ROUTE . 'register'; ?>">

                                <div class="form-group main_box">
                                    <label for="fname">First Name <span class="error">*</span></label>
                                    <input id="register-first-name" type="text" class="form-control" name="firstname"
                                           pattern="[A-Z,a-z, ]*" value="" required autofocus>
                                    <input type="hidden" name="_token" value="<?php echo $token; ?>">
                                    <input type="hidden" name="register_from" id="register_from" value="optician">
                                    <div class="invalid-feedback">
                                        First name is invalid
                                    </div>
                                </div>

                                <div class="form-group main_box">
                                    <label for="lname">Last Name <span class="error">*</span></label>
                                    <input id="register-last-name" type="text" class="form-control" name="lastname"
                                           pattern="[A-Z,a-z, ]*" value="" required data-eye>
                                    <div class="invalid-feedback">
                                        Last name is required
                                    </div>
                                </div>

                                <div class="form-group main_box">
                                    <label for="email">E-Mail Address <span class="error">*</span></label>
                                    <input id="register-email" type="email" class="form-control" name="email"
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" required
                                           autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group main_box">
                                    <label for="mnumber">Mobile Number <span class="error">*</span></label>
                                    <input id="register-mobile" type="text" class="form-control" maxlength="11"
                                           name="mobile" pattern="[0-9]*" value=""
                                           onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                           required>
                                    <div class="invalid-feedback">
                                        Mobile number is invalid
                                    </div>
                                </div>

                                <div class="form-group main_box" id="register-user-div">
                                    <label for="username">User name <span class="error">*</span></label>
                                    <input type="text" class="form-control" name="username" id="register-user-name"
                                           value="">
                                    <div class="invalid-feedback">
                                        User name is required
                                    </div>
                                </div>

                                <div class="form-group main_box" id="register-optician-gppractice-div" style="display: none">
                                    <label for="oname">GP Practic<span class="error">*</span></label>
                                    <select class="form-control" name="gp_practice" id="gp_practice" value="" autofocus>
                                        <option value="">Select GP Practice</option>
                                        <?php foreach (constant('GP_PRACTICE') as $key => $list) { ?>
                                            <option value ="<?php echo $key;?>"><?php echo $list;?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        GP Practice is required
                                    </div>
                                </div>


                                <div class="form-group main_box">
                                    <label for="password">Password <span class="error">*</span></label>
                                    <input type="password" class="form-control" name="password" id="register-password"
                                           value="" required>
                                    <div class="invalid-feedback invalid-password">

                                    </div>
                                </div>


                                <div class="form-group main_box" id="register-optician-practice-div">
                                    <label for="oname">Optician Practice Name <span class="error">*</span></label>
                                    <input type="text" class="form-control" name="optician_shop_name"
                                           id="register-optician-practice-name" value="" autofocus>
                                    <div class="invalid-feedback">
                                        Optician practice name is invalid
                                    </div>
                                </div>

                                <div class="form-group main_box" id="register-goc-div">
                                    <label for="greg">GOC registrations <span class="error">*</span></label>
                                    <input type="text" class="form-control" name="optician_register_number"
                                           id="register-goc-registration" value="" autofocus>
                                    <div class="invalid-feedback">
                                        GOC registrations is invalid
                                    </div>
                                </div>

                                <div class="form-group main_box form-bot-check">
                                    <label for="register-bot"
                                           id="register-bot-label"><?php echo $lang['text_what_is'] . ' ' . rand(1, 10) . ' ' . $lang['text_plus'] . ' ' . rand(1, 10); ?>
                                        = <em> *</em></label>
                                    <input type="number" name="bot-check" class="form-control" id="register-bot"
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter correct value!
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" id="register-submit" name="register"
                                            class="btn btn-primary btn-block">
                                        Create Account
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