<?php echo $header; ?>
    <section class="my-login-page">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
                            <center>
                                <div class="tab_main">
                                    <div class="tab_button active_tab" data-login="doctor" onclick="chnageLoginForm(event)">
                                        <i class="fas fa-user-nurse"></i>
                                        <p>I'm a Doctor</p>
                                    </div>
                                    <div class="tab_button" data-login="optician" onclick="chnageLoginForm(event)">
                                        <i class="fas fa-procedures"></i>
                                        <p>I'm a Optician</p>
                                    </div>
                                    <div class="tab_button" data-login="patient" onclick="chnageLoginForm(event)">
                                        <i class="fas fa-procedures"></i>
                                        <p>I'm a Patient</p>
                                    </div>
                                </div>
                            </center>
							<form method="POST"  action="<?php echo URL.DIR_ROUTE; ?>login" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo $token; ?>">
                                <input type="hidden" name="login_from" id="login_from" value="doctor">

                                <div class="form-group main_box" id="login-user-div">
                                    <label for="username">User name <span class="error">*</span></label>
                                    <input type="text" class="form-control" name="username" id="login-user-name"
                                           value="">
                                    <div class="invalid-feedback">
                                        User name is required
                                    </div>
                                </div>

                                <div class="form-group main_box" id="login-email-div" style="display: none">
                                    <label for="email">E-Mail Address <span class="error">*</span></label>
                                    <input id="login-email" type="email" class="form-control" name="email"
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" required
                                           autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group main_box">
                                    <label for="password">Password <span class="error">*</span></label>
                                    <input type="password" class="form-control" name="password" id="login-password"
                                           value="" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group main_box form-bot-check">
                                    <label for="register-bot"
                                           id="login-bot-label"><?php echo $lang['text_what_is'] . ' ' . rand(1, 10) . ' ' . $lang['text_plus'] . ' ' . rand(1, 10); ?>
                                        = <em> *</em></label>
                                    <input type="number" name="bot-check" class="form-control" id="register-bot"
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter correct value!
                                    </div>
                                </div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="login" id="login-submit">
										Login
									</button>
								</div>
								<div class="mt-4 text-center form-group">
									Don't have an account? <a href="<?php echo URL.DIR_ROUTE; ?>register">Optician Registration</a>
								</div>

                                <div class="text-center form-group">
                                    <a href="<?php echo URL.DIR_ROUTE; ?>forgot">
										Forgot Password?
									</a>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
    </section>


<?php echo $footer; ?>