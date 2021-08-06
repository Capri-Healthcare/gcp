<form action="<?php echo $action; ?>" method="post" class="row pt-3">
    <input type="hidden" name="_token" value="<?php echo $token ?>">
    <div class="col-md-4">
        <div class="input-box">
            <label for="title"><?php echo $lang['text_title']; ?></label>
            <select disabled="true" id="title" name="title" required>
                <option value=""><?php echo $lang['text_title']; ?></option>
                <option value="Mr." <?php if ($user_data['title'] == 'Mr.') { echo "selected"; } ?>><?php echo $lang['text_mr']; ?></option>
                <option value="Mrs." <?php if ($user_data['title'] == 'Mrs.') { echo "selected"; } ?>><?php echo $lang['text_mrs']; ?></option>
                <option value="Ms." <?php if ($user_data['title'] == 'Ms.') { echo "selected"; } ?>><?php echo $lang['text_ms']; ?></option>
                <option value="Miss." <?php if ($user_data['title'] == 'Miss.') { echo "selected"; } ?>><?php echo $lang['text_miss']; ?></option>
            </select>            
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="firstname" ><?php echo $lang['text_first_name']; ?></label>
            <input readonly type="text" id="firstname" name="firstname" pattern="[A-Z,a-z, ]*" value="<?php echo $user_data['firstname']; ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="lastname"><?php echo $lang['text_last_name']; ?></label>
            <input readonly type="text" id="lastname" name="lastname" pattern="[A-Z,a-z, ]*" value="<?php echo $user_data['lastname']; ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="email"><?php echo $lang['text_email_address']; ?></label>
            <input readonly type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $user_data['email']; ?>" readonly required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="mobile"><?php echo $lang['text_mobile_number']; ?></label>
            <input readonly type="text" id="mobile" name="mobile" pattern="[0-9]*" value="<?php echo $user_data['mobile']; ?>" 
            maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="dob"><?php echo $lang['text_birthday']; ?></label>
            <input readonly type="text" id="dob" name="dob" value="<?php echo date_format(date_create($user_data['dob']), $siteinfo['date_format']); ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="gender"><?php echo $lang['text_gender']; ?></label>
            <select disabled="true" id="gender" name="gender" required>
                <option value=""><?php echo $lang['text_gender']; ?></option>
                <option value="Male" <?php if ($user_data['gender'] == 'Male') { echo "selected"; } ?>><?php echo $lang['text_male']; ?></option>
                <option value="Female" <?php if ($user_data['gender'] == 'Female') { echo "selected"; } ?>><?php echo $lang['text_female']; ?></option>
                <option value="Prefer not to disclose" <?php if ($user_data['gender'] == 'Prefer not to disclose') { echo "selected"; } ?>><?php echo $lang['text_prefer_not_to_disclose']; ?></option>
                <option value="Other" <?php if ($user_data['gender'] == 'Other') { echo "selected"; } ?>><?php echo $lang['text_other']; ?></option>
            </select>
        </div>
    </div>
    <!--div class="col-md-4">
        <div class="input-box">
            <select name="marital_status" required>
                <option value=""><?php echo $lang['text_marital_status']; ?></option>
                <option value="<?php echo $lang['text_single'] ?>" <?php if ($user_data['marital_status'] == $lang['text_single']) { echo "selected"; } ?>><?php echo $lang['text_single']; ?></option>
                <option value="<?php echo $lang['text_married'] ?>" <?php if ($user_data['marital_status'] == $lang['text_married']) { echo "selected"; } ?>><?php echo $lang['text_married']; ?></option>
                <option value="<?php echo $lang['text_widowed'] ?>" <?php if ($user_data['marital_status'] == $lang['text_widowed']) { echo "selected"; } ?>><?php echo $lang['text_widowed']; ?></option>
                <option value="<?php echo $lang['text_divorced'] ?>" <?php if ($user_data['marital_status'] == $lang['text_divorced']) { echo "selected"; } ?>><?php echo $lang['text_divorced']; ?></option>
                <option value="<?php echo $lang['text_separated'] ?>" <?php if ($user_data['marital_status'] == $lang['text_separated']) { echo "selected"; } ?>><?php echo $lang['text_separated']; ?></option>
            </select>
            <label><?php echo $lang['text_marital_status']; ?></label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <select name="bloodgroup">
                <option value=""><?php echo $lang['text_blood_group']; ?></option>
                <option value="O+" <?php if ($user_data['bloodgroup'] == 'O+') { echo "selected"; } ?>>O+</option>
                <option value="A+" <?php if ($user_data['bloodgroup'] == 'A+') { echo "selected"; } ?>>A+</option>
                <option value="B+" <?php if ($user_data['bloodgroup'] == 'B+') { echo "selected"; } ?>>B+</option>
                <option value="O-" <?php if ($user_data['bloodgroup'] == 'O-') { echo "selected"; } ?>>O-</option>
                <option value="A-" <?php if ($user_data['bloodgroup'] == 'A-') { echo "selected"; } ?>>A-</option>
                <option value="B-" <?php if ($user_data['bloodgroup'] == 'B-') { echo "selected"; } ?>>B-</option>
                <option value="AB+" <?php if ($user_data['bloodgroup'] == 'AB+') { echo "selected"; } ?>>AB+</option>
                <option value="AB-" <?php if ($user_data['bloodgroup'] == 'AB-') { echo "selected"; } ?>>AB-</option>
            </select>
            <label class="col-form-label"><?php echo $lang['text_blood_group']; ?></label>
        </div>
    </div-->

<!--    <div class="col-md-12">-->
<!--        <div class="input-box">-->
<!--            <input type="text" name="disabilities_details" value="--><?php //echo $user_data['disabilities_details']; ?><!--">-->
<!--            <label class="col-form-label">--><?php //echo $lang['text_disabilities_details']; ?><!--</label>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-12">-->
<!--        <div class="input-box">-->
<!--            <input type="text" name="special_requirements" value="--><?php //echo $user_data['special_requirements']; ?><!--">-->
<!--            <label>--><?php //echo $lang['text_special_requirements']; ?><!--</label>-->
<!--        </div>-->
<!--    </div>-->
    <div class="col-12">
        <div class="br-dotted-1 mb-4"></div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label class="col-form-label" for="address1"><?php echo $lang['text_address_line1']; ?></label>
            <input readonly type="text" id="address1" name="address[address1]" value="<?php echo $user_data['address']['address1']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label class="col-form-label" for="address2"><?php echo $lang['text_address_line2']; ?></label>
            <input readonly type="text" id="address2" name="address[address2]" value="<?php echo $user_data['address']['address2']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label class="col-form-label" for="city"><?php echo $lang['text_city']; ?></label>
            <input readonly type="text" id="city" name="address[city]" value="<?php echo $user_data['address']['city']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label class="col-form-label" for="country"><?php echo $lang['text_country']; ?></label>
            <input readonly type="text" id="country" name="address[country]" value="<?php echo $user_data['address']['country']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label class="col-form-label" for="postal"><?php echo $lang['text_postal_code']; ?></label>
            <input readonly type="text" id="postal" name="address[postal]" value="<?php echo $user_data['address']['postal']; ?>" maxlength="8" onkeypress="return alphaNumericValidation(event)">
        </div>
    </div>
    <div class="col-12">
        <div class="br-dotted-1 mb-4"></div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="nhs_patient_number"><?php echo $lang['text_nhs_patient_number']; ?></label>
            <input readonly type="number" id="nhs_patient_number" name="nhs_patient_number" maxlength="10" value="<?php echo $user_data['nhs_patient_number']; ?>">
        </div>
    </div>
<!--    <div class="col-md-4">-->
<!--        <div class="input-box">-->
<!--            <input type="text" name="nhs_hospital_number" value="--><?php //echo $user_data['nhs_hospital_number']; ?><!--">-->
<!--            <label>--><?php //echo $lang['text_nhs_hospital_number']; ?><!--</label>-->
<!--        </div>-->
<!--    </div>-->
    <div class="col-12">
        <div class="br-dotted-1 mb-4"></div>
    </div>
    <!--div class="col-md-4">
        <div class="input-box">
            <input type="text" name="gp_name" value="<?php echo $user_data['gp_name']; ?>">
            <label><?php echo $lang['text_gp_name']; ?></label>
        </div>
    </div-->
    <div class="col-md-4">
        <div class="input-box">
            <label for="gp_practice"><?php echo $lang['text_gp_practice']; ?></label>
            <select disabled="true" name="gp_practice" id="gp_practice">
                <option value="">Select <?php echo $lang['text_gp_practice']; ?></option>
                <?php 
                    foreach($gp_practices as $key => $practice){
                        echo '<option value="'.$key.'" '. (($user_data['gp_practice'] == $key) ? "selected" : "").'>'.$practice.'</option>';
                    }
                ?>
            </select>            
        </div>
    </div>
    <div class="col-md-8">
        <div class="input-box">
            <label for="gp_address"><?php echo $lang['text_gp_address']; ?></label>
            <input readonly type="text" id="gp_address" name="gp_address" value="<?php echo $user_data['gp_address']; ?>">
        </div>
    </div>
    
    <div class="col-12 pb-2">
        <div class="br-dotted-1 mb-4 text-dark"></div>
    </div>
    <div class="col-12">
        <div class="input-type-box">
            <span><?php echo $lang['text_medical_history']; ?></span>
            <div class="row">
                <?php foreach ($history as $key => $value) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="custom-control custom-checkbox font-14 mb-2">
                            <input onclick="return false;" type="checkbox" name="history[]" class="custom-control-input" value="<?php echo $value; ?>" id="<?php echo $key; ?>" <?php if (!empty($user_data['history'])) { foreach ($user_data['history'] as $k => $v) { if ($v == $value) { echo "checked"; } } } ?>>
                            <label class="custom-control-label" for="<?php echo $key; ?>"><?php echo $value; ?></label>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-box">
            <label for="other" class="col-form-label"><?php echo $lang['text_other_history']; ?></label>
            <textarea readonly id="other" name="other" rows="4"><?php echo $user_data['other']; ?></textarea>
            </div>
    </div>
    
    <div class="col-12">
        <div class="br-dotted-1 mb-4"></div>
    </div>

    <?php
        $input_class = $insurance_field_readonly = "";
        if (in_array($user_data['how_the_account_is_to_be_settled'], ['Not Applicable', 'Self Funding'])){
            $insurance_field_readonly = "disabled";
            $input_class = "readonly_input_class";
        }
    ?>
    <div class="col-md-4">
        <div class="input-box">
            <label class="col-form-label" for="how_the_account_is_to_be_settled"><?php echo $lang['text_please_indicate_how_the_account_is_to_be_settled']; ?></label>
            <select disabled="true" name="how_the_account_is_to_be_settled" id="how_the_account_is_to_be_settled">
                <option value=""><?php echo $lang['text_please_indicate_how_the_account_is_to_be_settled']; ?></option>
                <option value="<?php echo $lang['text_not_applicable'] ?>" <?php if ($user_data['how_the_account_is_to_be_settled'] == $lang['text_not_applicable']) { echo "selected"; } ?>><?php echo $lang['text_not_applicable'] ?></option>
                <option value="<?php echo $lang['text_self_funding'] ?>" <?php if ($user_data['how_the_account_is_to_be_settled'] == $lang['text_self_funding']) { echo "selected"; } ?>><?php echo $lang['text_self_funding'] ?></option>
                <option value="<?php echo $lang['text_medically_insured'] ?>" <?php if ($user_data['how_the_account_is_to_be_settled'] == $lang['text_medically_insured']) { echo "selected"; } ?>><?php echo $lang['text_medically_insured'] ?></option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="policyholders_name"><?php echo $lang['text_policyholders_name']; ?></label>
            <input readonly type="text" name="policyholders_name" value="<?php echo $user_data['policyholders_name']; ?>" id="policyholders_name" <?php echo $insurance_field_readonly ?> class="<?php echo $input_class; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="medical_insurers_name"><?php echo $lang['text_medical_insurers_name']; ?></label>
            <input readonly type="text" name="medical_insurers_name" value="<?php echo $user_data['medical_insurers_name']; ?>" id="medical_insurers_name" <?php echo $insurance_field_readonly ?> class="<?php echo $input_class; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="membership_number"><?php echo $lang['text_membership_number']; ?></label>
            <input readonly type="text" name="membership_number" value="<?php echo $user_data['membership_number']; ?>" id="membership_number" <?php echo $insurance_field_readonly ?> class="<?php echo $input_class; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-box">
            <label for="scheme_name"><?php echo $lang['text_scheme_plan_name']; ?></label>
            <input readonly type="text" name="scheme_name" value="<?php echo $user_data['scheme_name']; ?>" id="scheme_name" <?php echo $insurance_field_readonly ?> class="<?php echo $input_class; ?>">
        </div>
    </div>
<!--    <div class="col-md-4">-->
<!--        <div class="input-box">-->
<!--            <input type="text" name="authorisation_number" value="--><?php //echo $user_data['authorisation_number']; ?><!--" id="authorisation_number" --><?php //echo $insurance_field_readonly ?><!-- class="--><?php //echo $input_class; ?><!--">-->
<!--            <label>--><?php //echo $lang['text_authorisation_number']; ?><!--</label>-->
<!--        </div>-->
<!--    </div>-->

<!--    <div class="col-md-4">-->
<!--        <div class="input-box">-->
<!--            <input type="text" name="employer" value="--><?php //echo $user_data['employer']; ?><!--" id="employer" $insurance_field_readonly class="--><?php //echo $input_class; ?><!--">-->
<!--            <label>--><?php //echo $lang['text_employer']; ?><!--</label>-->
<!--        </div>-->
<!--    </div>-->

    <div class="col-12 text-center pb-3">
        <button type="submit" name="submit" class="btn btn-primary btn-shadow btn-pill"><?php echo $lang['text_save']; ?></button>
    </div>
</form>
