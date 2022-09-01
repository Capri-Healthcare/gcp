<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>

<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li><?php echo $page_title; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 text-right"></div>
    </div>
</div>
<form action="<?php echo $action; ?>" class="row" method="post">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <input type="hidden" name="_token" value="<?php echo $token; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name <span class="form-required">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                <input type="text" name="receiver[name]" class="form-control" placeholder="Enter Name . . ." required>
                                <?php
                                if (isset($email_type)) {
                                    echo '<input type="hidden" name="receiver[email_type]" value="' . $email_type . '" >';
                                }
                                if (isset($video_consultation_link)) {
                                    echo '<input type="hidden" name="receiver[video_consultation_link]" value="' . $video_consultation_link . '">';
                                }
                                ?>
                                <?php if (isset($tokBoxSession['tokbox_session_id'])) {
                                    echo "<input type='hidden' name='mail[tokbox_session_id]' value='" . $tokBoxSession['tokbox_session_id'] . "'>";
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                <input type="text" name="receiver[mobile]" class="form-control" placeholder="Enter Mobile Number . . .">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Address <span class="form-required">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                <input type="text" name="receiver[email]" class="form-control" placeholder="Enter Email Address . . ." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CC </label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                <input type="text" name="receiver[cc]" class="form-control" value="<?php echo $cc; ?>" placeholder="Enter Email Address . . .">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Subject <span class="form-required">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-comment"></i></span></div>
                        <input type="text" name="receiver[subject]" class="form-control" value="<?php echo $email_subject; ?>" placeholder="Enter Subject . . ." required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="receiver[message]" class="summernote"><?php echo $email_body; ?></textarea>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group" style="font-size: 12px;" id="preview_files"></div>
                <input type="hidden" name="mail[attached_leaflets]" id="attached_leaflets" value="" />
                <a class="btn btn-info btn-sm" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#attach-file">Attach Leaflets</a>
            </div>
            <!-- upload external file from local drive -->
            <div class="panel-body">
                <div class="form-group" style="font-size: 12px;" id="preview_files"></div>
                <a class="btn btn-info btn-sm" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#attach-external-file">Upload File</a>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper">
                        <div class="attachment-container">                    
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- upload external file from local drive END-->
            <div class="panel-footer text-center">
                <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Submit</button>
            </div>
        </div>
    </div>
</form>
<!-- Attach External File Modal -->
<div id="attach-external-file" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Documents</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo URL_ADMIN.DIR_ROUTE.'attach/documents'; ?>" class="dropzone" id="attach-file-upload"></form>
            </div>
        </div>
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
                            <input type="checkbox" name="pre_leaflets" data-original="<?php echo $each['original_name'] . "(" . $each['doc_name'] . ")"; ?>" class="custom-control-input" value="<?php echo $each['id'] ?>" id="<?php echo "pre_leaflet" . $each['id'] ?>" />
                            <label class="custom-control-label" for="<?php echo "pre_leaflet" . $each['id'] ?>"><?php echo $each['original_name']; ?></label>
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
    function attachLeafletFiles() {
        var ids = new Array();
        $('input:checkbox[name=pre_leaflets]').each(function() {
            if ($(this).is(':checked')) {
                ids.push($(this).val());
                $("#preview_files").append("<p><b>Attached:</b> " + $(this).data('original') + "</p>");
            }
        });
        var str_ids = ids.toString();
        $("#attached_leaflets").val(str_ids);
        $("#attach-file").modal('hide');
    }
</script>
<script>
    $(document).ready(function () {
        $("#attach-file-upload").dropzone({
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf",
            maxFilesize: 2,
            dictDefaultMessage: 'Drop files here or click here to upload.<br /><br /> Only Image and PDF allowed.',
            init: function() {
                var attachmentDropzone = this;
                this.on("sending", function(file, xhr, formData) {
                    formData.append("id", '0');
                    formData.append("type", 'external');
                    formData.append("_token", $('.s_token').val());
                });

                this.on("success", function(file, xhr){
                    var response = JSON.parse(xhr);
                    if (response.error === false) {
                        if (response.ext === "pdf") {
                            $('.attachment-container').append('<div class="attachment-image attachment-pdf">'+
                                '<a href="../public/uploads/attachments/'+response.name+'" class="open-pdf">'+
                                '<img class="img-thumbnail" src="../public/images/pdf.png" alt="">'+
                                '</a>'+
                                '<input type="hidden" name="mail[external_file][]" value="'+response.name+'">'+
                                '<div class="attachment-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close"></a></div>'+
                                '</div>');
                        } else {
                            $('.attachment-container').append('<div class="attachment-image">'+
                                '<a data-fancybox="gallery" href="../public/uploads/attachments/'+response.name+'">'+
                                '<img class="img-thumbnail" src="../public/uploads/attachments/'+response.name+'" alt="">'+
                                '</a>'+
                                '<div class="attachment-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close"></a></div>'+
                                '<input type="hidden" name="mail[external_file][]" value="'+response.name+'">'+
                                '</div>');
                        }
                        toastr.success('File uploaded successfully.', 'Success');
                        $('#attach-external-file').modal('hide');
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                    attachmentDropzone.removeFile(file);
                });
            }
        });

        $('.attachment-container').on('click', '.attachment-delete a', function () {
            var ele = $(this),
            name = ele.parents('.attachment-image').find('input').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo URL_ADMIN.DIR_ROUTE.'attach/documents/delete'; ?>',
                data: {name: name, type: 'external', id: '0', _token: $('.s_token').val()},
                error: function() {
                    toastr.error('File could not be deleted', 'Server Error');
                },
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.error === false) {
                        ele.parents('.attachment-image').remove();
                        toastr.success(response.message, 'Success');
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                }
            });
        });
    });
</script>
<!-- include summernote css/js-->
<link href="public/css/summernote-bs4.css" rel="stylesheet">
<script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
<script type="text/javascript" src="public/js/klinikal.summernote.js"></script>

<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>