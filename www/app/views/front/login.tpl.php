<?php echo $header; ?>
    <section class="my-login-page">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<div class="tab_main">
								<div class="tab_button">
									<i class="fas fa-user-md"></i>
									<p>I'm a Doctor</p>
								</div>
								<div class="tab_button">
								<i class="fas fa-user-nurse"></i>
									<p>I'm a Optician</p>
								</div>
								<div class="tab_button">
									<i class="fas fa-procedures"></i>
									<p>I'm a Patient</p>
								</div>
							</div>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address <span class="error">*</span></label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password <span class="error">*</span></label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                                <div class="form-group">
									<label for="number">What is 3 plus 9 = <span class="error">*</span></label>
									<input type="number" class="form-control" name="number" required data-eye>
								    <div class="invalid-feedback">
                                        Please Enter Correct Value!
							    	</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
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