<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'leaflets'; ?>">Leaflets</a>
                    </li>
                    <li><?php echo $page_title; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 text-right"></div>
    </div>
</div>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" onsubmit="return validateMyForm(event);">
    <input type="hidden" name="_token" value="<?php echo $token; ?>">
    <input type="hidden" name="leaflet[id]" value="<?php echo $result['id']; ?>">
    <input type="hidden" name="form_type" value="leaflets-basic">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Leaflets Doc</label>
                        <div class="row">
                            <label for="leaflets_doc" class="ml-4 btn btn-white">
                                <input class="" id="leaflets_doc" name="leaflets" type="file" style="display:none;" accept="image/jpeg,image/jpg,image/png,application/pdf"> <span>Upload</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-center">
                <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save
                </button>
            </div>
        </div>
    </div>
</form>
<!-- include summernote css/js-->
<!-- <link href="public/css/summernote-bs4.css" rel="stylesheet">
<script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
<script type="text/javascript" src="public/js/klinikal.summernote.js"></script>
<script type="text/javascript" src="public/js/optician.js"></script> -->
<script>
    function validateMyForm(e) {
        var fileInput = $('#leaflets_doc').get(0).files;
        if (fileInput.length === 0) {
            toastr.error('Select leaflets doc to upload.','Error');
            return false
        } else {
            var allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(fileInput[0].name)) {
                fileInput.value = '';
                toastr.error('Upload pdf or jpeg image only.','Error');
                return false
            } 
            return true;
        }
    }
</script>
<!-- Footer -->
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>