<?php echo $header; ?>
    <section class="my-login-page">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Forgot Password</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address <span class="error">*</span></label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

                                <div class="form-group">
									<label for="number">What is 9 plus 1 = <span class="error">*</span></label>
									<input type="number" class="form-control" name="number" required data-eye>
								    <div class="invalid-feedback">
                                        Please Enter Correct Value!
							    	</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Send Reset Link
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