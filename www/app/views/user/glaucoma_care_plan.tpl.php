<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 p-5">
                <center><a href="<?php echo URL.DIR_ROUTE ?>pdf-demo" class="btn btn-primary" download="<?php echo $user_data['id']."pdf-demo.pdf" ?>">Download  Direct Debit  Form</a></center>
            </div>
            <div class="col-md-6 p-5">
                <center> <a class="btn btn-warning" data-toggle="modal"
                            data-target="#reports-modal"><i class="ti-cloud-up mr-2"></i> Upload Document</a>
                </center>
                <div class="report-container">
                    <?php if(!empty($user_data['ddi_image'])) { ?>
                    <div class="report-image" id="report-delete-div-<?php echo $user_data['id'] ?>">
                        <a data-fancybox="gallery"
                           href="../public/uploads/patient/document/<?php echo $user_data['id']?>/<?php echo $user_data['ddi_image'];?>">
                            <img src="../public/uploads/patient/document/<?php echo $user_data['id']?>/<?php echo $user_data['ddi_image'];?>"
                                 alt="">
                            <span><?php echo $user_data['ddi_image']; ?></span>
                        </a>
                        <div class="ddi-report-delete" data-toggle="tooltip" title="Delete"><a
                                    class="ti-close report-delete-action"
                                    data-toggle="modal" data-target="#reportDeleteModel"
                                    data-file-name="<?php echo $user_data['ddi_image'] ?>"
                                    data-patient-id="<?php echo $user_data['id']; ?>" style="color: white">X</a></div>

                        <input type="hidden" name="report_name" id="report_name" value="<?php echo $user_data['ddi_image']; ?>">
                    </div>
                    <?php } ?>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Reports upload modal -->
<div id="reports-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Documents</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="<?php echo $token; ?>" id="token">
                <input type="hidden" class="patient-id" name="patient[id]"
                       value="<?php echo $user_data['id']; ?>">

                <div class="media-upload-container" style="max-width: 100%;">
                    <form action="<?php echo URL.DIR_ROUTE ?>user/glaucoma/documentUpload"
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

<div id="reportDeleteModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Documents</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this document ?
                <input type="hidden" name="patient_id" id="patient_id">
                <input type="hidden" name="file_name" id="file_name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="delete-ddi-image" data-dismiss="modal">
                    Yes
                </button>
            </div>
        </div>

    </div>
</div>
