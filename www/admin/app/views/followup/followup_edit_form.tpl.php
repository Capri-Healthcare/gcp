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
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'follow-up'; ?>">Followup</a>
                        </li>
                        <li><?php echo $page_title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'follow-up'; ?>"
                   class="btn btn-white btn-sm"><i class="ti-calendar text-primary mr-2"></i> View Followup</a>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                <?php if ($page_edit) { ?>
                    <li class="nav-item">
                        <a class="nav-link active"
                           href="#appointment-documents" data-toggle="tab">Scans & Reports</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content pt-4">
                <?php if ($page_edit) { ?>
                    <div class="tab-pane  active" id="appointment-documents">
                        <div class="row">
                            <div class="form-group col-sm-6 ">
                                <a class="btn btn-warning btn-sm" data-toggle="modal"
                                   data-target="#reports-modal"><i class="ti-cloud-up mr-2"></i> Upload Document</a>
                            </div>
                        </div>
                        <div class="report-container">
                            <?php if (!empty($reports)) {
                                foreach ($reports as $key => $value) {
                                    $file_ext = pathinfo($value['filename'], PATHINFO_EXTENSION);
                                    if ($file_ext == "pdf") { ?>
                                        <div class="report-image report-pdf"
                                             id="report-delete-div-<?php echo $value['id'] ?>">
                                            <a href="../public/uploads/optician-referral/followup/<?php echo $_GET['id'] . "/" . $value['filename']; ?>"
                                               class="open-pdf">
                                                <img src="../public/images/pdf.png" alt="">
                                                <span><?php echo $value['name']; ?></span>
                                            </a>
                                            <div class="report-delete" data-toggle="tooltip" title="Delete"><a
                                                        class="ti-close report-delete-action"
                                                        data-toggle="modal" data-target="#reportDeleteModel"
                                                        data-appointment_id="<?php echo $value['followup_id'] ?>"
                                                        data-report_name="<?php echo $value['filename'] ?>"
                                                        data-report_id="<?php echo $value['id'] ?>"></a></div>

                                            <input type="hidden" name="report_name"
                                                   value="<?php echo $value['filename']; ?>">
                                        </div>
                                    <?php } else { ?>
                                        <div class="report-image" id="report-delete-div-<?php echo $value['id'] ?>">
                                            <a data-fancybox="gallery"
                                               href="../public/uploads/optician-referral/followup/<?php echo $_GET['id'] . "/" . $value['filename']; ?>">
                                                <img src="../public/uploads/optician-referral/followup/<?php echo  $_GET['id'] . "/" . $value['filename']; ?>"
                                                     alt="">
                                                <span><?php echo $value['name']; ?></span>
                                            </a>
                                            <div class="report-delete" data-toggle="tooltip" title="Delete"><a
                                                        class="ti-close report-delete-action"
                                                        data-toggle="modal" data-target="#reportDeleteModel"
                                                        data-appointment_id="<?php echo $value['followup_id'] ?>"
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
                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'follow-up/edit&id='.$_GET['id'].'&status=OPTICIAN_REVIEWED'; ?>"
                               class="btn btn-primary"><i
                                        class="ti-save-alt pr-2"></i> Submit
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
                        <form action="<?php echo URL_ADMIN . DIR_ROUTE ?>follow-up/report/reportUpload"
                              class="dropzone" id="followup-upload" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo $token; ?>" id="token">
                            <input type="hidden" class="followup-id" name="followup[id]"
                                   value="<?php echo $id; ?>">
                            <input type="hidden" class="id" name="id"
                                   value="<?php echo  $followup['optician_id']; ?>">
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
                    <input type="hidden" name="optician_id" id="optician_id" value="<?php echo $followup['optician_id'] ?>">
                    <input type="hidden" name="report_name" id="report_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="delete-followup-referral" data-dismiss="modal">
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


    </script>

    <script type="text/javascript" src="public/js/optician.js"></script>
    <!-- Footer -->
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>