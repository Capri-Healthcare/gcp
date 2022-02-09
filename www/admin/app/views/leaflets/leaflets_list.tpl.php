<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-5">
            <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li><?php echo $page_title; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-7 text-right">

            <?php if ($page_add) { ?>
                <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'leaflets/add'; ?>" class="btn btn-primary btn-sm"><i class="ti-plus pr-2"></i>Add New Leaflet</a>
            <?php } ?>
        </div>
    </div>
</div>
<input type="hidden" id="startDate" value="<?php echo $_GET['start'] ?? date_format(date_create(date('Y-m-d ' . '00:00:00')), 'Y-m-d'); ?>">
<input type="hidden" id="endDate" value="<?php echo $_GET['end'] ?? date_format(date_create(date('Y-m-d ' . '23:59:59')), 'Y-m-d'); ?>">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">

            <table class="table table-middle table-bordered table-striped datatable-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Original Name</th>
                        <th>Doc</th>
                        <?php if ($page_delete || $page_view) { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)) {
                        foreach ($result as $key => $value) { ?>
                            <tr style="cursor: pointer">
                                <td class="clickable-row" data-count="<?php echo $key + 1; ?>"><?php echo $key + 1; ?></td>
                                <td class="clickable-row"><?php echo $value['original_name']; ?></td>
                                <td class="clickable-row"><?php echo $value['doc_name']; ?></td>
                                <?php if ($page_delete) { ?>
                                    <td class="table-action">
                                    <a href="#" class="download_doc" data-value="<?php echo $value['doc_name']; ?>"><i class="ti-download"></i></a>
                                        <a class="table-delete text-danger delete" data-toggle="tooltip" title="Delete">
                                            <i class="ti-trash"></i><input id="leaflet" type="hidden" value="<?php echo $value['id']; ?>">
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                            </a>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('.download_doc').click(function(e) {
    e.preventDefault();  //stop the browser from following
    var path = $(this).data('value');
    // window.location.href = '../public/uploads/'+path;
    window.open('../public/uploads/'+path);    
});
</script>
<?php
if ($page_delete) {
    include DIR_VIEW . 'common/delete_modal.tpl.php';
}
include(DIR_ADMIN . 'app/views/common/footer.tpl.php');
?>