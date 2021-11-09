<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
    <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="public/css/custom.css">
    <script src="public/js/jquery.fancybox.min.js"></script>
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral'; ?>">Optician Referral</a>
                        </li>
                        <li><?php echo $page_title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral/view&id=' . $result['id']; ?>"
                   class="btn btn-white btn-sm"><i class="ti-calendar text-primary mr-2"></i> View Referral Details</a>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                <li class="nav-item">
                    <a class="nav-link <?php echo(!isset($_GET['document']) ? 'active' : '') ?>"
                       href="#appointment-info" data-toggle="tab">Optician Referral Info</a>
                </li>
                <?php if ($page_edit) { ?>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo(isset($_GET['document']) ? 'active' : '') ?>"
                           href="#appointment-documents" data-toggle="tab">Scans & Reports</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content pt-4">
                <div class="tab-pane  <?php echo(!isset($_GET['document']) ? 'active' : '') ?>" id="appointment-info">
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"  onsubmit="return validateMyForm(event);">
                        <input type="hidden" name="_token" value="<?php echo $token; ?>" id="token">
                        <input type="hidden" class="optician-refrrel-id" name="referral[id]"
                               value="<?php echo $result['id']; ?>">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name <span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-user"></i></span></div>
                                                <input type="text" name="referral[first_name]" class="form-control"
                                                       value="<?php echo $result['first_name']; ?>"
                                                       placeholder="First Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name <span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-user"></i></span></div>
                                                <input type="text" name="referral[last_name]" class="form-control"
                                                       value="<?php echo $result['last_name']; ?>"
                                                       placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Preferred Contact Number<span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-mobile"></i></span></div>
                                                <input type="text" name="referral[mobile]" class="form-control"
                                                       maxlength="11"
                                                       id="mobile"
                                                       onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                                       value="<?php echo $result['mobile']; ?>" placeholder="Preferred Contact Number"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alternate Contact Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-mobile"></i></span>
                                                </div>
                                                <input type="text" name="referral[office_phone]" class="form-control officephone" id="office_phone"
                                                       value="<?php echo $result['office_phone']; ?>" maxlength="11"
                                                       onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                                       placeholder="Enter Alternate Contact Number . . . ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DOB <span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-calendar"></i></span></div>
                                                <input type="text" name="referral[dob]" class="form-control dateofbirth"
                                                       value="<?php echo date_format(date_create($result['dob']), $common['info']['date_format']); ?>"
                                                       max="<?php echo date('Y-m-d') ?>" placeholder="dd-mm-yy" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-email"></i></span></div>
                                                <input type="email" name="referral[email]" class="form-control"
                                                       value="<?php echo $result['email']; ?>" placeholder="Email"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                </div>
                                                <select name="referral[gender]" class="custom-select">
                                                    <option value="Male" <?php if ($result['gender'] == 'Male') {
                                                        echo "selected";
                                                    } ?> >Male
                                                    </option>
                                                    <option value="Female" <?php if ($result['gender'] == 'Female') {
                                                        echo "selected";
                                                    } ?> >Female
                                                    </option>
                                                    <option value="Other" <?php if ($result['gender'] == 'Other') {
                                                        echo "selected";
                                                    } ?> >Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 1</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-check-box"></i></span>
                                                </div>
                                                <input type="text" name="referral[address_1]" class="form-control"
                                                        placeholder="Enter Address line 1"
                                                        value="<?php echo stripcslashes($result['address1']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-check-box"></i></span></div>
                                                <input type="text" name="referral[address_2]" class="form-control"
                                                          placeholder="Enter Address line 2"
                                                          value="<?php echo stripcslashes($result['address2']); ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-map-alt"></i></span></div>
                                                <input type="text" name="referral[city]" class="form-control"
                                                       value="<?php echo $result['city']; ?>" placeholder="Enter City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-pin"></i></span></div>
                                                <input type="text" name="referral[zip_code]" maxlength="8"
                                                       class="form-control" value="<?php echo $result['zip_code']; ?>"
                                                       placeholder="Enter Post Code"
                                                       onkeypress="return alphaNumericValidation(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($result['status'] == 'NEW' && in_array($common['user']['role'], constant('USER_ROLE'))) { ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Referral status<span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                    </div>
                                                    <select name="referral[status]" class="custom-select status" required>
                                                        <option value="">Please select the status from the list</option>
                                                        <?php foreach (constant('STATUS') as $key => $status) { ?>
                                                             <?php if(!in_array($key,[constant('STATUS_DRAFT'),constant('STATUS_NEW')])) {?>
                                                            <option value="<?php echo $key ?>" <?php echo ($result['status'] == $key) ? 'selected' : '' ?>><?php echo $status; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="referral[status]"
                                               value="<?php echo $result['status'] ?>">
                                    <?php } ?>

                                    <?php if ($result['status'] == 'NEW') { ?>
                                    <div class="col-md-6 hospital_code_div" style="display: none">
                                        <div class="form-group">
                                            <label>Select hospital for appoinment</label>
                                            <br/>
                                            <?php foreach (constant('HOSPITAL_LIST') as $key => $list) { ?>
                                                <div class="custom-control custom-radio custom-radio-1 d-inline-block">
                                                    <input type="radio" name="referral[hospital_code]"
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
                                    <?php } else { ?>
                                        <input type="hidden" name="referral[hospital_code]"
                                               value="<?php echo $result['hospital_code'] ?>">
                                    <?php } ?>
                                </div>
                                <div class="panel-footer text-center">
                                    <button type="submit" name="submit" class="btn btn-primary"><i
                                                class="ti-save-alt pr-2"></i> Save
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

                <?php if ($page_edit) { ?>
                    <div class="tab-pane  <?php echo(isset($_GET['document']) ? 'active' : '') ?>"
                         id="appointment-documents">
                        <div class="row">
                            <div class="form-group col-sm-12 ">
                            Please upload scans, images (OCT, Fundus, Visual Fields and/or Visual Acuity) and any other relevant documents. <br></br>
                                <a class="btn btn-warning btn-sm" data-toggle="modal"
                                   data-target="#reports-modal"><i class="ti-cloud-up mr-2"></i> Upload documents/ images</a>
                            </div>
                            <!--                            <div class="form-group col-sm-6 text-right">-->
                            <!--                                <a class="btn btn-secondary btn-sm"-->
                            <!--                                   href="-->
                            <?php //echo URL_ADMIN . DIR_ROUTE . 'optician-referral/report/reportsExport&id=' . $result['id']; ?><!--"><i-->
                            <!--                                            class="ti-cloud-down mr-2"></i> Download Document</a>-->
                            <!--                            </div>-->
                        </div>
                        <div class="report-container">
                            <?php if (!empty($reports)) {
                                foreach ($reports as $key => $value) {
                                    $file_ext = pathinfo($value['filename'], PATHINFO_EXTENSION);
                                    if ($file_ext == "pdf") { ?>
                                        <div class="report-image report-pdf"
                                             id="report-delete-div-<?php echo $value['id'] ?>">
                                            <a href="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id'] . "/" . $value['filename']; ?>"
                                               class="open-pdf">
                                                <img src="../public/images/pdf.png" alt="">
                                                <span><?php echo $value['name']; ?></span>
                                            </a>
                                            <div class="report-delete" data-toggle="tooltip" title="Delete"><a
                                                        class="ti-close report-delete-action"
                                                        data-toggle="modal" data-target="#reportDeleteModel"
                                                        data-appointment_id="<?php echo $value['referral_list_id'] ?>"
                                                        data-report_name="<?php echo $value['filename'] ?>"
                                                        data-report_id="<?php echo $value['id'] ?>"></a></div>

                                            <input type="hidden" name="report_name"
                                                   value="<?php echo $value['filename']; ?>">
                                        </div>
                                    <?php } else { ?>
                                        <div class="report-image" id="report-delete-div-<?php echo $value['id'] ?>">
                                            <a data-fancybox="gallery"
                                               href="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id'] . "/" . $value['filename']; ?>">
                                                <img src="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id'] . "/" . $value['filename']; ?>"
                                                     alt="">
                                                <span><?php echo $value['name']; ?></span>
                                            </a>
                                            <div class="report-delete" data-toggle="tooltip" title="Delete"><a
                                                        class="ti-close report-delete-action"
                                                        data-toggle="modal" data-target="#reportDeleteModel"
                                                        data-appointment_id="<?php echo $value['referral_list_id'] ?>"
                                                        data-report_name="<?php echo $value['filename'] ?>"
                                                        data-report_id="<?php echo $value['id'] ?>"></a></div>

                                            <input type="hidden" name="report_name"
                                                   value="<?php echo $value['filename']; ?>">
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral/edit&id='.$_GET['id'].'&status=NEW'; ?>"
                               class="btn btn-primary"><i
                                        class="ti-save-alt pr-2"></i> Submit Referral
                            </a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
    </form>

    <!-- Reports upload modal -->
    <div id="reports-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Documents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Document Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-tag"></i></span>
                            </div>
                            <select class="form-control" name="document_name">
                                <option value="">Select Document Type</option>
                                <?php foreach (constant('FOLLOWUP_DOCUMENT_NAME') as $key => $status) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $status; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="media-upload-container" style="max-width: 100%;">
                        <form action="<?php echo URL_ADMIN . DIR_ROUTE ?>optician-referral/report/reportUpload"
                              class="dropzone" id="optician-referral-upload" method="post"
                              enctype="multipart/form-data">
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

    <!-- Delete Document/Report modal -->
    <div id="reportDeleteModel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Documents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this document ?
                    <input type="hidden" name="appointment_id" id="appointment_id">
                    <input type="hidden" name="report_id" id="report_id">
                    <input type="hidden" name="report_name" id="report_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="delete-optician-referral" data-dismiss="modal">
                        Yes
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $("a.open-pdf").fancybox({
            'frameWidth': 800,
            'frameHeight': 800,
            'overlayShow': true,
            'hideOnContentClick': false,
            'type': 'iframe'
        });
        function validateMyForm(e) {
            var mobile = $("#mobile").val();

            if (mobile.length < 10 || mobile.length < 11) {
                toastr.error('Error', 'Preferred contact number must be 11 digits.');
                return false
            }else{
                return true;
            }
        }

        $(".status").on('change',function () {
            if($(this).val() == 'ACCEPTED'){
                $(".hospital_code_div").show();
            }else{
                $(".hospital_code_div").hide();
            }
        })

    </script>

    <script type="text/javascript" src="public/js/optician.js"></script>
    <!-- Footer -->
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>