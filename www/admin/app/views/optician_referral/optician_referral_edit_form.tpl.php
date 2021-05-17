<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
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
                        <li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'optician-referral'; ?>">Optician Referral</a></li>
                        <li><?php echo $page_title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo URL_ADMIN.DIR_ROUTE.'optician-referral/view&id='.$result['id']; ?>" class="btn btn-white btn-sm"><i class="ti-calendar text-primary mr-2"></i> View Optician Referral</a>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                <li class="nav-item">
                    <a class="nav-link active" href="#appointment-info" data-toggle="tab">Optician Referral Info</a>
                </li>
                <?php if ($page_document_upload || $page_documents) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#appointment-documents" data-toggle="tab">Documents</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content pt-4">
                <div class="tab-pane active" id="appointment-info">
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo $token; ?>" id="token">
                        <input type="hidden" class="optician-refrrel-id" name="referral[id]" value="<?php echo $result['id'];?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>First Name <span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                                <input type="text" name="referral[first_name]" class="form-control" value="<?php echo $result['first_name'];?>" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name <span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                                <input type="text" name="referral[last_name]" class="form-control" value="<?php echo $result['last_name'];?>" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>DOB <span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar"></i></span></div>
                                                <input type="text" name="referral[dob]" class="form-control date" value="<?php echo $result['dob'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address 1<span class="form-required">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-check-box"></i></span>
                                                </div>
                                                <textarea name="referral[address_1]" class="form-control" placeholder="Enter Address" row=3><?php echo $result['address1'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
                                                <textarea name="referral[address_2]" class="form-control" placeholder="Enter Address" row=3><?php echo $result['address2'];?></textarea>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-tag"></i></span></div>
                                                <input type="text" name="referral[city]" class="form-control" value="<?php echo $result['city'];?>" placeholder="Enter City" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-tag"></i></span></div>
                                                <input type="text" name="referral[zip_code]"  maxlength="6"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="form-control" value="<?php echo $result['zip_code'];?>" placeholder="Enter Zip Code" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer text-center">
                                        <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <?php if ($page_document_upload || $page_documents) { ?>
                    <div class="tab-pane" id="appointment-documents">
                        <?php if ($page_document_upload) { ?>
                            <div class="row">
                                <div class="form-group col-sm-6 ">
                                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#reports-modal"><i class="ti-cloud-up mr-2"></i> Upload Document</a>
                                </div>
                                <div class="form-group col-sm-6 text-right">
                                    <a class="btn btn-secondary btn-sm" href="<?php echo URL_ADMIN.DIR_ROUTE.'optician-referral/report/reportsExport&id='.$result['id']; ?>"><i class="ti-cloud-down mr-2"></i> Download Document</a>
                                </div>
                            </div>
                        <?php } if($page_documents) { ?>
                            <div class="report-container">
                                <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['filename'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                    <div class="report-image report-pdf" id="report-delete-div-<?php echo $value['id'] ?>">
                                        <a href="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id']  . "/". $value['filename']; ?>" class="open-pdf">
                                            <img src="../public/images/pdf.png" alt="">
                                            <span><?php echo $value['filename']; ?></span>
                                        </a>
                                        <?php if ($page_document_remove) { ?>

                                            <div class="report-delete" data-toggle="tooltip" title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel" data-appointment_id="<?php echo $value['referral_list_id'] ?>" data-report_name="<?php echo $value['filename'] ?>" data-report_id="<?php echo $value['id'] ?>"></a></div>

                                            <input type="hidden" name="report_name" value="<?php echo $value['report']; ?>">

                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="report-image" id="report-delete-div-<?php echo $value['id'] ?>">
                                        <a data-fancybox="gallery" href="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id']  . "/". $value['filename']; ?>">
                                            <img src="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id']  . "/". $value['filename']; ?>" alt="">
                                            <span><?php echo $value['filename']; ?></span>
                                        </a>
                                        <?php if ($page_document_remove) { ?>

                                            <div class="report-delete" data-toggle="tooltip" title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel" data-appointment_id="<?php echo $value['referral_list_id'] ?>" data-report_name="<?php echo $value['filename'] ?>" data-report_id="<?php echo $value['id'] ?>"></a></div>

                                            <input type="hidden" name="report_name" value="<?php echo $value['filename']; ?>">

                                        <?php } ?>
                                    </div>
                                <?php } } } ?>
                            </div>
                        <?php } ?>
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
                    <div class="media-upload-container" style="max-width: 100%;">
                        <form action="<?php echo URL_ADMIN.DIR_ROUTE ?>optician-referral/report/reportUpload" class="dropzone" id="optician-referral-upload" method="post" enctype="multipart/form-data">
                            <div class="fallback"><input name="file" type="file" /></div>
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
                    <button type="button" class="btn btn-primary" id="delete-optician-referral" data-dismiss="modal">Yes</button>
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

    <!-- Footer -->
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>