<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
    <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="public/css/custom.css">
    <script src="public/js/jquery.fancybox.min.js"></script>
    <script src="public/js/appointment.js"></script>
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointments'; ?>">Appointments</a></li>
                        <li><?php echo $page_title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointment/view&id=' . $result['id']; ?>"
                   class="btn btn-white btn-sm"><i class="ti-calendar text-primary mr-2"></i> View Appointment</a>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <input type="hidden" id="tabtitle" value="appointment-info">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                <li class="nav-item">
                    <a class="nav-link active" id="appointmentinfo" href="#appointment-info" data-toggle="tab" data-title="appointment-info" onclick="tabClick(event)">Appointment Info</a>
                </li>
                <?php if ($page_notes) { ?>
                    <li class="nav-item">
                        <a class="nav-link" id="examination" href="#appointment-records" data-toggle="tab" data-title="examination" onclick="tabClick(event)">Examination Notes</a>
                    </li>
                <?php }
                if ($page_prescriptions) { ?>
                    <li class="nav-item">
                        <a class="nav-link" id="prescription" href="#appointment-prescription" data-toggle="tab" data-title="prescription" onclick="tabClick(event)">Prescription</a>
                    </li>
                <?php }
                if ($page_document_upload || $page_documents) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#appointment-documents" data-toggle="tab" data-title="scans & reports" onclick="tabClick(event)">Scans & Reports</a>
                    </li>
                <?php }
                if ($invoice_view || $invoice_add) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#appointment-invoice" data-toggle="tab" data-title="invoice" onclick="tabClick(event)">Invoice</a>
                    </li>
                <?php } ?>
                <!--li class="nav-item">
                    <a class="nav-link" href="#appointment-pre-consultation-requirement" data-toggle="tab">Pre-consultation
                        requirements</a>
                </li-->
            </ul>
            <div class="tab-content pt-4">
                <div class="tab-pane active" id="appointment-info">
                    <form action="<?php echo $action ?>" method="post">
                        <input type="hidden" name="_token" class="token" value="<?php echo $token; ?>">
                        <input type="hidden" name="form_type" value="appointment_info">
                        <input type="hidden" class="appointment-id" name="appointment[id]"
                               value="<?php echo $result['id']; ?>">

                        <input type="hidden" class="appointment-id" name="appointment[optician_id]"
                               value="<?php echo $result['optician_id']; ?>">

                        <div id="apnt-info" class="row">
                            <div class="col-md-6">
                                <!--div class="form-group">
                                    <label>Doctor <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                        <select name="appointment[doctor]" class="custom-select apnt-doctor" required>
                                            <option value="">Select Doctor</option>
                                            <?php foreach ($doctors as $value) { ?>
                                                <option value="<?php echo $value['id']; ?>"
                                                        data-department="<?php echo $value['department_id']; ?>"
                                                        data-weekly="<?php echo htmlspecialchars($value['weekly'], ENT_QUOTES, 'UTF-8'); ?>"
                                                        data-national="<?php echo htmlspecialchars($value['national'], ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($result['doctor_id'] == $value['id']) ? 'selected' : '' ?> ><?php echo $value['name'] . ' (' . $value['department'] . ')'; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" class="apnt-department" name="appointment[department]"
                                               value="<?php echo $result['department_id']; ?>">
                                    </div>
                                </div-->
                                <input type="hidden" class="apnt-department" id="apt-doctor" name="appointment[doctor]"
                                       value="<?php echo $result['doctor_id']; ?>"  data-department="<?php echo $result['department_id']; ?>" data-weekly="<?php echo htmlspecialchars($value['weekly'], ENT_QUOTES, 'UTF-8'); ?>"   data-national="<?php echo htmlspecialchars($value['national'], ENT_QUOTES, 'UTF-8'); ?>" >
                                <input type="hidden" class="apnt-department" id="apt-department" name="appointment[department]"
                                       value="<?php echo $result['department_id']; ?>">

                                <div class="form-group">
                                    <label>Date <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control apnt-date" name="appointment[date]"
                                               placeholder="Select Date . . ."
                                               value="<?php echo date_format(date_create($result['date']),'d-m-Y'); ?>"
                                               required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Time <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-timer"></i></span>
                                        </div>
                                        <input type="text" name="appointment[time]" class="form-control apnt-time"
                                               value="<?php echo $result['time']; ?>" readonly>
                                        <input type="hidden" name="appointment[slot]" class="apnt-slot-time"
                                               value="<?php echo $result['slot']; ?>" required>
                                    </div>
                                    <div class="apnt-slot"></div>
                                </div>
                                <!--div class="form-group">
                                    <label>Consultation Method <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                        <select name="appointment[consultation_type]" class="custom-select" required>
                                            <option value="">Select consultation Method</option>
                                            <?php if (!empty(CONSULTATION_TYPE)) {
                                    foreach (CONSULTATION_TYPE as $consultation_type_key => $consultation_type_value) { ?>
                                                    <option value="<?php echo $consultation_type_key ?>" <?php echo ($result['consultation_type'] == $consultation_type_key) ? "Selected" : "" ?>><?php echo $consultation_type_value; ?></option>
                                                <?php }
                                } ?>
                                        </select>
                                    </div>
                                </div-->
                                <input type="hidden" class="apnt-department" name="appointment[consultation_type]"
                                       value="<?php echo $result['consultation_type']; ?>">

                                <div class="form-group">
                                    <label>Status <span class="form-required">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-check-box"></i></span>
                                        </div>
                                        <select name="appointment[status]" class="custom-select" required>
                                            <option value="">Select appointment status</option>
                                            <?php if (!empty(APPOINTMENT_STATUS)) {
                                                foreach (APPOINTMENT_STATUS as $status_id => $status) { ?>
                                                    <option value="<?php echo $status_id ?>" <?php echo ($result['status'] == $status_id) ? "Selected" : "" ?>><?php echo $status; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Referee Name </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-check-box"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="appointment[referee_name]"
                                               placeholder="Enter referee name"
                                               value="<?php echo $result['referee_name']; ?>"
                                               >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Referee Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-check-box"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="appointment[referee_address]"
                                               placeholder="Enter referee address"
                                               value="<?php echo $result['referee_address']; ?>"
                                               >
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="apnt-user">
                                    <div class="edit"><i class="ti-pencil-alt"></i></div>
                                    <div class="user-container">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="img">
                                                    <!-- <img src="../public/uploads/author-1.jpg" alt=""> -->
                                                    <span><?php echo $result['name'][0]; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-auto pl-0">
                                                <div class="title mt-2">
                                                    <h4 class="m-0"><a href="#"
                                                                       class="d-block text-primary"><?php echo $result['name']; ?></a>
                                                    </h4>
                                                    <p class="font-12 mb-0 mt-2"><?php echo $result['email']; ?></p>
                                                    <p class="font-12 mb-0"><?php echo $result['mobile']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p><i class="ti-heart-broken"></i>
                                            <span><?php echo $result['bloodgroup']; ?></span></p>
                                        <p><i class="ti-user"></i> <span><?php echo $result['gender']; ?></span></p>
                                        <p><i class="ti-calendar"></i>
                                            <span><?php echo $result['age_year'] . ' Years ' . $result['age_month'] . ' Month'; ?></span>
                                        </p>
                                        <p class="d-block mt-3">
                                            <?php if (!empty($result['history'])) {
                                                echo "<b>Medical history:</b> ".implode(', ', json_decode($result['history'], true));
                                            } ?>
                                        </p>
                                    </div>
                                </div>

                                <!--div class="form-group">
                                    <label>Reason/Problem</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-comment-alt"></i></span>
                                        </div>
                                        <textarea class="form-control"
                                                  name="appointment[message]"><?php echo $result['message']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Doctor Note</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-comment-alt"></i></span>
                                        </div>
                                        <textarea class="form-control"
                                                  name="appointment[doctor_note]"><?php echo $result['doctor_note']; ?></textarea>
                                    </div>
                                </div-->
                                <div class="apnt-user-input">
                                    <div class="form-group">
                                        <label>Patient Name <span class="form-required">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control apnt-name" name="appointment[name]"
                                                   value="<?php echo $result['name'] ?>"
                                                   placeholder="Enter Patient Name . . ." required>
                                            <input type="hidden" class="patient-id" name="appointment[patient_id]"
                                                   value="<?php echo $result['patient_id'] ?>">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Patient Email Address <span class="form-required">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ti-email"></i></span>
                                            </div>
                                            <input type="text" class="form-control apnt-email" name="appointment[mail]"
                                                   value="<?php echo $result['email'] ?>"
                                                   placeholder="Enter Patient Email Address . . ." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Patient Mobile Number <span class="form-required">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ti-mobile"></i></span>
                                            </div>
                                            <input type="text" class="form-control apnt-mobile"
                                                   name="appointment[mobile]" value="<?php echo $result['mobile'] ?>"
                                                   placeholder="Enter Patient Mobile Number . . ." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
                <?php if ($page_prescriptions) { ?>
                    <div class="tab-pane" id="appointment-prescription">
                        <form action="<?php echo $action ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo $token; ?>">
                            <input type="hidden" name="form_type" value="appointment_prescription">
                            <input type="hidden" name="appointment[name]" value="<?php echo $result['name']; ?>">
                            <input type="hidden" name="appointment[mail]" value="<?php echo $result['email']; ?>">
                            <input type="hidden" name="appointment[doctor]" value="<?php echo $result['doctor_id']; ?>">
                            <input type="hidden" name="appointment[patient_id]" value="<?php echo $result['name']; ?>">
                            <input type="hidden" class="appointment-id" name="appointment[id]"
                                   value="<?php echo $result['id']; ?>">
                            <input type="hidden" name="prescription[id]"
                                   value="<?php echo $result['prescription_id']; ?>">
                            <div class="table-responsive">
                                <table class="table table-bordered medicine-table">
                                    <thead>
                                    <tr class="medicine-row">
                                        <th style="width: 25%;">Drug Name</th>
                                        <!--th>Generic</th-->
                                        <th style="width: 15%;">Frequency</th>
                                        <!--th style="width: 13%;">Duration</th-->
                                        <th style="width: 25%;">Instructions</th>
                                        <th style="width: 10%;">Start date</th>
                                        <th style="width: 10%;">End date</th>
                                        <th style="width: 15%;">Eye</th>
                                        <th style="width: 5%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php if (!empty($prescription['prescription'])) {
                                        foreach ($prescription['prescription'] as $key => $value) { ?>
                                            <tr class="medicine-row">
                                                <td>
                                                    <input class="form-control prescription-name"
                                                           name="prescription[medicine][<?php echo $key; ?>][name]"
                                                           value="<?php echo $value['name'] ?>"
                                                           placeholder="Medicine Name" required>
                                                </td>
                                                <!--td>
                                                    <textarea class="form-control prescription-generic"
                                                              name="prescription[medicine][<?php echo $key; ?>][generic]"
                                                              rows="3"
                                                              placeholder="Generic"><?php echo $value['generic'] ?></textarea>
                                                </td-->
                                                <td>
                                                    <select name="prescription[medicine][<?php echo $key; ?>][dose]"
                                                            class="form-control" required>
                                                        <option value="">Select-Frequency</option>
                                                        <option value="Once a day" <?php if ($value['dose'] == 'Once a day') {
                                                            echo "selected";
                                                        } ?> >Once a day
                                                        </option>
                                                        <option value="Twice a day" <?php if ($value['dose'] == 'Twice a day') {
                                                            echo "selected";
                                                        } ?> >Twice a day
                                                        </option>
                                                        <option value="Three times a day" <?php if ($value['dose'] == 'Three times a day') {
                                                            echo "selected";
                                                        } ?> >Three times a day
                                                        </option>
                                                    </select>
                                                </td>
                                                <!--td>
                                                    <select name="prescription[medicine][<?php echo $key; ?>][duration]"
                                                            class="form-control">
                                                        <option value="1" <?php if ($value['duration'] == '1') {
                                                    echo "selected";
                                                } ?> >1 Days
                                                        </option>
                                                        <option value="2" <?php if ($value['duration'] == '2') {
                                                    echo "selected";
                                                } ?> >2 Days
                                                        </option>
                                                        <option value="3" <?php if ($value['duration'] == '3') {
                                                    echo "selected";
                                                } ?> >3 Days
                                                        </option>
                                                        <option value="4" <?php if ($value['duration'] == '4') {
                                                    echo "selected";
                                                } ?> >4 Days
                                                        </option>
                                                        <option value="5" <?php if ($value['duration'] == '5') {
                                                    echo "selected";
                                                } ?> >5 Days
                                                        </option>
                                                        <option value="6" <?php if ($value['duration'] == '6') {
                                                    echo "selected";
                                                } ?> >6 Days
                                                        </option>
                                                        <option value="8" <?php if ($value['duration'] == '8') {
                                                    echo "selected";
                                                } ?> >8 Days
                                                        </option>
                                                        <option value="10" <?php if ($value['duration'] == '10') {
                                                    echo "selected";
                                                } ?> >10 Days
                                                        </option>
                                                        <option value="15" <?php if ($value['duration'] == '15') {
                                                    echo "selected";
                                                } ?> >15 Days
                                                        </option>
                                                        <option value="20" <?php if ($value['duration'] == '20') {
                                                    echo "selected";
                                                } ?> >20 Days
                                                        </option>
                                                        <option value="30" <?php if ($value['duration'] == '30') {
                                                    echo "selected";
                                                } ?> >30 Days
                                                        </option>
                                                        <option value="60" <?php if ($value['duration'] == '60') {
                                                    echo "selected";
                                                } ?> >60 Days
                                                        </option>
                                                    </select>
                                                </td-->
                                                <td>
                                                    <textarea
                                                            name="prescription[medicine][<?php echo $key; ?>][instruction]"
                                                            class="form-control" rows="3"
                                                            placeholder="Instructions" required><?php echo $value['instruction']; ?></textarea>
                                                </td>
                                                    <td>
                                                        <input type="date" class="form-control" placeholder="Select Date . . ."
                                                            name="prescription[medicine][<?php echo $key; ?>][start_date]"
                                                               min="<?php echo date("Y-m-d"); ?>"
                                                            value="<?php echo date_format(date_create($value['start_date']),'Y-m-d'); ?>"
                                                            required autocomplete="off" style="width: 160px;">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="prescription[medicine][<?php echo $key; ?>][end_date]"
                                                            placeholder="Select Date . . ."
                                                               min="<?php echo date("Y-m-d"); ?>"
                                                            value="<?php echo date_format(date_create($value['end_date']),'Y-m-d'); ?>"
                                                            required autocomplete="off" style="width: 160px;">
                                                    </td>
                                                    <td>
                                                        <select name="prescription[medicine][<?php echo $key; ?>][eye]"
                                                                class="form-control" required>
                                                            <?php  foreach (constant('PRESCRIPTION_DROP_DOWNS')['PRESCRIPTION_EYE'] as $key1 => $value1) { ?>
                                                                <option value="<?php echo $key1; ?>"
                                                                    <?php echo (isset($value['eye']) && $value['eye'] == $key1) ? 'selected' : '' ?> >
                                                                    <?php echo $value1; ?>
                                                                </option>
                                                            <?php }   ?>
                                                        </select>
                                                    </td>
                                                <td>
                                                    <a class="table-action-button medicine-delete"><i
                                                                class="ti-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr class="medicine-row">
                                            <td>
                                                <input class="form-control prescription-name"
                                                       name="prescription[medicine][0][name]"
                                                       placeholder="Medicine Name">
                                            </td>
                                            <!--td>
                                                <textarea name="prescription[medicine][0][generic]"
                                                          class="form-control prescription-generic" rows="3"
                                                          placeholder="Generic"></textarea>
                                            </td--->
                                            <td>
                                                <select name="prescription[medicine][0][dose]" class="form-control" required>
                                                    <option value="">Select-Frequency</option>
                                                    <option value="Once a day">Once a day</option>
                                                    <option value="Twice a day">Twice a day</option>
                                                    <option value="Three times a day">Three times a day</option>
                                                </select>
                                            </td>
                                            <!--td>
                                                <select name="prescription[medicine][0][duration]" class="form-control">
                                                    <option value="1">1 Days</option>
                                                    <option value="2">2 Days</option>
                                                    <option value="3">3 Days</option>
                                                    <option value="4">4 Days</option>
                                                    <option value="5">5 Days</option>
                                                    <option value="6">6 Days</option>
                                                    <option value="8">8 Days</option>
                                                    <option value="10">10 Days</option>
                                                    <option value="15">15 Days</option>
                                                    <option value="20">20 Days</option>
                                                    <option value="30">30 Days</option>
                                                    <option value="60">60 Days</option>
                                                </select>
                                            </td-->
                                            <td>
                                                <textarea name="prescription[medicine][0][instruction]"
                                                          class="form-control" rows="3"
                                                          placeholder="Instructions" required></textarea>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control"
                                                       placeholder="Select Date . . ."
                                                       name="prescription[medicine][0][start_date]"
                                                       value=""
                                                       min="<?php echo date("Y-m-d"); ?>"
                                                       required autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control"
                                                       name="prescription[medicine][0][end_date]"
                                                       placeholder="Select Date . . ."
                                                       value=""
                                                       min="<?php echo date("Y-m-d"); ?>"
                                                       required autocomplete="off">
                                            </td>
                                            <td>
                                                <select name="prescription[medicine][0][eye]"
                                                        class="form-control">
                                                    <?php foreach (constant('PRESCRIPTION_DROP_DOWNS')['PRESCRIPTION_EYE'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>"
                                                            <?php echo (isset($value['eye']) && $value['eye'] == $key) ? 'selected' : '' ?> >
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </td>

                                            <td><a class="table-action-button medicine-delete"><i
                                                            class="ti-trash text-danger"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="8">
                                            <a id="add-medicine" class="font-12 text-primary cursor-pointer">Add
                                                Medicine</a>
                                            <?php if (!empty($result['prescription_id'])) { ?>
                                                <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'prescription/pdf&id=' . $result['prescription_id']; ?>"
                                                   class="color-green cursor-pointer pull-right" target="_blank">Print
                                                    Prescription</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i
                                            class="ti-save-alt pr-2"></i> Save
                                </button>
                            </div>
                        </form>
                        <script>
                            function medicine_autocomplete() {
                                $(".prescription-name").autocomplete({
                                    minLength: 0,
                                    source: '<?php echo URL_ADMIN . DIR_ROUTE . 'getmedicine'; ?>',
                                    focus: function (event, ui) {
                                        $(this).parents('tr').find('.prescription-name').val(ui.item.label);
                                        return false;
                                    },
                                    select: function (event, ui) {
                                        $(this).parents('tr').find('.prescription-name').val(ui.item.label);
                                        $(this).parents('tr').find('.prescription-generic').val(ui.item.generic);
                                        return false;
                                    }
                                }).autocomplete("instance")._renderItem = function (ul, item) {
                                    return $("<li>")
                                        .append("<div>" + item.label + "<br>" + item.generic + "</div>")
                                        .appendTo(ul);
                                };
                            }

                            $('body').on('keydown.autocomplete', '.prescription-name', function () {
                                medicine_autocomplete();
                            });
                            if ($(".medicine-delete").length < 2) {
                                $(".medicine-delete").hide();
                            } else {
                                $(".medicine-delete").show();
                            }

                            $('body').on('click', '.medicine-delete', function () {
                                $(this).parents('tr').remove();
                                if ($(".medicine-delete").length < 2) $(".medicine-delete").hide();
                            });

                            $('#add-medicine').click(function () {
                                if ($(".medicine-delete").length < 1) {
                                    $(".medicine-delete").hide();
                                } else {
                                    $(".medicine-delete").show();
                                }
                                var count = $('.medicine-table .medicine-row:last .prescription-name').attr('name').split('[')[2];
                                count = parseInt(count.split(']')[0]) + 1;

                                $(".medicine-table .medicine-row:last").after('<tr class="medicine-row">' +
                                    '<td><input class="form-control prescription-name" name="prescription[medicine][' + count + '][name]" value="" placeholder="Medicine Name" required></td>' +
                                    '<td><select name="prescription[medicine][' + count + '][dose]" class="form-control" required><option value="">Select-Frequency</option> <option value="Once a day">Once a day</option>\n' +
                                    '                                                    <option value="Twice a day">Twice a day</option>\n' +
                                    '                                                    <option value="Three times a day">Three times a day</option></select></td>' +
                                    '<td><textarea name="prescription[medicine][' + count + '][instruction]" class="form-control" rows="3" placeholder="Instructions"></textarea></td>' +
                                    '<td><input type="date" class="form-control apnt-date" name="prescription[medicine][' + count + '][start_date]" value="" placeholder="Select Date . . ." min="'+new Date().toISOString().split('T')[0]+'" required></td>' +
                                    '<td><input type="date" class="form-control apnt-date" name="prescription[medicine][' + count + '][end_date]" value="" placeholder="Select Date . . ." min="'+new Date().toISOString().split('T')[0]+'" required></td>' +
                                    '<td><select name="prescription[medicine][' + count + '][eye]" class="form-control"><option value="RE">Right Eye</option><option value="LE">Left Eye</option><option value="BOTH">Both Eyes</option><option value="Other" selected>Other</option></select></td>' +
                                    '<td><a class="table-action-button medicine-delete"><i class="ti-trash text-danger"></i></a></td>' +
                                    '</tr>');
                            });
                        </script>
                    </div>
                <?php }
                if ($page_notes) { ?>

                <div class="tab-pane" id="appointment-records">
                    <div class="form-group mb-2">
                        <?php if ($summary['appointment_count'] != 0) { ?>
                            <div class="summary">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="d-block mb-2">
                                            <strong><h4>Summary</h4></strong>
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr class="medicine-row">
                                                    <th style="width: 10%;">CCT RE</th>
                                                    <th style="width: 10%;">CCT LE</th>
                                                    <th style="width: 15%;">Highest IOP RE</th>
                                                    <th style="width: 15%;">Highest IOP LE</th>
                                                    <th>Allergy</th>
                                                    <th>Diagnosis</th>
                                                    <th>Special condition</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="medicine-row">
                                                    <td><?php echo $summary['summarykey']['cct_right'] ?></td>
                                                    <td><?php echo $summary['summarykey']['cct_left'] ?></td>
                                                    <td><?php echo $summary['summarykey']['iop_right'] ?></td>
                                                    <td><?php echo $summary['summarykey']['iop_left'] ?></td>
                                                    <td><?php echo $summary['summarykey']['allergy'] ?></td>
                                                    <td><?php echo $summary['summarykey']['diagnosis'] ?></td>
                                                    <td><?php echo $summary['summarykey']['special_condition'] ?></td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mt-3 mb-3">
                                            <div class="col-md-2">
                                                <!--  Hrading tabs -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if (!empty($summary['appointment']['appointment_date'])) { ?>
                                                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                                                                <?php foreach ($summary['appointment']['appointment_date'] as $key => $date) { ?>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link <?php echo ($key == 0) ? 'active' : '' ?>"
                                                                           href="#past-appointment-<?php echo str_replace('-', '', $date) ?>"
                                                                           data-toggle="tab"><?php echo date_format(date_create($date), $common['info']['date_format']) ?></a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12 pre-consultation-form">
                                                        <?php if (!empty($summary['appointment']['data'])) { ?>
                                                            <?php foreach ($summary['appointment']['data'] as $key => $list) { ?>
                                                                <div class="examination-note-tab-pane <?php echo ($key == 0) ? 'active' : ''; ?>"
                                                                     id="past-appointment-<?php echo str_replace('-', '', $list['date']) ?>">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                            <tr class="medicine-row">
                                                                                <th style="width: 10%;">CCT RE</th>
                                                                                <th style="width: 10%;">CCT LE</th>
                                                                                <th style="width: 15%;">IOP RE</th>
                                                                                <th style="width: 15%;">IOP LE</th>
                                                                                <th>Allergy</th>
                                                                                <th>Diagnosis</th>
                                                                                <th>Special condition</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr class="medicine-row">
                                                                                <?php foreach ($list['data'] as $summry_key) { ?>
                                                                                    <td><?php echo $summry_key ?></td>
                                                                                <?php } ?>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <br>
                                                                    <label class="d-block mb-2">
                                                                        <strong><h4>Treatment:</h4></strong>
                                                                    </label>
                                                                    <div class="table-responsive">
                                                                        <?php if(!empty($list['prescription'])) { ?>
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                            <th>Medicine</th>
                                                                            <th>Frequency</th>
                                                                            <th>Start date</th>
                                                                            <th>End date</th>
                                                                            <th>Instruction</th>
                                                                            <th>Eye</th>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php foreach (json_decode($list['prescription'], true) as $key => $value) { ?>

                                                                                <tr>
                                                                                    <td><?php echo $value['name']; ?></td>
                                                                                    <td><?php echo $value['dose']; ?></td>
                                                                                    <td><?php echo $value['start_date']; ?></td>
                                                                                    <td><?php echo $value['end_date']; ?></td>
                                                                                    <td><?php echo $value['instruction']; ?></td>
                                                                                    <td><?php echo $value['eye']; ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                        <?php } else{ ?>
                                                                            <span>Treatment does not specified.</span>
                                                                         <?php } ?>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="d-block mb-2">
                                    <strong><h4>Ocular Examination</h4></strong>
                                </label>
                                <form action="<?php echo $action ?>" method="post">
                                    <input type="hidden" name="_token" value="<?php echo $token; ?>">
                                    <input type="hidden" name="form_type" value="appointment_records">
                                    <input type="hidden" class="appointment-id" name="appointment[id]"
                                           value="<?php echo $result['id']; ?>">
                                    <input type="hidden" class="patient-id" name="appointment[patient_id]"
                                           value="<?php echo $result['patient_id'] ?>">
                                    <input type="hidden" class="appointment-id" name="appointment[optician_id]"
                                           value="<?php echo $result['optician_id']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Event (History)<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <textarea class="form-control" name="appointment[current_event]"
                                                              required <?php echo $examination_notes_readonly ? 'readonly':''?>><?php echo isset($result['current_event']) ? $result['current_event'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Allergy<span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[allergy]" class="custom-select"
                                                            required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select allergy</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['ALLERGY'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['allergy']) && $result['allergy'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Visual Acuity - RE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[visual_acuity_right]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select visual acuity</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['visual_acuity_right']) && $result['visual_acuity_right'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Visual Acuity-Unaided, Glasses and Pin Hole - RE</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[visual_acuity_unaided_right]"
                                                            class="custom-select" <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select visual acuity-unaided, glasses and pin hole</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['visual_acuity_unaided_right']) && $result['visual_acuity_unaided_right'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Intraocular Pressure(mmHg) - RE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[intraocular_pressure_right]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select intraocular pressure</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['INTRAOCULAR_PRESSURE'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['intraocular_pressure_right']) && $result['intraocular_pressure_right'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Visual Acuity - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[visual_acuity_left]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select visual acuity</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['visual_acuity_left']) && $result['visual_acuity_left'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Visual Acuity-Unaided, Glasses and Pin Hole - LE</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[visual_acuity_unaided_left]"
                                                            class="custom-select" <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select visual acuity-unaided, glasses and pin hole</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_ACUITY'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['visual_acuity_unaided_left']) && $result['visual_acuity_unaided_left'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Intraocular Pressure(mmHg) - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[intraocular_pressure_left]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select intraocular pressure</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['INTRAOCULAR_PRESSURE'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo ($result['intraocular_pressure_left'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($summary['appointment_count'] >= 1) { ?>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div id="container" >

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Anterior Chamber - RE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[anterior_chamber_right]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select anterior chamber</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['ANTERIOR_CHAMBER'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['anterior_chamber_right']) && $result['anterior_chamber_right'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Anterior Chamber - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[anterior_chamber_left]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select anterior chamber</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['ANTERIOR_CHAMBER'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['anterior_chamber_left']) && $result['anterior_chamber_left'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Anterior Chamber Comment - RE</label>
                                                <input type="text" class="form-control"
                                                       name="appointment[anterior_chamber_right_comment]"
                                                       value="<?php echo $result['anterior_chamber_right_comment']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Anterior Chamber Comment - LE</label>
                                                <input type="text" class="form-control"
                                                       name="appointment[anterior_chamber_left_comment]"
                                                       value="<?php echo $result['anterior_chamber_left_comment']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lens - RE</label>
                                                <input type="text" class="form-control"
                                                       name="appointment[lens_right]"
                                                       value="<?php echo $result['lens_right']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lens - LE</label>
                                                <input type="text" class="form-control"
                                                       name="appointment[lens_left]"
                                                       value="<?php echo $result['lens_left']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Disc (OCT) - RE</label><br>
                                                <div class="examination-container octrighteye">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                    <?php if($value['name'] == 'OCT - Right eye') {?>
                                                    <div class="report-image report-pdf">
                                                        <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                           class="open-pdf font-12" style="display: block;">
                                                            <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                 alt="">
                                                            <span><?php echo $value['name']; ?></span>
                                                        </a>
                                                    </div>
                                                    <?php } } else {?>
                                                    <?php if($value['name'] == 'OCT - Right eye') {?>

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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Disc (OCT) - LE</label><br>
                                                <div class="examination-container octlefteye">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'OCT - Left eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'OCT - Left eye') {?>

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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CCT - RE</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[cct_right]"
                                                           value="<?php echo $result['cct_right']; ?>"
                                                           max="999" 
                                                           min ="0"  <?php echo $examination_notes_readonly ? 'readonly':''?>>
                                                           &nbsp;<b>Microns</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CCT - LE</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[cct_left]"
                                                           value="<?php echo $result['cct_left']; ?>" 
                                                           max="999" 
                                                           min ="0" <?php echo $examination_notes_readonly ? 'readonly':''?>>
                                                           &nbsp;<b>Microns</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NFL Thickness - RE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[nfl_thickness_right]"
                                                           value="<?php echo $result['nfl_thickness_right']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>&nbsp;
                                                    <b>mm</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NFL Thickness - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[nfl_thickness_left]"
                                                           value="<?php echo $result['nfl_thickness_left']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>&nbsp;
                                                    <b>mm</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($summary['appointment_count'] >= 1) { ?>
                                    <div class="rowmt-2">
                                        <div class="col-md-12">
                                            <div id="nfl-chart-container" >

                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fundus - RE</label><br>
                                                <div class="examination-container fundusrighteye">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'Fundus - Right eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'Fundus - Right eye') {?>

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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fundus - LE</label><br>
                                                <div class="examination-container funduslefteye">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'Fundus - Left eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'Fundus - Left eye') {?>

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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Visual Field Test Plots - RE</label><br>
                                                <div class="examination-container visualfieldsrighteye">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'Visual fields - Right eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'Visual fields - Right eye') {?>

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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Visual Field Test Plots - LE</label><br>
                                                <div class="examination-container visualfieldslefteye">
                                                    <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                                        <?php if($value['name'] == 'Visual fields - Left eye') {?>
                                                            <div class="report-image report-pdf">
                                                                <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/' . $value['report']; ?>"
                                                                   class="open-pdf font-12" style="display: block;">
                                                                    <img class="img-thumbnail" src="../public/images/pdf.png"
                                                                         alt="">
                                                                    <span><?php echo $value['name']; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php } } else {?>
                                                        <?php if($value['name'] == 'Visual fields - Left eye') {?>

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
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Visual Field Progression - RE</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[visual_field_progression_right]"
                                                            class="custom-select" <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select visual field progression</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_FIELD_PROGRESSION'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['visual_field_progression_right']) && $result['visual_field_progression_right'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Visual Field Progression - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[visual_field_progression_left]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select visual field progression</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['VISUAL_FIELD_PROGRESSION'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['visual_field_progression_left']) && $result['visual_field_progression_left'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mean Deviation - RE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[mean_deviation_right]"
                                                           value="<?php echo $result['mean_deviation_right']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>&nbsp;
                                                    <b>dB</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mean Deviation - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[mean_deviation_left]"
                                                           value="<?php echo $result['mean_deviation_left']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>&nbsp;
                                                    <b>dB</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ($summary['appointment_count'] >= 1) { ?>
                                    <div class="rowmt-2">
                                        <div class="col-md-12">
                                            <div id="md-chart-container" >

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PSD Deviation - RE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[psd_deviation_right]"
                                                           value="<?php echo $result['psd_deviation_right']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>&nbsp;
                                                    <b>dB</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PSD Deviation - LE<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                           name="appointment[psd_deviation_left]"
                                                           value="<?php echo $result['psd_deviation_left']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>&nbsp;
                                                    <b>dB</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ($summary['appointment_count'] >= 1) { ?>
                                    <div class="rowmt-2">
                                        <div class="col-md-12">
                                            <div id="psd-chart-container" >

                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Diagnosis<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[diagnosis][]"
                                                            class="custom-select" required multiple <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select Diagnosis</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS'] as $key => $value) { ?>
                                                            <option value="<?php echo $value; ?>"
                                                                <?php echo (isset($result['diagnosis']) &&  in_array($value,$result['diagnosis'])) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Diagnosis Comment</label>
                                                <input type="text" class="form-control"
                                                       name="appointment[diagnosis_comment]"
                                                       value="<?php echo $result['diagnosis_comment']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Diagnosis Eye<span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[diagnosis_eye]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select Diagnosis Eye</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['diagnosis_eye']) && $result['diagnosis_eye'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Outcome</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[outcome]"
                                                            class="custom-select"  <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select Outcome</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['OUTCOME'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['outcome']) && $result['outcome'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Outcome Comment</label>
                                                <input type="text" class="form-control"
                                                       name="appointment[outcome_comment]"
                                                       value="<?php echo $result['outcome_comment']; ?>" <?php echo $examination_notes_readonly ? 'readonly':''?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Follow Up / Next Appointment<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <select name="appointment[followup]"
                                                            class="custom-select" required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select Month</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['gcp_next_appointment']) && $result['gcp_next_appointment'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value['name']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>My Eye Record & Care Required<span
                                                            class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                    </div>
                                                    <select name="appointment[gcp_required]" class="custom-select"
                                                            required <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select MERC</option>
                                                        <option value="YES" <?php echo ($result['is_glaucoma_required'] == 'YES') ? "Selected" : "" ?>>
                                                            YES
                                                        </option>
                                                        <option value="NO" <?php echo ($result['is_glaucoma_required'] == 'NO') ? "Selected" : "" ?>>
                                                            NO
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Family History of Glaucoma</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                    </div>
                                                    <select name="appointment[family_history_of_glaucoma]" id="family_history_of_glaucoma" 
                                                            class="custom-select" <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['FAMILY_HISTORY_OF_GLAUCOMA'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['family_history_of_glaucoma']) && $result['family_history_of_glaucoma'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group relations_with_glaucoma_patient" style="<?php echo $result['family_history_of_glaucoma'] == 'NO' ? 'display:none;':'' ?>">
                                                <label>Who has the glaucoma condition in your family?</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                    </div>
                                                    <select name="appointment[relations_with_glaucoma_patient]" id="relations_with_glaucoma_patient"
                                                            class="custom-select relations_with_glaucoma_patient" <?php echo $examination_notes_readonly ? 'disabled':''?>>
                                                        <option value="">Select</option>
                                                        <?php foreach (constant('OCULAR_EXAMINATION_DROP_DOWNS')['FAMILY_MEMBER'] as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"
                                                                <?php echo (isset($result['relations_with_glaucoma_patient']) && $result['relations_with_glaucoma_patient'] == $key) ? 'selected' : '' ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Doctor's Comments</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-notepad"></i></span>
                                                    </div>
                                                    <textarea class="form-control" name="appointment[doctor_note]" <?php echo $examination_notes_readonly ? 'readonly':''?>><?php echo isset($result['doctor_note']) ? $result['doctor_note'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Comments for Optometrist</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-notepad"></i></span>
                                                    </div>
                                                    <textarea class="form-control" name="appointment[doctor_note_optometrist]" <?php echo $examination_notes_readonly ? 'readonly':''?>><?php echo isset($result['doctor_note_optometrist']) ? $result['doctor_note_optometrist'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Special Condition</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ti-notepad"></i></span>
                                                    </div>
                                                    <textarea class="form-control" name="appointment[special_condition]" <?php echo $examination_notes_readonly ? 'readonly':''?>><?php echo isset($result['special_condition']) ? $result['special_condition'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer text-center">
                                        <button type="submit" name="submit" class="btn btn-primary"><i
                                                    class="ti-save-alt pr-2"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }
            if ($page_document_upload || $page_documents) { ?>
                <div class="tab-pane" id="appointment-documents">
                    <?php if ($page_document_upload) { ?>
                        <div class="row">
                            <div class="form-group col-sm-6 ">
                                <a class="btn btn-warning btn-sm" data-toggle="modal"
                                   data-target="#reports-modal"><i class="ti-cloud-up mr-2"></i> Upload
                                    Document/Report</a>
                            </div>
                            <!--                                <div class="form-group col-sm-6 text-right">-->
                            <!--                                    <a class="btn btn-secondary btn-sm"-->
                            <!--                                       href="-->
                            <?php //echo URL_ADMIN . DIR_ROUTE . 'appointment/reportsExport&id=' . $result['id']; ?><!--"><i-->
                            <!--                                                class="ti-cloud-down mr-2"></i> Download Document/Report</a>-->
                            <!--                                </div>-->
                        </div>
                    <?php }
                    if ($page_documents) { ?>
                        <div class="report-container">
                            <?php if (!empty($reports)) {
                                foreach ($reports as $key => $value) {
                                    $file_ext = pathinfo($value['name'], PATHINFO_EXTENSION);
                                    if ($file_ext == "pdf") { ?>
                                        <div class="report-image report-pdf"
                                             id="report-delete-div-<?php echo $value['id'] ?>">
                                            <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . "/" . $value['report']; ?>"
                                               class="open-pdf">
                                                <img src="../public/images/pdf.png" alt="">
                                                <span><?php echo $value['name']; ?></span>
                                            </a>
                                            <?php if ($page_document_remove) { ?>

                                                <div class="report-delete" data-toggle="tooltip" title="Delete"><a
                                                            class="ti-close report-delete-action"
                                                            data-toggle="modal" data-target="#reportDeleteModel"
                                                            data-appointment_id="<?php echo $value['appointment_id'] ?>"
                                                            data-report_name="<?php echo $value['report'] ?>"
                                                            data-report_id="<?php echo $value['id'] ?>"></a></div>

                                                <input type="hidden" name="report_name"
                                                       value="<?php echo $value['name']; ?>">

                                            <?php } ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="report-image" id="report-delete-div-<?php echo $value['id'] ?>">
                                            <a data-fancybox="gallery"
                                               href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . "/" . $value['report']; ?>">
                                                <img src="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . "/" . $value['report']; ?>"
                                                     alt="">
                                                <span><?php echo $value['name']; ?></span>
                                            </a>
                                            <?php if ($page_document_remove) { ?>

                                                <div class="report-delete" data-toggle="tooltip" title="Delete"><a
                                                            class="ti-close report-delete-action"
                                                            data-toggle="modal" data-target="#reportDeleteModel"
                                                            data-appointment_id="<?php echo $value['appointment_id'] ?>"
                                                            data-report_name="<?php echo $value['report'] ?>"
                                                            data-report_id="<?php echo $value['id'] ?>"></a></div>

                                                <input type="hidden" name="report_name"
                                                       value="<?php echo $value['name']; ?>">

                                            <?php } ?>
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            if ($invoice_view || $invoice_add) { ?>
                <div class="tab-pane" id="appointment-invoice">
                    <div class="text-center">
                        <?php if ($result['invoice_id'] && $invoice_view) { ?>
                            <p>Invoice is Generated</p>
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/view&id=' . $result['invoice_id']; ?>"
                               class="btn btn-danger btn-sm" target="_blank"><i
                                        class="far fa-file-pdf mr-2"></i>View</a>
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/pdf&id=' . $result['invoice_id']; ?>"
                               class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>PDF</a>
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/print&id=' . $result['invoice_id']; ?>"
                               class="btn btn-success btn-sm" target="_blank"><i
                                        class="ti-printer mr-2"></i>Print</a>
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/edit&id=' . $result['invoice_id']; ?>"
                               class="btn btn-info btn-sm" target="_blank"><i
                                        class="ti-pencil-alt mr-2"></i>Edit</a>
                        <?php } elseif ($invoice_add) { ?>
                            <p>Invoice is not Generated</p>
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/add&appointment=' . $result['id']; ?>"
                               class="btn btn-primary btn-sm" target="_blank"><i class="ti-plus pr-2"></i>Generate
                                Invoice Now</a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

                <div class="tab-pane" id="appointment-pre-consultation-requirement">
                    <form action="<?php echo $action ?>" method="post">
                        <input type="hidden" name="_token" value="<?php echo $token; ?>">
                        <input type="hidden" name="form_type" value="appointment_pre_consultation">
                        <input type="hidden" class="appointment-id" name="appointment[id]"
                               value="<?php echo $result['id']; ?>">
                        <div class="form-group mb-2">
                            <label class="d-block mb-2"><strong><h4>Select pre consultation form for appointment</h4>
                                </strong></label>
                            <div class="row">
                                <?php //print_r($pre_consultation_forms);exit;
                                if (empty($pre_consultation_forms)) { ?>
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox mb-2">
                                            <lable>Pre consultation forms not available</lable>
                                        </div>
                                    </div>

                                <?php } else {
                                    foreach ($pre_consultation_forms as $form) { ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="custom-control custom-checkbox mb-2">
                                                <input type="checkbox" name="pre_consultation_forms[]"
                                                       class="custom-control-input" value="<?php echo $form['id'] ?>"
                                                       id="<?php echo "pre_consultation_form" . $form['id'] ?>" <?php echo (in_array($form['id'], $selected_forms)) ? "Checked" : "" ?> >
                                                <label class="custom-control-label"
                                                       for="<?php echo "pre_consultation_form" . $form['id'] ?>"><?php echo $form['name'] ?></label>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                            <div class="row" style="padding:15px;">
                                <div class="col-md-12">
                                </div>
                            </div>
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
                                                                </h5>
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
                        <div class="panel-footer text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>

<!--Examination Confirmmation Popup---->
    <div class="modal fade" id="modal-examination-popup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  alert-warning">
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    Did you save the data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="examinationOk()">No</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Reports upload modal -->
    <div id="reports-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Reports/Documents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Document Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-tag"></i></span>
                            </div>
                            <select class="form-control" name="report_name">
                                <option value="">Select Document Type</option>
                                <?php foreach (constant('FOLLOWUP_DOCUMENT_NAME') as $key => $status) { ?>
                                    <option value="<?php echo $key ?>" data-examination="<?php echo trim(str_replace(['-',' '],'',strtolower($key))) ?>"><?php echo $status; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="media-upload-container" style="max-width: 100%;">
                        <form action="<?php echo URL_ADMIN . DIR_ROUTE ?>report/reportUpload" class="dropzone"
                              id="report-upload" method="post" enctype="multipart/form-data">
                            <div class="fallback"><input name="file" type="file"/></div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary upload-report">Done</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Move Image to report modal -->
    <div id="moveImageToReportModel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Move Image to Reports/Documents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Do you wish to move image to document/report ?
                    <input type="hidden" name="image_id" id="source_image_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="move-image-to-report" data-dismiss="modal">Yes
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Document/Report modal -->
    <div id="reportDeleteModel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Reports/Documents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this document/report ?
                    <input type="hidden" name="appointment_id" id="appointment_id">
                    <input type="hidden" name="report_id" id="report_id">
                    <input type="hidden" name="report_name" id="report_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="delete-report" data-dismiss="modal">Yes</button>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>


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
        function validateMyForm(e) {
            var mobile = $("#mobile").val();

            if (mobile.length < 10 || mobile.length < 11) {
                toastr.error('Error', 'Preferred contact number must be 11 digits.');
                return false
            } else {
                return true;
            }
        }
    </script>
    <script src="<?php echo URL_ADMIN . "public/js/examination_chart.js"; ?>"></script>
    <!-- Footer -->
    <?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>