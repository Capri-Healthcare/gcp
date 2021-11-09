<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>

    <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
    <script src="public/js/jquery.fancybox.min.js"></script>

    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="page-title-text d-inline-block">Patient View</h2>
                <div class="breadcrumbs d-inline-block">
                    <ul>
                        <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'patients'; ?>">Patients</a></li>
                        <li><?php echo $result['title'] . ' ' . $result['firstname'] . ' ' . $result['lastname']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="user-avtar">
                        <span><?php echo $result['firstname'][0]; ?></span>
                    </div>
                    <div class="user-details text-center pt-3">
                        <h3><?php echo $result['title'] . ' ' . ucfirst($result['firstname']) . ' ' . strtolower($result['lastname']); ?></h3>
                        <ul class="v-menu text-left pt-3 nav d-block">
                            <li><a href="#patient-info" class="<?php echo !isset($email_type) ? 'active' : '' ?>"
                                   data-toggle="tab"><i class="ti-info-alt"></i> <span>Patient Info</span></a></li>
                            <li><a href="#additional-information" data-toggle="tab"><i class="ti-info-alt"></i> <span>Additional Information</span></a>
                            </li>
                            <?php if ($result['is_glaucoma_required'] == 'YES') { ?>
                                <li><a href="#patient-direct-debit" data-toggle="tab"><i class="ti-folder"></i> <span>My Eye Record & Care</span></a>
                                </li>
                            <?php } ?>
                            <?php if ($page_notes) { ?>
                                <li><a href="#patient-notes" data-toggle="tab"><i class="ti-files"></i> <span>Examination Notes</span></a>
                                </li>
                            <?php }
                            if ($page_documents) { ?>
                                <li><a href="#patient-documents" data-toggle="tab"><i class="ti-archive"></i> <span>Scans & Reports</span></a>
                                </li>
                            <?php }
                            if ($page_prescriptions) { ?>
                                <li><a href="#patient-prescription" data-toggle="tab"><i class="ti-notepad"></i> <span>Prescription</span></a>
                                </li>
                            <?php }
                            if ($page_appointments) { ?>
                                <li><a href="#patient-appointment" data-toggle="tab"><i class="ti-calendar"></i> <span>Appointments</span></a>
                                </li>
                            <?php }
                            if ($page_invoices) { ?>
                                <li><a href="#patient-invoice" data-toggle="tab"><i class="ti-receipt"></i> <span>Invoices</span></a>
                                </li>
                            <?php } ?>
                            <?php if ($page_edit) { ?>
                                <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'patient/edit&id=' . $result['id']; ?>"><i
                                                class="ti-pencil-alt"></i> <span>Edit Patient</span></a></li>
                            <?php }
                            if ($page_sendmail) { ?>
                                <li><a href="#patient-sendmail" class="<?php echo isset($email_type) ? 'active' : '' ?>"
                                       data-toggle="tab"><i class="ti-email"></i> <span>Send Email</span></a></li>
                            <?php } ?>
                            <?php if ($page_notes) { ?>
                                <li><a href="#patient-letters" data-toggle="tab"><i class="ti-files"></i>
                                        <span>Letters</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane fade <?php echo !isset($email_type) ? 'show active' : '' ?>" id="patient-info">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Patient Info</div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped patient-table">
                                <tbody>
                                <tr>
                                    <td>Email Address</td>
                                    <td><?php echo $result['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Preferred Contact Number</td>
                                    <td><?php echo $result['mobile']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alternate Contact Number</td>
                                    <td><?php echo $result['office_number']; ?></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><?php if (!empty($result['dob'])) {
                                            echo date_format(date_create($result['dob']), $common['info']['date_format']) . '(' . $result['age'] . ' years)';
                                        } ?> </td>
                                    <?php if (!empty($value['dob'])) {
                                        echo date_format(date_create($value['dob']), $common['info']['date_format']);
                                    } ?>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $result['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php if (!empty($result['address'])) {
                                            echo implode(', ', $result['address']);
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td>Medical History</td>
                                    <td><?php if (!empty($result['history'])) {
                                            echo implode(', ', $result['history']);
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td>Other History</td>
                                    <td><?php echo $result['other']; ?></td>
                                </tr>
                                <tr>
                                    <td>NHS Number</td>
                                    <td><?php echo $result['nhs_patient_number']; ?></td>
                                </tr>
                                <tr>
                                    <td>GP Name</td>
                                    <td><?php echo $result['gp_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>GP Practice</td>
                                    <td><?php echo $result['gp_practice'] != 0 ? $gp_practices[$result['gp_practice']] : ''; ?></td>
                                </tr>
                                <tr>
                                    <td>GP Email</td>
                                    <td><?php echo $result['gp_email']; ?></td>
                                </tr>
                                <tr>
                                    <td>GP Address</td>
                                    <td><?php echo $result['gp_address']; ?></td>
                                </tr>
                                <!--                                <tr>-->
                                <!--                                    <td>First payment</td>-->
                                <!--                                    <td>-->
                                <?php //echo $result['first_payment']; ?><!--</td>-->
                                <!--                                </tr>-->
                                <tr>
                                    <td>Regular payment</td>
                                    <td><?php echo $result['regular_payment']; ?></td>
                                </tr>
                                <!--								<tr>-->
                                <!--									<td>Do you/the patient have any disabilities?</td>-->
                                <!--									<td>-->
                                <?php //echo $result['is_patient_have_any_disabilities']; ?><!--</td>-->
                                <!--								</tr>-->
                                <!--								<tr>-->
                                <!--									<td>Disabilities details</td>-->
                                <!--									<td>-->
                                <?php //echo $result['disabilities_details']; ?><!--</td>-->
                                <!--								</tr>-->
                                <!--								<tr>-->
                                <!--									<td>Special Requirements</td>-->
                                <!--									<td>-->
                                <?php //echo $result['special_requirements']; ?><!--</td>-->
                                <!--								</tr>-->
                                <tr>
                                    <td>Email Confirmation</td>
                                    <?php if ($result['emailconfirmed'] == '0') { ?>
                                        <td class="text-danger">Unconfirmed</td>
                                    <?php } else { ?>
                                        <td class="text-success">Confirmed</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <?php if ($result['status'] == '0') { ?>
                                        <td class="text-danger">Inactive</td>
                                    <?php } else { ?>
                                        <td class="text-success">Active</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td><?php echo date_format(date_create($result['date_of_joining']), $common['info']['date_format']); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="additional-information">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Additional Information</div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped patient-table">
                                <tbody>
                                <tr>
                                    <td>How the account is to be settled</td>
                                    <td><?php echo $result['how_the_account_is_to_be_settled']; ?></td>
                                </tr>
                                <tr>
                                    <td>Policyholder's Name</td>
                                    <td><?php echo $result['policyholders_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Medical Insurer's Name</td>
                                    <td><?php echo $result['medical_insurers_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Membership Number</td>
                                    <td><?php echo $result['membership_number']; ?></td>
                                </tr>
                                <tr>
                                    <td>Scheme/Plan Name</td>
                                    <td><?php echo $result['scheme_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Authorisation Number</td>
                                    <td><?php echo $result['authorisation_number']; ?></td>
                                </tr>
                                <!--								<tr>-->
                                <!--									<td>Corporate/Company Scheme</td>-->
                                <!--									<td>-->
                                <?php //echo $result['corporate_company_scheme']; ?><!--</td>-->
                                <!--								</tr>-->
                                <!--								<tr>-->
                                <!--									<td>Employer</td>-->
                                <!--									<td>-->
                                <?php //echo $result['employer']; ?><!--</td>-->
                                <!--								</tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if ($page_appointments) { ?>
                    <div class="tab-pane fade" id="patient-appointment">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Patient's Appointments</div>
                                <div class="panel-action">
                                    <?php if ($appointment_add) { ?>
                                        <a class="btn btn-primary btn-sm appointment-sidebar" href="<?php echo 'index.php?route=appointments&id='.$result['id']?>"><i
                                                    class="ti-plus pr-2"></i> New Appointment</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-middle table-bordered table-striped datatable-table">
                                    <thead>
                                    <tr class="table-heading">
                                        <th class="table-srno">#</th>
                                        <th>Doctor Info</th>
                                        <th>DateTime</th>
                                        <th>Status</th>
                                        <?php if ($appointment_view) { ?>
                                            <th></th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($appointments)) {
                                        foreach ($appointments as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td class="text-primary">Dr. <?php echo $value['doctor']; ?></td>
                                                <td><?php echo date_format(date_create($value['date']), $common['info']['date_format']) . ' AT ' . $value['time']; ?></td>
                                                <td>
                                                    <?php if ($value['status'] == 1) {
                                                        echo '<span class="label label-warning">In process</span>';
                                                    } elseif ($value['status'] == 2) {
                                                        echo '<span class="label label-warning">Document Requested</span>';
                                                    } elseif ($value['status'] == 3) {
                                                        echo '<span class="label label-success">Confirmed</span>';
                                                    } elseif ($value['status'] == 4) {
                                                    } elseif ($value['status'] == 5) {
                                                        echo '<span class="label label--default">Completed</span>';
                                                    } elseif ($value['status'] == 6) {
                                                        echo '<span class="label label-danger">Cancelled</span>';
                                                    } else {
                                                        echo '<span class="label label-primary">New</span>';
                                                    } ?>
                                                </td>
                                                <?php if ($appointment_view) { ?>
                                                    <td class="table-action">
                                                        <?php if ($appointment_view) { ?>
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointment/view&id=' . $value['id']; ?>"
                                                               class="text-primary edit" data-toggle="tooltip"
                                                               title="View" target="_blank"><i
                                                                        class="ti-layout-media-center-alt"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_invoices) { ?>
                    <div class="tab-pane fade" id="patient-invoice">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Patient's Invoices</div>
                                <div class="panel-action">
                                    <?php if ($invoice_add) { ?>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/add'; ?>"
                                           class="btn btn-primary btn-sm" target="_blank"><i class="ti-plus pr-2"></i>
                                            New Invoice</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-middle table-bordered table-striped datatable-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Due</th>
                                        <th>Status</th>
                                        <th>Invoice Date</th>
                                        <?php if ($invoice_view || $invoice_delete) { ?>
                                            <th></th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($invoices)) {
                                        foreach ($invoices as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $common['info']['invoice_prefix'] . str_pad($value['id'], 4, '0', STR_PAD_LEFT); ?></td>
                                                <td><?php echo $common['info']['currency_abbr'] . $value['amount']; ?></td>
                                                <td><?php echo $common['info']['currency_abbr'] . $value['due']; ?></td>
                                                <td>
                                                    <?php if ($value['status'] == "Paid") { ?>
                                                        <span class="label label-success">Paid</span>
                                                    <?php } elseif ($value['status'] == "Unpaid") { ?>
                                                        <span class="label label-danger">Unpaid</span>
                                                    <?php } elseif ($value['status'] == "Pending") { ?>
                                                        <span class="label label-secondary">Pending</span>
                                                    <?php } elseif ($value['status'] == "In Process") { ?>
                                                        <span class="label label-primary">In Process</span>
                                                    <?php } elseif ($value['status'] == "Cancelled") { ?>
                                                        <span class="label label-warning">Cancelled</span>
                                                    <?php } elseif ($value['status'] == "Other") { ?>
                                                        <span class="label label-default">Other</span>
                                                    <?php } elseif ($value['status'] == "Partially Paid") { ?>
                                                        <span class="label label-info badge-pill badge-sm">Partially Paid</span>
                                                    <?php } else { ?>
                                                        <span class="label label-white">Unknown</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo date_format(date_create($value['invoicedate']), $common['info']['date_format']); ?></td>
                                                <?php if ($invoice_view || $invoice_delete) { ?>
                                                    <td class="table-action">
                                                        <?php if ($invoice_view) { ?>
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/view&id=' . $value['id']; ?>"
                                                               class="text-primary edit" data-toggle="tooltip"
                                                               title="View" target="_blank"><i
                                                                        class="ti-layout-media-center-alt"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_notes) { ?>
                    <div class="tab-pane fade" id="patient-notes">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Examination Notes</div>
                            </div>
                            <div class="panel-body">
                                <div class="notes-container">
                                    <?php if (!empty($appointments)) { ?>
                                        <div class="timeline-1 timeline-2">
                                            <div class="marker"></div>
                                            <?php //foreach ($notes as $key => $value) {
                                            if (!empty($appointments)) {
                                                foreach ($appointments as $key => $value) {
                                                    //echo "<pre>";print_r($value);exit;
                                                    //$value['notes'] = json_decode($value['notes'], true);

                                                    $finding_forms = $formObj->getFindingFormsByDepartments($value['department_id']);
                                                    $doctor_info = $doctorObj->getDoctor($value['doctor_id']);
                                                    $note_details = $appointmentObj->getClinicalNotes($value['id']);


                                                    $notes['notes'] = json_decode($note_details['notes'], true);
                                                    //$notes = $note_details;
                                                    //print_r($notes);exit;
                                                    ?>
                                                    <div class="item item-left pb-4">
                                                        <div class="circle"><img
                                                                    src="<?php echo '../public/uploads/' . $doctor_info['picture']; ?>"
                                                                    alt=""></div>
                                                        <div class="arrow"></div>
                                                        <div class="time"><?php echo $doctor_info['title'] . ' ' . $doctor_info['firstname'] . ' ' . $doctor_info['lastname'] . ' (' . date_format(date_create($value['date']), $common['info']['date_format']) . ' AT ' . $value['time'] . ')'; ?></div>
                                                        <div class="item-content">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive"
                                                                             style="overflow: hidden">
                                                                            <table class="table table-striped patient-table">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>Current event (History)</td>
                                                                                    <td class="text-dark"><?php echo isset($value['current_event']) ? $value['current_event'] : ''; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Allergy</td>
                                                                                    <td class="text-dark"><?php echo isset($value['allergy']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['ALLERGY'][$value['allergy']] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Visual acuity</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['visual_acuity_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$value['visual_acuity_right']] : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['visual_acuity_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$value['visual_acuity_left']] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Visual acuity-unaided, glasses and pin hole</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['visual_acuity_unaided_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$value['visual_acuity_unaided_right']] : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['visual_acuity_unaided_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$value['visual_acuity_unaided_left']] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Intraocular pressure(mmHg)</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['intraocular_pressure_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['INTRAOCULAR_PRESSURE'][$value['intraocular_pressure_right']] : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['intraocular_pressure_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['INTRAOCULAR_PRESSURE'][$value['intraocular_pressure_left']] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        <?php if ($summary['appointment_count'] >= 2) { ?>
                                                                                            <div class="row">

                                                                                                <div class="col-md-12">
                                                                                                    <div id="container"
                                                                                                         class="container">

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Anterior chamber</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['anterior_chamber_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['ANTERIOR_CHAMBER'][$value['anterior_chamber_right']] : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['anterior_chamber_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['ANTERIOR_CHAMBER'][$value['anterior_chamber_left']] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Anterior chamber comment</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['anterior_chamber_right_comment']) ? $value['anterior_chamber_right_comment'] : '' ?>

                                                                                                </td>
                                                                                                <td style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['anterior_chamber_left_comment']) ? $value['anterior_chamber_left_comment'] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lens</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['lens_right']) ? $value['lens_right'] : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['lens_left']) ? $value['lens_left'] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Disc (oct)</td>
                                                                                    <td class="text-dark">
                                                                                        <div class="report-container">
                                                                                            <?php if (!empty($reports)) {
                                                                                                foreach ($reports as $oct_key => $oct_value) {
                                                                                                    $file_ext = pathinfo($oct_value['report'], PATHINFO_EXTENSION);
                                                                                                    if ($file_ext == "pdf") { ?>
                                                                                                        <?php if ($oct_value['name'] == 'OCT - Right eye' || $oct_value['name'] == 'OCT - Left eye') { ?>
                                                                                                            <div class="report-image report-pdf">
                                                                                                                <a href="../public/uploads/appointment/reports/<?php echo $oct_value['appointment_id'] . '/' . $oct_value['report']; ?>"
                                                                                                                   class="open-pdf font-12"
                                                                                                                   style="display: block;">
                                                                                                                    <img class="img-thumbnail"
                                                                                                                         src="../public/images/pdf.png"
                                                                                                                         alt="">
                                                                                                                    <span><?php echo $oct_value['name']; ?></span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    } else { ?>
                                                                                                        <?php if ($oct_value['name'] == 'OCT - Right eye' || $oct_value['name'] == 'OCT - Left eye') { ?>

                                                                                                            <div class="report-image">
                                                                                                                <a data-fancybox="gallery"
                                                                                                                   href="../public/uploads/appointment/reports/<?php echo $oct_value['appointment_id'] . '/' . $oct_value['report']; ?>">
                                                                                                                    <img class="img-thumbnail"
                                                                                                                         src="../public/uploads/appointment/reports/<?php echo $oct_value['appointment_id'] . '/' . $oct_value['report']; ?>"
                                                                                                                         alt="">
                                                                                                                    <span><?php echo $oct_value['name']; ?></span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    }
                                                                                                }
                                                                                            } else { ?>
                                                                                                <p class="text-danger text-center">
                                                                                                    No documents found
                                                                                                    !!!</p>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>CCT</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['cct_right']) ? $value['cct_right'] : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['cct_left']) ? $value['cct_left'] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>NFL thickness</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['nfl_thickness_right']) ? $value['nfl_thickness_right'] . " mm" : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['nfl_thickness_left']) ? $value['nfl_thickness_left'] . " mm" : '' ?>
                                                                                                </td>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        <?php if ($summary['appointment_count'] >= 2) { ?>
                                                                                            <div class="rowmt-2">
                                                                                                <div class="col-md-12">
                                                                                                    <div id="nfl-chart-container"
                                                                                                         class="container">

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Fundus</td>
                                                                                    <td class="text-dark">
                                                                                        <div class="report-container">
                                                                                            <?php if (!empty($reports)) {
                                                                                                foreach ($reports as $fundus_key => $fundus_value) {
                                                                                                    $file_ext = pathinfo($fundus_value['report'], PATHINFO_EXTENSION);
                                                                                                    if ($file_ext == "pdf") { ?>
                                                                                                        <?php if ($fundus_value['name'] == 'Fundus - Right eye' || $fundus_value['name'] == 'Fundus - Left eye') { ?>
                                                                                                            <div class="report-image report-pdf">
                                                                                                                <a href="../public/uploads/appointment/reports/<?php echo $fundus_value['appointment_id'] . '/' . $fundus_value['report']; ?>"
                                                                                                                   class="open-pdf font-12"
                                                                                                                   style="display: block;">
                                                                                                                    <img class="img-thumbnail"
                                                                                                                         src="../public/images/pdf.png"
                                                                                                                         alt="">
                                                                                                                    <span><?php echo $fundus_value['name']; ?></span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    } else { ?>
                                                                                                        <?php if ($fundus_value['name'] == 'Fundus - Right eye' || $fundus_value['name'] == 'Fundus - Left eye') { ?>

                                                                                                            <div class="report-image">
                                                                                                                <a data-fancybox="gallery"
                                                                                                                   href="../public/uploads/appointment/reports/<?php echo $fundus_value['appointment_id'] . '/' . $fundus_value['report']; ?>">
                                                                                                                    <img class="img-thumbnail"
                                                                                                                         src="../public/uploads/appointment/reports/<?php echo $fundus_value['appointment_id'] . '/' . $fundus_value['report']; ?>"
                                                                                                                         alt="">
                                                                                                                    <span><?php echo $fundus_value['name']; ?></span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    }
                                                                                                }
                                                                                            } else { ?>
                                                                                                <p class="text-danger text-center">
                                                                                                    No documents found
                                                                                                    !!!</p>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Visual field test plots</td>
                                                                                    <td class="text-dark">
                                                                                        <div class="report-container">
                                                                                            <?php if (!empty($reports)) {
                                                                                                foreach ($reports as $visual_field_key => $visual_field_value) {
                                                                                                    $file_ext = pathinfo($visual_field_value['report'], PATHINFO_EXTENSION);
                                                                                                    if ($file_ext == "pdf") { ?>
                                                                                                        <?php if ($visual_field_value['name'] == 'Visual fields - Right eye' || $visual_field_value['name'] == 'Visual fields - Left eye') { ?>
                                                                                                            <div class="report-image report-pdf">
                                                                                                                <a href="../public/uploads/appointment/reports/<?php echo $visual_field_value['appointment_id'] . '/' . $visual_field_value['report']; ?>"
                                                                                                                   class="open-pdf font-12"
                                                                                                                   style="display: block;">
                                                                                                                    <img class="img-thumbnail"
                                                                                                                         src="../public/images/pdf.png"
                                                                                                                         alt="">
                                                                                                                    <span><?php echo $visual_field_value['name']; ?></span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    } else { ?>
                                                                                                        <?php if ($visual_field_value['name'] == 'Visual fields - Right eye' || $visual_field_value['name'] == 'Visual fields - Left eye') { ?>

                                                                                                            <div class="report-image">
                                                                                                                <a data-fancybox="gallery"
                                                                                                                   href="../public/uploads/appointment/reports/<?php echo $visual_field_value['appointment_id'] . '/' . $visual_field_value['report']; ?>">
                                                                                                                    <img class="img-thumbnail"
                                                                                                                         src="../public/uploads/appointment/reports/<?php echo $visual_field_value['appointment_id'] . '/' . $visual_field_value['report']; ?>"
                                                                                                                         alt="">
                                                                                                                    <span><?php echo $visual_field_value['name']; ?></span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    }
                                                                                                }
                                                                                            } else { ?>
                                                                                                <p class="text-danger text-center">
                                                                                                    No documents found
                                                                                                    !!!</p>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Visual Field Progression</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['visual_field_progression_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_FIELD_PROGRESSION'][$value['visual_field_progression_right']] : '' ?>

                                                                                                </td>
                                                                                                <td style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['visual_field_progression_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_FIELD_PROGRESSION'][$value['visual_field_progression_left']] : '' ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Mean deviation</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['mean_deviation_right']) ? $value['mean_deviation_right'] . " db" : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['mean_deviation_left']) ? $value['mean_deviation_left'] . " db" : '' ?>
                                                                                                </td>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        <?php if ($summary['appointment_count'] >= 2) { ?>
                                                                                            <div class="rowmt-2">
                                                                                                <div class="col-md-12">
                                                                                                    <div id="md-chart-container"
                                                                                                         class="container">

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>PSD deviation</td>
                                                                                    <td class="text-dark">
                                                                                        <table style="padding: 0px;">
                                                                                            <tr>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>RE: </b><?php echo isset($value['psd_deviation_right']) ? $value['psd_deviation_right'] . " db" : '' ?>

                                                                                                </td>
                                                                                                <td width="50%"
                                                                                                    style="padding:0px;">
                                                                                                    <b>LE: </b><?php echo isset($value['psd_deviation_left']) ? $value['psd_deviation_left'] . " db" : '' ?>
                                                                                                </td>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        <?php if ($summary['appointment_count'] >= 2) { ?>
                                                                                            <div class="rowmt-2">
                                                                                                <div class="col-md-12">
                                                                                                    <div id="nfl-chart-container"
                                                                                                         class="container">

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Diagnosis eye</td>
                                                                                    <td class="text-dark"><?php echo isset($value['diagnosis_eye']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$value['diagnosis_eye']] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Diagnosis</td>
                                                                                    <td class="text-dark"><?php echo isset($value['diagnosis']) ? implode(', ', json_decode($value['diagnosis'], true)) : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Diagnosis Comment</td>
                                                                                    <td class="text-dark"><?php echo isset($value['diagnosis_comment']) ? $value['diagnosis_comment'] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Outcome</td>
                                                                                    <td class="text-dark"><?php echo (isset($value['outcome']) && !empty($value['outcome'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['OUTCOME'][$value['outcome']] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Outcome Comment</td>
                                                                                    <td class="text-dark"><?php echo isset($value['outcome_comment']) ? $value['outcome_comment'] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Follow up / Next Appointment
                                                                                    </td>
                                                                                    <td class="text-dark"><?php echo (isset($value['gcp_next_appointment']) && !empty($value['gcp_next_appointment'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$value['gcp_next_appointment']]['name'] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>My Eye Record & Care Required</td>
                                                                                    <td class="text-dark"><?php echo isset($value['is_glaucoma_required']) ? $value['is_glaucoma_required'] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Doctor's Comments</td>
                                                                                    <td class="text-dark"><?php echo isset($value['doctor_note']) ? $value['doctor_note'] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Comments for Optometrist</td>
                                                                                    <td class="text-dark"><?php echo isset  ($value['doctor_note_optometrist']) ? $value['doctor_note_optometrist'] : '' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Special condition</td>
                                                                                    <td class="text-dark"><?php echo isset($value['special_condition']) ? $value['special_condition'] : '' ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>

                                        </div>
                                    <?php } else { ?>
                                        <div class="text-danger text-center">No Record Found !!!</div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_documents) { ?>
                    <div class="tab-pane fade" id="patient-documents">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Scans & Reports</div>
                            </div>
                            <div class="panel-body">
                                <?php if (!empty($reports)) { ?>
                                    <div class="report-container">
                                        <?php
                                        if (!empty($reports)) {
                                            foreach ($reports as $image) { ?>
                                                <div class="report-image">
                                                    <a data-fancybox="gallery"
                                                       href="../public/uploads/appointment/reports/<?php echo $image['appointment_id'] ?>/<?php echo $image['report']; ?>">
                                                        <img src="../public/uploads/appointment/reports/<?php echo $image['appointment_id'] ?>/<?php echo $image['report']; ?>"
                                                             alt="<?php echo $image['name']; ?>" class="blur_img">
                                                        <span><?php echo $image['name']; ?></span>
                                                        <p><?php echo date_format(date_create($image['date_of_joining']), $common['info']['date_format']); ?></p>
                                                    </a>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <p class="text-center">Image is not available</p>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <p class="text-danger text-center">No Documents Found !!!</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_prescriptions) { ?>
                    <div class="tab-pane fade" id="patient-prescription">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Prescription</div>
                            </div>
                            <div class="panel-body">
                                <div class="timeline-1 timeline-2">
                                    <div class="marker"></div>
                                    <?php if (!empty($prescriptions)) {
                                        foreach ($prescriptions as $key => $value) {
                                            $value['prescription'] = json_decode($value['prescription'], true);
                                            if (!empty($value['prescription'][$key]['name'])) { ?>
                                                <div class="item item-left pb-4">
                                                    <div class="circle"><img
                                                                src="<?php echo '../public/uploads/' . $value['d_picture']; ?>"
                                                                alt=""></div>
                                                    <div class="arrow"></div>
                                                    <div class="time"><?php echo 'Dr. ' . $value['doctor'] . ' (' . date_format(date_create($value['date_of_joining']), $common['info']['date_format']) . ')'; ?></div>
                                                    <div class="item-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Medicine Name</th>
                                                                    <th>Dose</th>
                                                                    <th>Duration</th>
                                                                    <th>Instruction</th>
                                                                </tr>
                                                                <?php foreach ($value['prescription'] as $s_key => $s_value) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="text-primary m-0"><?php echo html_entity_decode($s_value['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                                                                            <p class="m-0"><?php echo html_entity_decode($s_value['generic'], ENT_QUOTES, 'UTF-8'); ?></p>
                                                                        </td>
                                                                        <td class="text-center"><p
                                                                                    class="font-12"><?php echo $s_value['dose']; ?></p>
                                                                        </td>
                                                                        <td class="text-center"><p
                                                                                    class="font-12"><?php echo $s_value['duration'] . ' Day'; ?></p>
                                                                        </td>
                                                                        <td class="text-center"><p
                                                                                    class="font-12"><?php echo $s_value['instruction']; ?></p>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                        <div class="text-secondary mt-2 text-right">
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'prescription/pdf&id=' . $value['id']; ?>"
                                                               class="text-primary" target="_blank">PDF/Print</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_sendmail) { ?>
                    <div class="tab-pane fade <?php echo isset($email_type) ? 'show active' : '' ?>"
                         id="patient-sendmail">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Send Email to Patient</div>
                            </div>
                            <form action="<?php echo URL_ADMIN . DIR_ROUTE . 'patient/sendmail'; ?>" method="post">
                                <input type="hidden" name="_token" value="<?php echo $common['token']; ?>" readonly>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="text"
                                               value="<?php echo $result['firstname'] . ' ' . $result['lastname']; ?>"
                                               class="form-control" readonly>
                                        <input type="hidden" name="mail[id]" value="<?php echo $result['id']; ?>">
                                        <?php if (isset($video_consultation_link)) {
                                            echo '<input type="hidden" name="mail[video_consultation_link]" value="' . $video_consultation_link . '">';
                                        } ?>
                                        <?php if (isset($tokBoxSession['tokbox_session_id'])) {
                                            echo "<input type='hidden' name='mail[tokbox_session_id]' value='" . $tokBoxSession['tokbox_session_id'] . "'>";
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>CC</label>
                                        <input type="text" name="mail[cc]" class="form-control"
                                               value="<?php echo $cc; ?>" placeholder="Enter cc email address . . .">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="mail[subject]" class="form-control"
                                               value="<?php echo $email_subject; ?>" placeholder="Enter Subject . . .">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="mail[message]" class="form-control mail-summernote"
                                                  placeholder="Enter Message . . .">
										<?php echo $email_body; ?>
									</textarea>
                                    </div>
                                </div>
                                <div class="panel-footer text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }
                if ($page_notes) { ?>
                    <div class="tab-pane fade" id="patient-letters">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Download letter</div>
                            </div>
                            <div class="panel-body">
                                <div class="notes-container">
                                    <?php if (!empty($appointments)) { ?>
                                        <div class="timeline-1 timeline-2">
                                            <div class="marker"></div>
                                            <?php if (!empty($appointments)) {
                                                foreach ($appointments as $key => $value) { ?>
                                                    <div class="item item-left pb-4">
                                                        <div class="circle"><img
                                                                    src="<?php echo '../public/uploads/' . $doctor_info['picture']; ?>"
                                                                    alt=""></div>
                                                        <div class="arrow"></div>
                                                        <div class="time"><?php echo $doctor_info['title'] . ' ' . $doctor_info['firstname'] . ' ' . $doctor_info['lastname'] . ' (' . date_format(date_create($value['date']), $common['info']['date_format']) . ' AT ' . $value['time'] . ')'; ?></div>
                                                        <div class="item-content">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive"
                                                                             style="overflow: hidden">
                                                                            <table class="table table-striped patient-table">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>To Patient / GP</td>
                                                                                    <td class="text-dark">
                                                                                 <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $value['id']; ?>&doc_type=to_patient_or_gp&action=download"><i
                                                            class="ti-download"></i></a>
                                            </span>
                                                                                        <span style="font-size: 16px; margin-right: 15px;">
                                                <a target="_blank" href="index.php?route=appointment/view&id=<?php echo $value['id']; ?>&doc_type=to_patient_or_gp"><i
                                                            class="ti-email"></i></a>
                                            </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                <td>To Optom / Third Party</td>
                                                                                <td class="text-dark">
                                                                                 <span style="font-size: 16px; margin-right: 15px;">
                                                    <a href="index.php?route=appointment/letters&id=<?php echo $value['id']; ?>&doc_type=to_optom_or_third_party&action=download"><i
                                                                class="ti-download"></i></a>
                                                </span>
                                                                                    <span style="font-size: 16px; margin-right: 15px;">
                                                    <a target="_blank" href="index.php?route=appointment/view&id=<?php echo $value['id']; ?>&doc_type=to_optom_or_third_party"><i
                                                                class="ti-email"></i></a>
                                                </span>
                                                                                </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>

                                        </div>
                                    <?php } else { ?>
                                        <div class="text-danger text-center">No Record Found !!!</div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--			<div class="tab-pane fade" id="appointment-suporting-images">-->
                <!--				<div class="panel panel-default">-->
                <!--					<div class="panel-head">-->
                <!--						<div class="panel-title">Images</div>-->
                <!--					</div>-->
                <!--					<div class="panel-body">-->
                <!--						<div class="report-container">-->

                <!--						</div>-->
                <!--					</div>-->
                <!--				</div>-->
                <!--			</div>-->
                <?php if ($result['is_glaucoma_required'] == 'YES') { ?>
                    <div class="tab-pane fade" id="patient-direct-debit">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">My Eye Record & Care</div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped patient-table">
                                    <tbody>
                                    <tr>
                                        <td>My Eye Record & Care Required</td>
                                        <td>
                                            <?php echo isset($result['is_glaucoma_required']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['GLAUCOMA_CARE_PLAN_REQUIRED'][$result['is_glaucoma_required']] : '' ?>
                                        </td>
                                    </tr>
                                    <?php if ($result['is_glaucoma_required'] == 'YES') { ?>
                                        <tr>
                                            <td>MERCFollowup Frequency</td>
                                            <td>
                                                <?php echo isset($result['gcp_followup_frequency']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$result['gcp_followup_frequency']]['name'] : '' ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>MERCform</td>
                                        <td>
                                            <div class="report-container">
                                                <?php if (!empty($result['ddi_image'])) { ?>

                                                    <div class="report-image">
                                                        <a data-fancybox="gallery"
                                                           href="../public/uploads/patient/document/<?php echo $result['id'] ?>/<?php echo $result['ddi_image']; ?>">
                                                            <img src="../public/uploads/patient/document/<?php echo $result['id'] ?>/<?php echo $result['ddi_image']; ?>"
                                                                 alt="<?php echo $result['ddi_image']; ?>"
                                                                 class="blur_img">
                                                            <span><?php echo $result['ddi_image']; ?></span>
                                                            <center>
                                                                <a href="../public/uploads/patient/document/<?php echo $result['id'] ?>/<?php echo $result['ddi_image']; ?>"
                                                                   class="btn btn-primary"
                                                                   download="<?php echo $result['ddi_image']; ?>">Download</a>
                                                            </center>
                                                        </a>
                                                    </div>

                                                <?php } else { ?>
                                                    <p class="text-center">Image is not available</p>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php if ($appointment_add) { ?>
    <div class="sidebar sidebar-right appointmet-sidebar">
        <div class="sidebar-hdr">
            <div class="sidebar-close"><i class="ti-close"></i></div>
            <h3 class="title">Appointment</h3>
        </div>
        <form class="sidebar-bdy" action="<?php echo $action_new_appointment; ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo $common['token']; ?>">
            <div id="apnt-info">
                <input type="hidden" class="apnt-id" name="appointment[id]">
                <div class="form-group mb-2">
                    <label>Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-timer"></i></span>
                        </div>
                        <input type="text" name="appointment[name]" class="form-control patient-name"
                               value="<?php echo $result['firstname'] . ' ' . $result['lastname']; ?>"
                               placeholder="Enter Name . . ." required>
                        <input type="hidden" name="appointment[patient_id]" value="<?php echo $result['id']; ?>"
                               class="form-control patient-id">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Email Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-timer"></i></span>
                        </div>
                        <input type="text" name="appointment[mail]" class="form-control patient-mail"
                               value="<?php echo $result['email']; ?>" placeholder="Enter Email Address . . ." required>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Mobile Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-timer"></i></span>
                        </div>
                        <input type="text" name="appointment[mobile]" class="form-control patient-mobile"
                               value="<?php echo $result['mobile']; ?>" placeholder="Enter Mobile Number . . ."
                               required>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Doctor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-timer"></i></span>
                        </div>
                        <select name="appointment[doctor]" class="custom-select apnt-doctor" data-live-search="true"
                                required>
                            <option value="">Select Doctor</option>
                            <?php foreach ($doctors as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"
                                        data-department="<?php echo $value['department_id']; ?>"
                                        data-weekly="<?php echo htmlspecialchars($value['weekly'], ENT_QUOTES, 'UTF-8'); ?>"
                                        data-national="<?php echo htmlspecialchars($value['national'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo $value['name'] . ' (' . $value['department'] . ')'; ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" class="apnt-department" name="appointment[department]" value="">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-timer"></i></span>
                        </div>
                        <input type="text" name="appointment[date]" class="form-control apnt-date" value=""
                               placeholder="Select Date . . ." required autocomplete="off">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Time</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-timer"></i></span>
                        </div>
                        <input type="text" name="appointment[time]" class="form-control apnt-time" value="" required
                               readonly>
                        <input type="hidden" name="appointment[slot]" class="apnt-slot-time" value="" required>
                    </div>
                    <div class="apnt-slot"></div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-check-box"></i></span>
                        </div>
                        <select name="appointment[status]" class="custom-select apnt-status" required>
                            <option value="">Select appointment status</option>
                            <?php if (!empty(APPOINTMENT_STATUS)) {
                                foreach (APPOINTMENT_STATUS as $status_id => $status) { ?>
                                    <option value="<?php echo $status_id ?>"><?php echo $status; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="sidebar-ftr text-right">
                <a href="#" class="btn btn-default">View</a>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="public/js/appointment.js"></script>
<?php } ?>

    <!-- include summernote css/js-->
    <link href="public/css/summernote-bs4.css" rel="stylesheet">
    <script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="public/js/klinikal.summernote.js"></script>

    <script>
        $("a.open-pdf").fancybox({
            'frameWidth': 800,
            'frameHeight': 800,
            'overlayShow': true,
            'hideOnContentClick': false,
            'type': 'iframe'
        });
    </script>
    <!-- Footer -->
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>