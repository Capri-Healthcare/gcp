<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
			<div class="breadcrumbs d-inline-block">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'patients'; ?>">Patients</a></li>
					<li><?php echo $page_title; ?></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right">
		</div>
	</div>
</div>

<form action="<?php echo $action; ?>" method="post">
	<input type="hidden" name="_token" value="<?php echo $token; ?>">
	<input type="hidden" name="patient[id]" value="<?php echo $result['id']; ?>">
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
				<li class="nav-item">
					<a class="nav-link active" href="#patient-info" data-toggle="tab">Basic Info</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#patient-address" data-toggle="tab">Address</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#patient-medical-history" data-toggle="tab">Medical History</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#patient-additional-information" data-toggle="tab">Additional Information</a>
				</li>
			</ul>
			<div class="tab-content pt-4">
				<div class="tab-pane active" id="patient-info">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Title <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
									<select name="patient[title]" class="custom-select" required>
										<option value="">Select</option>
										<option value="Mr." <?php if ($result['title'] == 'Mr.') { echo "selected"; } ?>>Mr.</option>
										<option value="Mrs." <?php if ($result['title'] == 'Mrs.') { echo "selected"; } ?>>Mrs.</option>
										<option value="Ms." <?php if ($result['title'] == 'Ms.') { echo "selected"; } ?>>Ms.</option>
										<option value="Miss." <?php if ($result['title'] == 'Miss.') { echo "selected"; } ?>>Miss.</option>
									</select>
								</div>
							</div>
						</div>					
						<div class="col-md-3">
							<div class="form-group">
								<label>First Name <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-user"></i></span>
									</div>
									<input type="text" name="patient[firstname]" class="form-control" value="<?php echo $result['firstname']; ?>" placeholder="Enter First Name . . . " required>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Last Name <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-user"></i></span>
									</div>
									<input type="text" name="patient[lastname]" class="form-control" value="<?php echo $result['lastname']; ?>" placeholder="Enter Last Name . . . " required>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Email Address <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-email"></i></span>
									</div>
									<input type="email" name="patient[mail]" class="form-control" value="<?php echo $result['email']; ?>" placeholder="Enter Email Address . . . " required>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Mobile Number <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-mobile"></i></span>
									</div>
									<input type="text" name="patient[mobile]" class="form-control" value="<?php echo $result['mobile']; ?>" placeholder="Enter Mobile Number . . . " required>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Date of Birth <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-calendar"></i></span>
									</div>
									<input type="text" id="user-dob" name="patient[dob]" class="form-control bg-white" value="<?php if (!empty($result['dob'])) { echo date_format(date_create($result['dob']), $common['info']['date_format']); } ?>" placeholder="Enter Date of Birth . . . "  autocomplete="off" required>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Gender <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
									<select name="patient[gender]" class="custom-select" required>
										<option value="Male" <?php if ($result['gender'] == 'Male') { echo "selected"; } ?>>Male</option>
										<option value="Female" <?php if ($result['gender'] == 'Female') { echo "selected"; } ?>>Female</option>
										<option value="Other" <?php if ($result['gender'] == 'Other') { echo "selected"; } ?>>Other</option>
									</select>
								</div>
							</div>
						</div>
						<!--div class="col-md-3">
							<div class="form-group">
								<label>Marital Status <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-heart-broken"></i></span>
									</div>
									<select name="patient[marital_status]" class="custom-select" required>
										<option value="Single" <?php if ($result['marital_status'] == 'Single') { echo "selected"; } ?>>Single</option>
										<option value="Married" <?php if ($result['marital_status'] == 'Married') { echo "selected"; } ?>>Married</option>
										<option value="Widowed" <?php if ($result['marital_status'] == 'Widowed') { echo "selected"; } ?>>Widowed</option>
										<option value="Divorced" <?php if ($result['marital_status'] == 'Divorced') { echo "selected"; } ?>>Divorced</option>
										<option value="Separated" <?php if ($result['marital_status'] == 'Separated') { echo "selected"; } ?>>Separated</option>
									</select>
								</div>
							</div>
						</div>						
						<div class="col-md-3">
							<div class="form-group">
								<label>Blood Group <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-heart-broken"></i></span>
									</div>
									<select name="patient[bloodgroup]" class="custom-select" required>
										<option value="A+" <?php if ($result['bloodgroup'] == 'A+') { echo "selected"; } ?>>A+</option>
										<option value="A-" <?php if ($result['bloodgroup'] == 'A-') { echo "selected"; } ?>>A-</option>
										<option value="B+" <?php if ($result['bloodgroup'] == 'B+') { echo "selected"; } ?>>B+</option>
										<option value="B-" <?php if ($result['bloodgroup'] == 'B-') { echo "selected"; } ?>>B-</option>
										<option value="O+" <?php if ($result['bloodgroup'] == 'O+') { echo "selected"; } ?>>O+</option>
										<option value="O-" <?php if ($result['bloodgroup'] == 'O-') { echo "selected"; } ?>>O-</option>
										<option value="AB+" <?php if ($result['bloodgroup'] == 'AB+') { echo "selected"; } ?>>AB+</option>
										<option value="AB-" <?php if ($result['bloodgroup'] == 'AB-') { echo "selected"; } ?>>AB-</option>
									</select>
								</div>
							</div>
						</div-->
                        <div class="col-md-3">
                        </div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Do you/the patient have any disabilities? <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-heart-broken"></i></span>
									</div>
									<select name="patient[is_patient_have_any_disabilities]" class="custom-select" required>
										<option value="Yes" <?php if ($result['is_patient_have_any_disabilities'] == 'Yes') { echo "selected"; } ?>>Yes</option>
										<option value="No" <?php if ($result['is_patient_have_any_disabilities'] == 'No') { echo "selected"; } ?>>No</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
								<label>Please provide disabilities details</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[disabilities_details]" class="form-control" value="<?php echo $result['disabilities_details']; ?>" placeholder="Enter disabilities details">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Special Requirements (eg other language / other communication method)</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[special_requirements]" class="form-control" value="<?php echo $result['special_requirements']; ?>" placeholder="Enter special requirements">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>NHS Patient Number</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[nhs_patient_number]" class="form-control" value="<?php echo $result['nhs_patient_number']; ?>" placeholder="NHS Patient Number">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>NHS Hostpital Number</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[nhs_hospital_number]" class="form-control" value="<?php echo $result['nhs_hospital_number']; ?>" placeholder="NHS Hostpital Number">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>GP Practice</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-hospital"></i></span></div>
									<select name="patient[gp_practice]"  class="custom-select" >
										<option value="">Select GP Practice</option>
										<?php 
											foreach($gp_practices as $key => $practice){
												echo '<option value="'.$key.'" '. (($result['gp_practice'] == $key) ? "selected" : "").'>'.$practice.'</option>';
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>GP Address</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-location-pin"></i></span>
									</div>
									<input type="text" name="patient[gp_address]" class="form-control" value="<?php echo $result['gp_address']; ?>" placeholder="GP Address">
								</div>
							</div>
						</div>
						<?php if (!empty($result['id'])) { ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Glaucoma Care Plan Require<span class="form-required">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-check-box"></i></span>
                                    </div>
                                    <select name="patient[gcp_required]" class="custom-select" id="gcp_required" required>
                                        <option value="">Select GCP</option>
                                        <option value="YES" <?php echo ($result['is_glaucoma_required'] == 'YES') ? "Selected" : "" ?>>YES</option>
                                        <option value="NO" <?php echo ($result['is_glaucoma_required'] == 'NO') ? "Selected" : "" ?>>NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6" style="display:<?php  echo ($result['is_glaucoma_required'] == 'YES') ? "block" : "none" ?>" id="gcp_followup_frequency">
                                <div class="form-group">
                                    <label>GCP Followup Frequency<span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-check-box"></i></span>
                                        </div>
                                        <select name="patient[followup]" id="id_gcp_followup_frequency" class="custom-select" <?php  echo ($result['is_glaucoma_required'] == 'YES') ? "required" : "" ?>>
                                            <option value="">Select Followup</option>
                                            <?php foreach (constant('FOLLOW_UP_DROPDOWN') as $key => $followup) { ?>
                                                <option value="<?php echo $key ?>" <?php echo ($result['gcp_followup_frequency'] == $key) ? "Selected" : "" ?>><?php echo $followup; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="first_payment" style="display:<?php  echo ($result['is_glaucoma_required'] == 'YES') ? "block" : "none" ?>">
                                <div class="form-group">
                                    <label>First Payment <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pound-sign"></i></span>
                                        </div>
                                        <input type="text" name="patient[first_payment]" class="form-control first_payment" value="<?php echo $result['first_payment']; ?>" placeholder="First Payment" <?php  echo ($result['is_glaucoma_required'] == 'YES') ? "required" : "" ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="regular_payment" style="display:<?php  echo ($result['is_glaucoma_required'] == 'YES') ? "block" : "none" ?>">
                                <div class="form-group">
                                    <label>Regular Payment <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pound-sign"></i></span>
                                        </div>
                                        <input type="text" name="patient[regular_payment]" class="form-control regular_payment" value="<?php echo $result['regular_payment']; ?>" placeholder="Regular Payment" <?php  echo ($result['is_glaucoma_required'] == 'YES') ? "required" : "" ?>>
                                    </div>
                                </div>
                            </div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
										<select name="patient[status]" class="custom-select">
											<option value="1" <?php if ($result['status'] == '1') { echo "selected";} ?>>Active</option>
											<option value="0" <?php if ($result['status'] == '0') { echo "selected";} ?>>InActive</option>
										</select>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="tab-pane" id="patient-address">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Address Line 1</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-location-pin"></i></span>
									</div>
									<input type="text" name="patient[address][address1]" class="form-control" value="<?php echo $result['address']['address1']; ?>" placeholder="Enter Address Line 1 . . .">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Address Line 2</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-location-pin"></i></span>
									</div>
									<input type="text" name="patient[address][address2]" class="form-control" value="<?php echo $result['address']['address2']; ?>" placeholder="Enter Address Line 2 . . .">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>City</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-map-alt"></i></span>
							</div>
							<input type="text" name="patient[address][city]" class="form-control" value="<?php echo $result['address']['city']; ?>" placeholder="Enter City . . .">
						</div>
					</div>
					<div class="form-group">
						<label>Country</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-map"></i></span>
							</div>
							<input type="text" name="patient[address][country]" class="form-control" value="<?php echo $result['address']['country']; ?>" placeholder="Enter Country . . .">
						</div>
					</div>
					<div class="form-group">
						<label>Postal Code</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-pin"></i></span>
							</div>
							<input type="text" name="patient[address][postal]" class="form-control" value="<?php echo $result['address']['postal']; ?>" placeholder="Enter Postal Code . . .">
						</div>
					</div>
				</div>
				<div class="tab-pane" id="patient-medical-history">
					<div class="form-group mb-2">
						<label class="d-block mb-2">Do you now or have you ever had:</label>
						<div class="row">
							<?php foreach ($history as $key => $value) { ?>
								<div class="col-md-6 col-lg-4">
									<div class="custom-control custom-checkbox mb-2">
										<input type="checkbox" name="patient[history][]" class="custom-control-input" value="<?php echo $value; ?>" id="<?php echo $key; ?>" <?php if (!empty($result['history'])) { foreach ($result['history'] as $k => $v) { if ($v == $value) { echo "checked"; } } } ?>>
										<label class="custom-control-label" for="<?php echo $key; ?>"><?php echo $value; ?></label>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label>Other History :</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-heart-broken"></i></span>
							</div>
							<textarea name="patient[other]" class="form-control" placeholder="Patient other history . . ."><?php echo $result['other']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="patient-additional-information">
					<div class="row">
						<?php
							$insurance_field_readonly = "";
							if (in_array($result['how_the_account_is_to_be_settled'], ['Not Applicable', 'Self Funding'])){
								$insurance_field_readonly = "disabled";
							}
						?>
						<div class="col-md-4">
							<div class="form-group">
								<label>Please indicate how the account is to be settled</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>									
									<select name="patient[how_the_account_is_to_be_settled]" id="how_the_account_is_to_be_settled" class="custom-select">
										<option value="">Select</option>
										<option value="Not Applicable" <?php if ($result['how_the_account_is_to_be_settled'] == 'Not Applicable') { echo "selected"; } ?>>Not Applicable</option>
										<option value="Self Funding" <?php if ($result['how_the_account_is_to_be_settled'] == 'Self Funding') { echo "selected"; } ?>>Self Funding</option>
										<option value="Medically Insured" <?php if ($result['how_the_account_is_to_be_settled'] == 'Medically Insured') { echo "selected"; } ?>>Medically Insured</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Policyholder's Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[policyholders_name]" <?php echo $insurance_field_readonly ?> class="form-control" id="policyholders_name" value="<?php echo $result['policyholders_name']; ?>" placeholder="Enter Policyholder's Name">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Medical insurers name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<!--input type="text" name="patient[medical_insurers_name]" <?php echo $insurance_field_readonly ?> class="form-control" id="medical_insurers_name" value="<?php echo $result['medical_insurers_name']; ?>" placeholder="Enter Medical insurers name"-->
									<select name="patient[medical_insurers_name]" id="medical_insurers_name" class="custom-select">
										<option value="">Select Medical insurers name</option>
										<?php if (!empty(MEDICALE_INSURANCE_COMPANIES)) { 
												foreach (MEDICALE_INSURANCE_COMPANIES as $insurance_company_code => $insurance_company_name) { ?>
											<option value="<?php echo $insurance_company_code ?>" <?php echo ($result['medical_insurers_name'] == $insurance_company_code) ? "Selected" : "" ?>><?php echo $insurance_company_name; ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Membership Number</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[membership_number]" <?php echo $insurance_field_readonly ?> class="form-control" id="membership_number" value="<?php echo $result['membership_number']; ?>" placeholder="Enter Membership Number">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Scheme/Plan Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[scheme_name]" <?php echo $insurance_field_readonly ?> class="form-control" id="scheme_name" value="<?php echo $result['scheme_name']; ?>" placeholder="Enter Scheme/Plan Name">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Authorisation Number</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[authorisation_number]" <?php echo $insurance_field_readonly ?> class="form-control" id="authorisation_number" value="<?php echo $result['authorisation_number']; ?>" placeholder="Enter Authorisation Number">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Corporate/Company Scheme</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
									<select name="patient[corporate_company_scheme]" <?php echo $insurance_field_readonly ?> class="custom-select"  id="corporate_company_scheme">
										<option value="">Select</option>
										<option value="Yes" <?php if ($result['corporate_company_scheme'] == 'Yes') { echo "selected"; } ?>>Yes</option>
										<option value="No" <?php if ($result['corporate_company_scheme'] == 'No') { echo "selected"; } ?>>No</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Employer</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<input type="text" name="patient[employer]" <?php echo $insurance_field_readonly ?> class="form-control" id="employer" value="<?php echo $result['employer']; ?>" placeholder="Enter Employer">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
		</div>
	</div>
</form>
<!-- Footer -->
    <script>
        $("#gcp_required").on('change',function () {
            if($('option:selected',this).text() == "NO"){
                $("#id_gcp_followup_frequency").val("").change();


                $(".first_payment").val("").change();
                $(".regular_payment").val("").change();


                $("#id_gcp_followup_frequency").prop('required',true);
                $("#gcp_followup_frequency").hide();
                $("#first_payment").hide();
                $("#regular_payment").hide();

                $(".first_payment").prop('required',false);
                $(".regular_payment").prop('required',false);
                $("#id_gcp_followup_frequency").prop('required',false);

            }else{
                $("#gcp_followup_frequency").show();
                $("#first_payment").show();
                $("#regular_payment").show();
                $(".first_payment").prop('required',true);
                $(".regular_payment").prop('required',true);

            }
        })
    </script>
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>