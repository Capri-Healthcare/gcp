<?php echo $header; ?>
    <section class="my-login-page my-register-page">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Optician Registration</h4>
							<form method="post" class="my-login-validation" action="<?php echo URL.DIR_ROUTE.'register'; ?>">
								<div class="form-group main_box">
									<label for="fname">First Name <span class="error">*</span></label>
									<input id="fname"  type="text" class="form-control" name="firstname" pattern="[A-Z,a-z, ]*" value="" required autofocus>
									<div class="invalid-feedback">
										First Name is invalid
									</div>
								</div>

								<div class="form-group main_box">
									<label for="lname">Last Name <span class="error">*</span></label>
									<input type="text" class="form-control"  name="lastname" pattern="[A-Z,a-z, ]*" value="" required data-eye>
								    <div class="invalid-feedback">
								    	Last Name is required
							    	</div>
								</div>

								<div class="form-group main_box">
									<label for="email">E-Mail Address <span class="error">*</span></label>
									<input id="email" type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group main_box">
									<label for="mnumber">Mobile Number <span class="error">*</span></label>
									<input type="number" class="form-control" name="mobile" pattern="[0-9]*" value="" required autofocus>
									<div class="invalid-feedback">
										Mobile Number is invalid
									</div>
								</div>

								<div class="form-group main_box">
									<label for="password">Password <span class="error">*</span></label>
									<input type="password" class="form-control" name="password" id="register-password" value="" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group main_box">
									<label for="cpassword">Confirm Password <span class="error">*</span></label>
									<input type="password" class="form-control" name="confirmpassword" id="register-confirm-password" value="" required data-eye>
								    <div class="invalid-feedback">
								    	Confirm Password is required
							    	</div>
								</div>

								<div class="form-group main_box">
									<label for="oname">Optician Practice Name <span class="error">*</span></label>
									<input type="text" class="form-control" name="optician_shop_name" id="register-optician-practice-name" value="" required autofocus>
									<div class="invalid-feedback">
										Optician Practice Name is invalid
									</div>
								</div>

								<div class="form-group main_box">
									<label for="greg">GOC registrations <span class="error">*</span></label>
									<input type="text" class="form-control" name="optician_register_number" id="register-register-number" value="" required autofocus>
									<div class="invalid-feedback">
										GOC registrations is invalid
									</div>
								</div>

                                <div class="form-group main_box form-bot-check">
                                    <label for="register-bot"><?php echo $lang['text_what_is'].' '.rand(1,10).' '.$lang['text_plus'].' '. rand(1,10); ?> = <em> *</em></label>
                                    <input type="number" name="bot-check" id="register-bot" required>
								    <div class="invalid-feedback">
                                        Please Enter Correct Value!
							    	</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Create Account
									</button>
								</div>
								<div class="mt-4 text-center form-group">
									Already have an account? <a href="<?php echo URL.DIR_ROUTE; ?>login">Login</a>
								</div>

							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
    </section>


<?php echo $footer; ?>