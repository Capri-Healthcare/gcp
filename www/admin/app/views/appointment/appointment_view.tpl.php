
<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
    <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
    <script src="public/js/jquery.fancybox.min.js"></script>
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
                <div class="breadcrumbs d-inline-block">
                    <ul>
                        <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointments'; ?>">Appointments</a></li>
                        <li><?php echo $page_title; ?></li>
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
                    <div class=row>
                        <div class="col-12">
                            <div class="user-avtar">
                                <?php if (!empty($result['doctor_picture']) && file_exists(DIR . 'public/uploads/' . $result['doctor_picture'])) { ?>
                                    <img class="img-fluid"
                                         src="<?php echo URL . 'public/uploads/' . $result['doctor_picture']; ?>"
                                         alt="">
                                <?php } else { ?>
                                    <span><?php echo $result['doctor_name'][0]; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        <div class="col-12">
                            <h3><?php echo $result['doctor_name']; ?></h3>
                            <p class="mb-0 font-12"><i class="ti-email"></i> <?php echo $result['doctor_email']; ?><br> <i
                                        class="ti-mobile"></i> <?php echo $result['doctor_mobile']; ?></p>
                        </div>
                    </div>
                    <div class="user-details text-center pt-3">

                        <ul class="v-menu text-left pt-0 nav d-block">
                            <li><a href="#appointment-info" class="<?php echo !isset($doc_type) ? 'active' : ''; ?>"
                                   data-toggle="tab"><i class="ti-info-alt"></i> <span>Appointment Info</span></a></li>
                            <?php if ($page_notes) { ?>
                                <li><a href="#appointment-records" data-toggle="tab"><i class="ti-calendar"></i> <span>Examination Notes</span></a>
                                </li>
                            <?php }
                            if ($page_documents) { ?>
                                <li><a href="#appointment-documents" data-toggle="tab"><i class="ti-calendar"></i>
                                        <span>Scans & Reports</span></a></li>
                            <?php }
                            if ($page_prescriptions) { ?>
                                <li><a href="#appointment-prescription" data-toggle="tab"><i class="ti-clipboard"></i>
                                        <span>Prescription</span></a></li>
                            <?php }
                            if ($invoice_view || $invoice_add) { ?>
                                <li><a href="#appointment-invoice" data-toggle="tab"><i class="ti-receipt"></i> <span>Invoice</span></a>
                                </li>
                            <?php } ?>
                            <!--li><a href="#appointment-pre-consultation-requirement" data-toggle="tab"><i
                                            class="ti-receipt"></i> <span>Pre-consultation requirement</span></a></li-->
                            <?php if ($page_edit) { ?>
                                <li>
                                    <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointment/edit&id=' . $result['id']; ?>"><i
                                                class="ti-pencil-alt"></i> <span>Edit Appointment</span></a></li>
                            <?php }
                            if ($page_sendmail) { ?>
                                <li><a href="#appointment-send-mail"
                                       class="<?php echo isset($doc_type) ? 'active' : ''; ?>"" data-toggle="tab"><i
                                            class="ti-email"></i> <span>Send Email</span></a></li>
                            <?php } 
                            if ($page_letters) { ?>
                            <li><a href="#appointment-letters" data-toggle="tab"><i class="ti-email"></i>
                                    <span>Letters</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane fade <?php echo !isset($doc_type) ? 'show active' : ''; ?>" id="appointment-info">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Appointment Info</div>
                            <?php if ($result['consultation_type'] == 'video_consultation' and $result['status'] == 3) { ?>
                                <div class="video_call_icon pull-right">
                                    <div class="icon tbl-cell">
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointment/videoConsultation&token=' . $result['video_consultation_token']; ?>">
                                            <i class="fas fa-video"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow-x: hidden !important;">
                                <table class="table table-striped patient-table">
                                    <tbody>
                                    <tr>
                                        <td>Date & Time</td>
                                        <td class="text-dark"><?php echo date_format(date_create($result['date']), $common['info']['date_format']) . ' at ' . $result['time']; ?></td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td>Consultation Method</td>-->
<!--                                        <td class="text-dark">--><?php //echo CONSULTATION_TYPE[$result['consultation_type']]; ?><!--</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>Reason/Problem</td>-->
<!--                                        <td class="text-dark">--><?php //echo $result['message']; ?><!--</td>-->
<!--                                    </tr>-->
                                    <tr>
                                        <td>Patient Name</td>
                                        <td class="text-dark"><?php echo $result['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td class="text-dark"><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone/Mobile Number</td>
                                        <td class="text-dark"><?php echo $result['mobile']; ?></td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td>Bloodgroup</td>-->
<!--                                        <td class="text-primary">--><?php //echo $result['bloodgroup']; ?><!--</td>-->
<!--                                    </tr>-->
                                    <tr>
                                        <td>Gender</td>
                                        <td class="text-info"><?php echo $result['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td class="text-success"><?php echo $result['age_year'] . ' Years ' . $result['age_month'] . ' Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NHS Number</td>
                                        <td><?php echo $result['nhs_patient_number']; ?></td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td>NHS Hostpital Number</td>-->
<!--                                        <td>--><?php //echo $result['nhs_hospital_number']; ?><!--</td>-->
<!--                                    </tr>-->
                                    <tr>
                                        <td>GP Name</td>
                                        <td><?php echo $result['gp_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>GP Address</td>
                                        <td><?php echo $result['gp_address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>GP Address</td>
                                        <td><?php echo $result['gp_postal_code']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Name</td>
                                        <td><?php echo $result['referee_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Address</td>
                                        <td><?php echo $result['referee_address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Medical History</td>
                                        <td class="text-danger"><?php if (!empty($result['history']) && is_array($result['history'])) {
                                                echo implode(', ', json_decode($result['history'], true));
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php if ($result['appointment_status'] == 1) {
                                                echo '<span class="badge badge-sm badge-pill badge-info">In process</span>';
                                            } elseif ($result['appointment_status'] == 2) {
                                                echo '<span class="badge badge-sm badge-pill badge-warning">Document Requested</span>';
                                            } elseif ($result['appointment_status'] == 3) {
                                                echo '<span class="badge badge-sm badge-pill badge-success">Confirmed</span>';
                                            } elseif ($result['appointment_status'] == 5) {
                                                echo '<span class="badge badge-sm badge-pill badge-default">Completed</span>';
                                            } elseif ($result['appointment_status'] == 6) {
                                                echo '<span class="badge badge-sm badge-pill badge-danger">Cancelled</span>';
                                            } else {
                                                echo '<span class="badge badge-sm badge-pill badge-primary">New</span>';
                                            } ?>
                                        </td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td>My Eye Record & Care Require</td>-->
<!--                                        <td>-->
<!--                                            --><?php //echo $result['is_glaucoma_required'] ?>
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    --><?php //if ($result['is_glaucoma_required'] == 'YES') { ?>
<!--                                        <tr>-->
<!--                                            <td>MERCFollowup Frequency</td>-->
<!--                                            <td>-->
<!--                                                --><?php //echo $result['gcp_followup_frequency'] ?>
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                    --><?php //} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($page_notes) { ?>
                    <div class="tab-pane fade" id="appointment-records">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Examination Notes</div>
                                <?php /* if (!empty($notes)) { ?>
                                <div class="panel-action">
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'records/pdf&id='.$notes['id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="ti-printer mr-2"></i>PDF/Print</a>
                                </div>
                            <?php } */ ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow: hidden">
                                    <table class="table table-striped patient-table">
                                        <tbody>
                                        <tr>
                                            <td>Current event (History)</td>
                                            <td class="text-dark"><?php echo isset($result['current_event']) ? $result['current_event'] : ''; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Allergy</td>
                                            <td class="text-dark"><?php echo isset($result['allergy']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['ALLERGY'][$result['allergy']] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Visual acuity unaided</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['visual_acuity_unaided_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$result['visual_acuity_unaided_right']] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['visual_acuity_unaided_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$result['visual_acuity_unaided_left']] : '' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Visual acuity corrected</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td width="50%"
                                                            style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['visual_acuity_corrected_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$result['visual_acuity_corrected_right']] : '' ?>

                                                        </td>
                                                        <td width="50%"
                                                            style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['visual_acuity_corrected_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'][$result['visual_acuity_corrected_left']] : '' ?>
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
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['intraocular_pressure_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['INTRAOCULAR_PRESSURE'][$result['intraocular_pressure_right']] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['intraocular_pressure_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['INTRAOCULAR_PRESSURE'][$result['intraocular_pressure_left']] : '' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <?php if ($summary['appointment_count'] >= 1) { ?>
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div id="container" class="container">

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CCT</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo (isset($result['cct_right']) && $result['cct_right'] > 0) ? $result['cct_right'] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo (isset($result['cct_left']) AND $result['cct_right'] > 0) ? $result['cct_left'] : '' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pupil</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo (isset($result['pupil_right'])) ? $result['pupil_right'] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo (isset($result['pupil_left'])) ? $result['pupil_left'] : '' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Anterior chamber angle</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['anterior_chamber_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['ANTERIOR_CHAMBER'][$result['anterior_chamber_right']] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['anterior_chamber_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['ANTERIOR_CHAMBER'][$result['anterior_chamber_left']] : '' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>Anterior segment</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['anterior_chamber_right_comment']) ? $result['anterior_chamber_right_comment'] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['anterior_chamber_left_comment']) ? $result['anterior_chamber_left_comment'] : '' ?>
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
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['lens_right']) ? $result['lens_right']: '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['lens_left']) ? $result['lens_left']: '' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Disc (oct)</td>
                                            <td class="text-dark">
                                                <div class="report-container">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'OCT - Right eye' || $value['name'] == 'OCT - Left eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'OCT - Right eye' || $value['name'] == 'OCT - Left eye') {?>

                                                            <div class="report-image">
                                                                <a data-fancybox="gallery"
                                                                   href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>">
                                                                    <img class="img-thumbnail"
                                                                         src="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } } } else { ?>
                                                        <p class="text-danger text-center">No documents found !!!</p>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NFL thickness</td>
                                            <td class="text-dark">
                                                <table style="padding: 0px;">
                                                    <tr>
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['nfl_thickness_right']) ? $result['nfl_thickness_right']." mm" : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['nfl_thickness_left']) ? $result['nfl_thickness_left']." mm" : '' ?></td>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php if ($summary['appointment_count'] >= 1) { ?>
                                                    <div class="rowmt-2">
                                                        <div class="col-md-12">
                                                            <div id="nfl-chart-container" class="container">

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fundus</td>
                                            <td class="text-dark">
                                                <div class="report-container">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'Fundus - Right eye' || $value['name'] == 'Fundus - Left eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'Fundus - Right eye' || $value['name'] == 'Fundus - Left eye') {?>

                                                            <div class="report-image">
                                                                <a data-fancybox="gallery"
                                                                   href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>">
                                                                    <img class="img-thumbnail"
                                                                         src="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } } } else { ?>
                                                        <p class="text-danger text-center">No documents found !!!</p>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Visual field test plots</td>
                                            <td class="text-dark">
                                                <div class="report-container">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'Visual fields - Right eye' || $value['name'] == 'Visual fields - Left eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'Visual fields - Right eye' || $value['name'] == 'Visual fields - Left eye') {?>

                                                            <div class="report-image">
                                                                <a data-fancybox="gallery"
                                                                   href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>">
                                                                    <img class="img-thumbnail"
                                                                         src="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } } } else { ?>
                                                        <p class="text-danger text-center">No documents found !!!</p>
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
                                                            <b>RE: </b><?php echo isset($result['visual_field_progression_right']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_FIELD_PROGRESSION'][$result['visual_field_progression_right']] : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['visual_field_progression_left']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_FIELD_PROGRESSION'][$result['visual_field_progression_left']] : '' ?>
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
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['mean_deviation_right']) ? $result['mean_deviation_right']." db" : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['mean_deviation_left']) ? $result['mean_deviation_left']." db" : '' ?></td>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php if ($summary['appointment_count'] >= 1) { ?>
                                                    <div class="rowmt-2">
                                                        <div class="col-md-12">
                                                            <div id="md-chart-container" class="container">

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
                                                        <td style="padding:0px;">
                                                            <b>RE: </b><?php echo isset($result['psd_deviation_right']) ? $result['psd_deviation_right']." db" : '' ?>

                                                        </td>
                                                        <td style="padding:0px;">
                                                            <b>LE: </b><?php echo isset($result['psd_deviation_left']) ? $result['psd_deviation_left']." db" : '' ?></td>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php if ($summary['appointment_count'] >= 1) { ?>
                                                    <div class="rowmt-2">
                                                        <div class="col-md-12">
                                                            <div id="nfl-chart-container" class="container">

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diagnosis eye</td>
                                            <td class="text-dark"><?php echo (isset($result['diagnosis_eye']) && !empty($result['diagnosis_eye'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$result['diagnosis_eye']] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Diagnosis</td>
                                            <td class="text-dark"><?php echo (isset($result['diagnosis'])) ? implode(', ',json_decode($result['diagnosis'],true)) : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Diagnosis Other</td>
                                            <td class="text-dark"><?php echo isset($result['diagnosis_other']) ? $result['diagnosis_other'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Operation</td>
                                            <td class="text-dark"><?php echo isset($result['operation']) ? $result['operation'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Outcome</td>
                                            <td class="text-dark"><?php echo (isset($result['outcome']) && !empty($result['outcome'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['OUTCOME'][$result['outcome']] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Outcome Comment</td>
                                            <td class="text-dark"><?php echo isset($result['outcome_comment']) ? $result['outcome_comment'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Follow up / Next Appointment</td>
                                            <td class="text-dark"><?php echo (isset($result['gcp_next_appointment']) && !empty($result['gcp_next_appointment'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$result['gcp_next_appointment']]['name']: '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>My Eye Record & Care Required</td>
                                            <td class="text-dark"><?php echo isset($result['is_glaucoma_required']) ? $result['is_glaucoma_required'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Family History of Glaucoma</td>
                                            <td class="text-dark"><?php echo isset($result['family_history_of_glaucoma']) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['FAMILY_HISTORY_OF_GLAUCOMA'][$result['family_history_of_glaucoma']] : '' ?></td>
                                        </tr>
                                        <?php if($result['family_history_of_glaucoma'] == 'YES'){ ?>
                                        <tr>
                                            <td>Who has the glaucoma condition in your family?</td>
                                            <td class="text-dark"><?php echo (isset($result['relations_with_glaucoma_patient'])) ? implode(', ',json_decode($result['relations_with_glaucoma_patient'],true)) : '' ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td>Doctor's Comments</td>
                                            <td class="text-dark"><?php echo isset($result['doctor_note']) ? $result['doctor_note'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Comments for Optometrist</td>
                                            <td class="text-dark"><?php echo isset($result['doctor_note_optometrist']) ? $result['doctor_note_optometrist'] : '' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Special condition</td>
                                            <td class="text-dark"><?php echo isset($result['special_condition']) ? $result['special_condition'] : '' ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_documents) { ?>
                    <div class="tab-pane fade" id="appointment-documents">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Scans & Reports</div>
                                <!--                            <div class="panel-title text-right">-->
                                <!--                                <a class="btn btn-secondary btn-sm" href="-->
                                <?php //echo URL_ADMIN.DIR_ROUTE.'appointment/reportsExport&id='.$result['id']; ?><!--"><i class="ti-cloud-down mr-2"></i> Download Documents/Reports</a>-->
                                <!--                            </div>-->
                            </div>
                            <div class="panel-body">
                                <div class="report-container">
                                    <?php if (!empty($reports)) {
                                        foreach ($reports as $key => $value) {
                                            $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION);
                                            if ($file_ext == "pdf") { ?>
                                                <div class="report-image report-pdf">
                                                    <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                       class="open-pdf font-12" style="display: block;">
                                                        <img class="img-thumbnail" src="../public/images/pdf.png"
                                                             alt="">
                                                        <span><?php echo $value['name']; ?></span>
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="report-image">
                                                    <a data-fancybox="gallery"
                                                       href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>">
                                                        <img class="img-thumbnail"
                                                             src="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                             alt="">
                                                        <span><?php echo $value['name']; ?></span>
                                                    </a>
                                                </div>
                                            <?php }
                                        }
                                    } else { ?>
                                        <p class="text-danger text-center">No documents found !!!</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($invoice_view || $invoice_add) { ?>
                    <div class="tab-pane fade" id="appointment-invoice">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Invoice</div>
                            </div>
                            <div class="panel-body">
                                <div class="text-center">
                                    <?php if ($result['invoice_id']) { ?>
                                        <p>Invoice is Generated</p>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/view&id=' . $result['invoice_id']; ?>"
                                           class="btn btn-danger btn-sm" target="_blank"><i
                                                    class="far fa-file-pdf mr-2"></i>View</a>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/pdf&id=' . $result['invoice_id']; ?>"
                                           class="btn btn-danger btn-sm" target="_blank"><i
                                                    class="far fa-file-pdf mr-2"></i>PDF</a>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/print&id=' . $result['invoice_id']; ?>"
                                           class="btn btn-success btn-sm" target="_blank"><i
                                                    class="ti-printer mr-2"></i>Print</a>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/edit&id=' . $result['invoice_id']; ?>"
                                           class="btn btn-info btn-sm" target="_blank"><i
                                                    class="ti-pencil-alt mr-2"></i>Edit</a>
                                    <?php } else { ?>
                                        <p>Invoice is not Generated</p>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/add&appointment=' . $result['id']; ?>"
                                           class="btn btn-primary btn-sm" target="_blank"><i class="ti-plus pr-2"></i>Generate
                                            Invoice Now</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_prescriptions) { ?>
                    <div class="tab-pane fade" id="appointment-prescription">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title">Prescription</div>
                                <?php if (!empty($prescription['prescription'])) { ?>
                                    <div class="panel-action">
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'prescription/pdf&id=' . $result['prescription_id']; ?>"
                                           class="btn btn-danger btn-sm" target="_blank"><i class="ti-printer mr-2"></i>PDF/Print</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="width: 25%;">Drug Name</th>
                                            <!--th>Generic</th-->
                                            <th style="width: 15%;">Frequency</th>
                                            <!--th style="width: 13%;">Duration</th-->
                                            <th style="width: 25%;">Instruction</th>
                                            <th style="width: 10%;">Start date</th>
                                            <th style="width: 10%;">End date</th>
                                            <th style="width: 15%;">Eye</th>
                                        </tr>
                                        <?php if (!empty($prescription['prescription'])) { ?>
                                        <?php foreach ($prescription['prescription'] as $key => $value) { ?>

                                            <tr>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['dose']; ?></td>
                                                <td><?php echo $value['instruction']; ?></td>
                                                <td><?php echo date_format(date_create($value['start_date']),'d-m-Y'); ?></td>
                                                <td><?php echo date_format(date_create($value['end_date']),'d-m-Y'); ?></td>
                                                <td><?php echo $value['eye']; ?></td>
                                            </tr>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                if ($page_sendmail) { ?>
                    <div class="tab-pane fade show <?php echo isset($doc_type) ? 'show active' : ''; ?>"
                         id="appointment-send-mail">
                        <div class="panel panel-default">
                            <div class="panel-head">
                                <div class="panel-title"><?php echo (isset($doc_type) && $doc_type != 'to_patient_or_gp') ? 'Send email to the referrer' : 'Send Email to Patient'; ?></div>
                            </div>
                            <form action="<?php echo URL_ADMIN . DIR_ROUTE . 'appointment/sendmail'; ?>" method="post"
                                  enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="text" value="<?php echo (isset($doc_type) && $doc_type != 'to_patient_or_gp') ?$result['opticianname'] :$result['name']; ?>" class="form-control"
                                               readonly>
                                        <input type="hidden" name="mail[id]" value="<?php echo $result['id']; ?>"
                                               readonly>
                                        <?php if(isset($doc_type) && $doc_type != 'to_patient_or_gp') { ?>
                                            <input type="hidden" name="mail[email]" value="<?php echo $result['opticianemail']; ?>"
                                                   readonly>
                                        <?php } ?>
                                        <input type="hidden" name="_token" value="<?php echo $token; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>CC</label>
                                        <input type="text" name="mail[cc]" class="form-control"
                                               value=""
                                               placeholder="Enter CC . . .">
                                    </div>
                                    <?php if(isset($doc_type) and $doc_type == 'to_patient_or_gp') {?>
                                        <div class="form-group">
                                            <label>GP Email</label>
                                            <input type="text" name="mail[gp_email]" class="form-control"
                                                   value="<?php echo (isset($doc_type) and !empty($result['gp_email'])) ? $result['gp_email'] : ''; ?>"
                                                   placeholder="Enter GP Email . . .">
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="mail[subject]" class="form-control"
                                               placeholder="Enter Subject . . .">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="mail[message]" class="form-control mail-summernote" placeholder="Enter Message . . .">
                                                <br><br><br><br><br><br><br><br>
                                                Best Regards, <br>
                                                My Eye Record & Care
                                        </textarea>
                                    </div>
                                    <div class="panel-action" style="text-align: left;">
                                        <div class="form-group" style="font-size: 12px;" id="preview_files"></div>
                                        <input type="hidden" name="mail[attached_leaflets]" id="attached_leaflets" value="" />
                                        <a class="btn btn-info btn-sm" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#attach-file">Attach Leaflets</a>
                                    </div>
                                    <?php if(isset($doc_type) && $doc_type != ''){ ?>
                                    <div class="form-group">
                                        <label>Attachment</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"  class="custom-control-input" value="" name="mail[attachment]" id="mail_appointment" checked>
                                            <label class="custom-control-label" for="mailPdf" id="appointment_mail_file_name"><?php echo (isset($doc_type) and $doc_type != 'to_patient_or_gp') ? 'Optom / Third Party' : 'Patient / GP'; ?> Letter</label>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php if (isset($doc_type) and !empty($doc_type)) { ?>
                                        <div class="form-group">
                                            <input type="hidden" name="mail[doc_type]" value="<?php echo $doc_type; ?>"/>
                                        </div>
                                    <?php } ?>
                                    
                                </div>
                                
                                <div class="panel-footer text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="attach-file" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Select Leaflets</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <?php foreach ($leaflets as $each) { ?>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox mb-2">
                                                <input type="checkbox" name="pre_leaflets" data-original="<?php echo $each['original_name']."(".$each['doc_name'].")"; ?>"
                                                       class="custom-control-input" value="<?php echo $each['id'] ?>"
                                                       id="<?php echo "pre_leaflet" . $each['id'] ?>" />
                                                <label class="custom-control-label"
                                                       for="<?php echo "pre_leaflet" . $each['id'] ?>"><?php echo $each['original_name']; ?></label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-footer text-center">
                                        <button type="submit" name="submit" onclick="attachLeafletFiles();" class="btn btn-primary">Attach Selected</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function attachLeafletFiles(){
                            var ids = new Array();   
                            $('input:checkbox[name=pre_leaflets]').each(function() {
                                if($(this).is(':checked')){
                                    ids.push($(this).val());
                                    $("#preview_files").append("<p><b>Attached:</b> "+$(this).data('original')+"</p>");
                                }
                            });
                            var str_ids = ids.toString();
                            $("#attached_leaflets").val(str_ids);
                            $("#attach-file").modal('hide');
                        }
                    </script>
                <?php } ?>


                <div class="tab-pane fade" id="appointment-pre-consultation-requirement">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Pre Consultation Requirement</div>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                                        <?php
                                        $active = "active";
                                        foreach ($pre_consultation_forms as $form) {
                                            if (in_array($form['id'], $selected_forms)) { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo $active ?>"
                                                       href="#pre-consultation-form-id-<?php echo $form['id'] ?>"
                                                       data-toggle="tab"><?php echo $form['name'] ?></a>
                                                </li>
                                                <?php $active = "";
                                            }
                                        } ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 pre-consultation-form">
                                    <?php
                                    $active = "active";
                                    foreach ($pre_consultation_forms as $form) {
                                        if (in_array($form['id'], $selected_forms)) { ?>
                                            <div class="tab-pane <?php echo $active ?>"
                                                 id="pre-consultation-form-id-<?php echo $form['id'] ?>">
                                                <?php
                                                $form_details = $formObj->getForm($form['id']);
                                                $form_fields = $formObj->getFormField($form['id']);
                                                $form_answer = $formObj->getFormAnswer($result['id'], $form['id']);
                                                //print_r($form_fields);exit;
                                                ?>
                                                <!--h1><?php echo $form_details['name'] ?></h1>
                                            <br>
                                            <h5><?php echo $form_details['description'] ?></h5-->
                                                <div class="row">

                                                    <?php foreach ($form_fields as $fields) {
                                                        $answer = isset($form_answer[$fields['id']]) ? $form_answer[$fields['id']] : ''; ?>
                                                        <div class="col-md-<?php echo (in_array($fields['input_type'], ['heading', 'note'])) ? '12' : '6'; ?>">
                                                            <?php if (($fields['input_type'] == 'note')) { ?>
                                                                <p class="font-15 mb-2"><?php echo $fields['note'] ?></p>
                                                            <?php } else if (($fields['input_type'] == 'heading')) { ?>
                                                                <h3 class="mt-2 mb-0"><?php echo $fields['label'] ?></h3>
                                                            <?php } else if (($fields['input_type'] == 'file')) { ?>
                                                                <h5 class="mb-0"><b><?php echo $fields['label'] ?></b>
                                                                </h5>
                                                                <?php if (!empty($answer)) {
                                                                    $image_path = '../public/uploads/appointment/forms/' . $result['id'] . '/' . $form['id'] . '/' . $answer;
                                                                    echo '<div class="col-md-1">';
                                                                    echo '<a data-fancybox="gallery" href="' . $image_path . '">';
                                                                    echo '<img class="form_thumb_img" src="' . $image_path . '">';
                                                                    echo '</a>';
                                                                    echo '</div>';
                                                                }
                                                            } else { ?>
                                                                <h5 class="mb-0"><b><?php echo $fields['label'] ?></b>
                                                                </h5>Send Email to Patient
                                                                <p class="font-12"><?php echo $answer ?></p>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <?php $active = "";
                                        }
                                    } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="appointment-letters">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Download letter</div>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <table class='table table-middle table-bordered table-striped pb-5'>
                                    <thead>
                                    <tr>
                                        <th>Document</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>To Patient / GP</td>
                                        <td> 
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a target="_blank" href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=to_patient_or_gp&action=download"><i
                                                            class="ti-download"></i></a>
                                            </span>
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/view&id=<?php echo $result['id']; ?>&doc_type=to_patient_or_gp"><i
                                                            class="ti-email"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php if(!empty($result['referee_name'])){ ?>
                                        <tr>
                                            <td>To Optom / Third Party</td>
                                            <td> 
                                                <span style="font-size: 16px; margin-right: 15px;">
                                                    <a target="_blank" href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=to_optom_or_third_party&action=download"><i
                                                    class="ti-download"></i></a>
                                                </span>
                                                <span style="font-size: 16px; margin-right: 15px;">
                                                    <a href="index.php?route=appointment/view&id=<?php echo $result['id']; ?>&doc_type=to_optom_or_third_party"><i
                                                                class="ti-email"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!--tr>
                                        <td>Discharge letter</td>
                                        <td> 
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=discharge&action=download"><i class="ti-download"></i></a>
                                            </span>
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=discharge&action=download"><i class="ti-email"></i></a>
                                            </span>
                                        </td>
                                    </tr-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php if ($page_sendmail) { ?>
    <!-- include summernote css/js-->
    <link href="public/css/summernote-bs4.css" rel="stylesheet">
    <script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="public/js/klinikal.summernote.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
<?php } ?>
    <script>
        $("a.open-pdf").fancybox({
            'frameWidth': 800,
            'frameHeight': 800,
            'overlayShow': true,
            'hideOnContentClick': false,
            'type': 'iframe'
        });

        <?php if ($summary['appointment_count'] >= 1) { ?>
        var firstChart = <?php echo json_encode($intraocularPressureChart)?>;
        var nflChart = <?php echo json_encode($nflThicknessChart)?>;
        var mdChart = <?php echo json_encode($meanDeviationChart)?>;
        var psdChart =<?php echo json_encode($psdDeviationChart)?>;
        var categories =<?php echo json_encode($categories)?>;
        <?php }?>

        $('#mail_appointment').change(function() {
            if(this.checked) {
               $("#appointment_mail_attechment").click()
            }else{
                $("#appointment_mail_file_name").text('No file chosen');
                $("#appointment_mail_attechment").val(null);
            }

        });

        document.getElementById('appointment_mail_attechment').onchange = function () {
            $("#appointment_mail_file_name").text('');
            if(this.val != ''){
                $('#mail_appointment').attr('checked', true);
                for (var i = 0; i < this.files.length; i++)
                {
                    var filename = this.files[i].name;
                    $("#appointment_mail_file_name").append(filename+',');

                }
            }else{
                $('#mail_appointment').attr('checked', false);
            }

        };

    </script>
    <script src="<?php echo URL_ADMIN . "public/js/examination_chart.js"; ?>"></script>
    <!-- Footer -->
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>