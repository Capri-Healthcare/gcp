<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
                <div class="breadcrumbs d-inline-block">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'patients'; ?>">Patients</a></li>
                        <li><?php echo $page_title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right">
            </div>
        </div>
    </div>

    <form action="<?php echo $action; ?>" method="post"  onsubmit="return validateMyForm(event);">
        <input type="hidden" name="_token" value="<?php echo $token; ?>">
        <input type="hidden" name="patient[id]" value="<?php echo $result['id']; ?>">
        <input type="hidden" name="patient[referral_id]" value="<?php echo isset($_GET['referralid']) ?$_GET['referralid']:'' ?>">

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
                        <a class="nav-link" href="#patient-additional-information" data-toggle="tab">Additional
                            Information</a>
                    </li>
                </ul>
                <div class="tab-content pt-4">
                    <div class="tab-pane active" id="patient-info">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Title <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="ti-check-box"></i></span></div>
                                        <select name="patient[title]" class="custom-select" required>
                                            <option value="">Select</option>
                                            <option value="Mr." <?php if ($result['title'] == 'Mr.') {
                                                echo "selected";
                                            } ?>>Mr.
                                            </option>
                                            <option value="Mrs." <?php if ($result['title'] == 'Mrs.') {
                                                echo "selected";
                                            } ?>>Mrs.
                                            </option>
                                            <option value="Ms." <?php if ($result['title'] == 'Ms.') {
                                                echo "selected";
                                            } ?>>Ms.
                                            </option>
                                            <option value="Miss." <?php if ($result['title'] == 'Miss.') {
                                                echo "selected";
                                            } ?>>Miss.
                                            </option>
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
                                        <input type="text" name="patient[firstname]" class="form-control"
                                               value="<?php echo $result['firstname']; ?>"
                                               placeholder="Enter First Name . . . " required>
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
                                        <input type="text" name="patient[lastname]" class="form-control"
                                               value="<?php echo $result['lastname']; ?>"
                                               placeholder="Enter Last Name . . . " required>
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
                                        <input type="email" name="patient[mail]" class="form-control"
                                               value="<?php echo $result['email']; ?>"
                                               placeholder="Enter Email Address . . . " required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Phone/Mobile number<span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                                        </div>
                                        <input type="text" name="patient[mobile]" class="form-control mobile" id="mobile"
                                               value="<?php echo $result['mobile']; ?>" maxlength="11"
                                               onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"

                                               placeholder="Enter Mobile Number . . . " required>
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
                                        <input type="text" id="user-dob" name="patient[dob]"
                                               class="form-control bg-white" value="<?php if (!empty($result['dob'])) {
                                            echo date_format(date_create($result['dob']), $common['info']['date_format']);
                                        } ?>" placeholder="Enter Date of Birth . . . " autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gender <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="ti-check-box"></i></span></div>
                                        <select name="patient[gender]" class="custom-select" required>
                                            <option value="Male" <?php if ($result['gender'] == 'Male') {
                                                echo "selected";
                                            } ?>>Male
                                            </option>
                                            <option value="Female" <?php if ($result['gender'] == 'Female') {
                                                echo "selected";
                                            } ?>>Female
                                            </option>
                                            <option value="Other" <?php if ($result['gender'] == 'Other') {
                                                echo "selected";
                                            } ?>>Other
                                            </option>
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
										<option value="Single" <?php if ($result['marital_status'] == 'Single') {
                                echo "selected";
                            } ?>>Single</option>
										<option value="Married" <?php if ($result['marital_status'] == 'Married') {
                                echo "selected";
                            } ?>>Married</option>
										<option value="Widowed" <?php if ($result['marital_status'] == 'Widowed') {
                                echo "selected";
                            } ?>>Widowed</option>
										<option value="Divorced" <?php if ($result['marital_status'] == 'Divorced') {
                                echo "selected";
                            } ?>>Divorced</option>
										<option value="Separated" <?php if ($result['marital_status'] == 'Separated') {
                                echo "selected";
                            } ?>>Separated</option>
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
										<option value="A+" <?php if ($result['bloodgroup'] == 'A+') {
                                echo "selected";
                            } ?>>A+</option>
										<option value="A-" <?php if ($result['bloodgroup'] == 'A-') {
                                echo "selected";
                            } ?>>A-</option>
										<option value="B+" <?php if ($result['bloodgroup'] == 'B+') {
                                echo "selected";
                            } ?>>B+</option>
										<option value="B-" <?php if ($result['bloodgroup'] == 'B-') {
                                echo "selected";
                            } ?>>B-</option>
										<option value="O+" <?php if ($result['bloodgroup'] == 'O+') {
                                echo "selected";
                            } ?>>O+</option>
										<option value="O-" <?php if ($result['bloodgroup'] == 'O-') {
                                echo "selected";
                            } ?>>O-</option>
										<option value="AB+" <?php if ($result['bloodgroup'] == 'AB+') {
                                echo "selected";
                            } ?>>AB+</option>
										<option value="AB-" <?php if ($result['bloodgroup'] == 'AB-') {
                                echo "selected";
                            } ?>>AB-</option>
									</select>
								</div>
							</div>
						</div-->
                            <div class="col-md-3">
                            </div>
                            <!--						<div class="col-md-3">-->
                            <!--							<div class="form-group">-->
                            <!--								<label>Do you/the patient have any disabilities? <span class="form-required">*</span></label>-->
                            <!--								<div class="input-group">-->
                            <!--									<div class="input-group-prepend">-->
                            <!--										<span class="input-group-text"><i class="ti-heart-broken"></i></span>-->
                            <!--									</div>-->
                            <!--									<select name="patient[is_patient_have_any_disabilities]" class="custom-select" required>-->
                            <!--										<option value="Yes" >Yes</option>-->
                            <!--										<option value="No">No</option>-->
                            <!--									</select>-->
                            <!--								</div>-->
                            <!--							</div>-->
                            <!--						</div>-->
                            <!--                            <div class="col-md-9">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>Please provide disabilities details</label>-->
                            <!--                                    <div class="input-group">-->
                            <!--                                        <div class="input-group-prepend">-->
                            <!--                                            <span class="input-group-text"><i class="ti-check-box"></i></span>-->
                            <!--                                        </div>-->
                            <!--                                        <input type="text" name="patient[disabilities_details]" class="form-control"-->
                            <!--                                               value="-->
                            <?php //echo $result['disabilities_details']; ?><!--"-->
                            <!--                                               placeholder="Enter disabilities details">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="col-md-12">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>Special Requirements (eg other language / other communication method)</label>-->
                            <!--                                    <div class="input-group">-->
                            <!--                                        <div class="input-group-prepend">-->
                            <!--                                            <span class="input-group-text"><i class="ti-check-box"></i></span>-->
                            <!--                                        </div>-->
                            <!--                                        <input type="text" name="patient[special_requirements]" class="form-control"-->
                            <!--                                               value="-->
                            <?php //echo $result['special_requirements']; ?><!--"-->
                            <!--                                               placeholder="Enter special requirements">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NHS Patient Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-check-box"></i></span>
                                        </div>
                                        <input type="text" name="patient[nhs_patient_number]" class="form-control"
                                               value="<?php echo $result['nhs_patient_number']; ?>" maxlength="10"
                                               onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                               placeholder="NHS Patient Number">
                                    </div>
                                </div>
                            </div>
                            <!--						<div class="col-md-6">-->
                            <!--							<div class="form-group">-->
                            <!--								<label>NHS Hostpital Number</label>-->
                            <!--								<div class="input-group">-->
                            <!--									<div class="input-group-prepend">-->
                            <!--										<span class="input-group-text"><i class="ti-check-box"></i></span>-->
                            <!--									</div>-->
                            <!--									<input type="text" name="patient[nhs_hospital_number]" class="form-control" value="-->
                            <?php //echo $result['nhs_hospital_number']; ?><!--" placeholder="NHS Hostpital Number">-->
                            <!--								</div>-->
                            <!--							</div>-->
                            <!--						</div>-->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>GP Practice</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-hospital"></i></span></div>
                                        <input type="text" name="patient[gp_practice]" class="form-control"
                                               id="gp_practice"
                                               value="<?php echo $result['gp_practice'] != 0 ? $gp_practices[$result['gp_practice']] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>GP Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" name="patient[gp_name]" class="form-control gcp-name"
                                               value="<?php echo $result['gp_name']; ?>"
                                               placeholder="GP Name">
                                        <input type="hidden" name="" class="form-control gcp-practice-id"
                                               value="<?php echo $result['patient_id']; ?>">

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
                                        <input type="text" name="patient[gp_address]" class="form-control"
                                               value="<?php echo $result['gp_address']; ?>" placeholder="GP Address">
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($_GET['referral'])) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select hospital for appoinment</label>
                                        <br/>
                                        <?php foreach (constant('HOSPITAL_LIST') as $key => $list) { ?>
                                            <div class="custom-control custom-radio custom-radio-1 d-inline-block">
                                                <input type="radio" name="patient[hospital_code]"
                                                    class="custom-control-input hospital_code" value="<?php echo $key; ?>" id="" checked>
                                                <label class="custom-control-label" for="prescription_template-template-1">&nbsp;<b><?php echo $list['name'] ?></b></label>
                                                <label class="ml-4 mt-1">
                                                    <i class="ti-mobile"></i><?php echo $list['mobile'] ?> &nbsp;&nbsp;<i
                                                            class="ti-email"></i>&nbsp;<?php echo $list['email'] ?>
                                                    <br><i class="ti-location-pin"></i><?php echo $list['address'] ?><br><i
                                                            class="ti-world"></i>&nbsp;<?php echo $list['web'] ?>
                                                </label>
                                            </div>
                                            <hr/>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty($result['id'])) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ti-check-box"></i></span></div>
                                            <select name="patient[status]" class="custom-select">
                                                <option value="1" <?php if ($result['status'] == '1') {
                                                    echo "selected";
                                                } ?>>Active
                                                </option>
                                                <option value="0" <?php if ($result['status'] == '0') {
                                                    echo "selected";
                                                } ?>>InActive
                                                </option>
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
                                        <input type="text" name="patient[address][address1]" class="form-control"
                                               value="<?php echo $result['address']['address1']; ?>"
                                               placeholder="Enter Address Line 1 . . .">
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
                                        <input type="text" name="patient[address][address2]" class="form-control"
                                               value="<?php echo $result['address']['address2']; ?>"
                                               placeholder="Enter Address Line 2 . . .">
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
                                <input type="text" name="patient[address][city]" class="form-control"
                                       value="<?php echo $result['address']['city']; ?>" placeholder="Enter City . . .">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-map"></i></span>
                                </div>
                                <input type="text" name="patient[address][country]" class="form-control"
                                       value="<?php echo $result['address']['country']; ?>"
                                       placeholder="Enter Country . . .">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-pin"></i></span>
                                </div>
                                <input type="text" name="patient[address][postal]" maxlength="7" class="form-control"
                                       value="<?php echo $result['address']['postal']; ?>"
                                       placeholder="Enter Postal Code . . ."  onkeypress="return alphaNumericValidation(event)">
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
                                            <input type="checkbox" name="patient[history][]"
                                                   class="custom-control-input" value="<?php echo $value; ?>"
                                                   id="<?php echo $key; ?>" <?php if (!empty($result['history'])) {
                                                foreach ($result['history'] as $k => $v) {
                                                    if ($v == $value) {
                                                        echo "checked";
                                                    }
                                                }
                                            } ?>>
                                            <label class="custom-control-label"
                                                   for="<?php echo $key; ?>"><?php echo $value; ?></label>
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
                                <textarea name="patient[other]" class="form-control"
                                          placeholder="Patient other history . . ."><?php echo $result['other']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="patient-additional-information">
                        <div class="row">
                            <?php
                            $insurance_field_readonly = "";
                            if (in_array($result['how_the_account_is_to_be_settled'], ['Not Applicable', 'Self Funding'])) {
                                $insurance_field_readonly = "disabled";
                            }
                            ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Indicate how the account is to be settled</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="ti-check-box"></i></span></div>
                                        <select name="patient[how_the_account_is_to_be_settled]"
                                                id="how_the_account_is_to_be_settled" class="custom-select">
                                            <option value="">Select</option>
                                            <option value="Not Applicable" <?php if ($result['how_the_account_is_to_be_settled'] == 'Not Applicable') {
                                                echo "selected";
                                            } ?>>Not Applicable
                                            </option>
                                            <option value="Self Funding" <?php if ($result['how_the_account_is_to_be_settled'] == 'Self Funding') {
                                                echo "selected";
                                            } ?>>Self Funding
                                            </option>
                                            <option value="Medically Insured" <?php if ($result['how_the_account_is_to_be_settled'] == 'Medically Insured') {
                                                echo "selected";
                                            } ?>>Medically Insured
                                            </option>
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
                                        <input type="text"
                                               name="patient[policyholders_name]" <?php echo $insurance_field_readonly ?>
                                               class="form-control" id="policyholders_name"
                                               value="<?php echo $result['policyholders_name']; ?>"
                                               placeholder="Enter Policyholder's Name">
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
                                        <select name="patient[medical_insurers_name]" id="medical_insurers_name"
                                                class="custom-select" <?php echo $insurance_field_readonly ?>>
                                            <option value="">Select Medical insurers name</option>
                                            <?php if (!empty(MEDICALE_INSURANCE_COMPANIES)) {
                                                foreach (MEDICALE_INSURANCE_COMPANIES as $insurance_company_code => $insurance_company_name) { ?>
                                                    <option value="<?php echo $insurance_company_code ?>" <?php echo ($result['medical_insurers_name'] == $insurance_company_code) ? "Selected" : "" ?>><?php echo $insurance_company_name; ?></option>
                                                <?php }
                                            } ?>
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
                                        <input type="text"
                                               name="patient[membership_number]" <?php echo $insurance_field_readonly ?>
                                               class="form-control" id="membership_number"
                                               value="<?php echo $result['membership_number']; ?>"
                                               placeholder="Enter Membership Number">
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
                                        <input type="text"
                                               name="patient[scheme_name]" <?php echo $insurance_field_readonly ?>
                                               class="form-control" id="scheme_name"
                                               value="<?php echo $result['scheme_name']; ?>"
                                               placeholder="Enter Scheme/Plan Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer text-center">
            <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save
            </button>
        </div>
        </div>
    </form>
    <!-- Footer -->
    <script>

        $("#gcp_required").on('change', function () {

            var selectedValue = $('option:selected', this).text();
            if (selectedValue.trim() == "NO" || selectedValue.trim() == "OFFER") {

                $("#id_gcp_followup_frequency").val("").change();


                $(".first_payment").val("").change();
                $(".regular_payment").val("").change();


                $("#id_gcp_followup_frequency").prop('required', true);
                $("#gcp_followup_frequency").hide();
                $("#first_payment").hide();
                $("#regular_payment").hide();

                $(".first_payment").prop('required', false);
                $(".regular_payment").prop('required', false);
                $("#id_gcp_followup_frequency").prop('required', false);

            } else {
                $("#gcp_followup_frequency").show();
                $("#first_payment").show();
                $("#regular_payment").show();
                $(".first_payment").prop('required', true);
                $(".regular_payment").prop('required', true);

            }
        })


        $("#gp_practice").autocomplete({
            source: window.origin + "/admin/index.php?route=gppractices/search",
            minLength: 2,
            focus: function () {
                return false;
            },
            select: function (event, ui) {
                $('#gp_practice').val(ui.item.gp_practice_name);
                return false;
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append('<div>' + item.gp_practice_name + '</div>')
                .appendTo(ul);
        };

        function validateMyForm(e) {
            var mobile = $("#mobile").val();

            if (mobile.length < 10 || mobile.length < 11) {
                toastr.error('Error', 'Mobile number must be 11 digits.');
                return false
            }else{
                return true;
            }
        }
        function alphaNumericValidation(e) {
            var keyCode = e.keyCode || e.which;

            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z0-9 ]+$/;

            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                return isValid
            }

            return isValid;
        }
    </script>
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>