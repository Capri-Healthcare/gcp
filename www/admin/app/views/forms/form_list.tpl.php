<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<!-- Form List Page start -->
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h2 class="page-title-text d-inline-block">Forms</h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li>Forms</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <?php if ($page_add) { ?>
                <a href="<?php echo URL_ADMIN.DIR_ROUTE.'form/add&id=0'; ?>" class="btn btn-primary btn-sm"><i class="ti-plus pr-2"></i> New Form</a>
            <?php } ?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-middle table-bordered table-striped invoice-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Form name</th>
                        <th>Description</th>
                        <th>Departments</th>                        
                        <th>No of question</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)) { foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td>
                                <?php echo $value['name']; ?>
                            </td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo $value['departments']; ?></td>
                            <td><?php echo $value['no_of_questions']; ?></td>
                            <td><?php echo $value['status']; ?></td>
                            <td><?php echo date_format(date_create($value['created_at']), $common['info']['date_format']); ?></td>
                            <td class="table-action">
                                <?php if ($page_edit) { ?>
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'form/edit&id='.$value['id'];?>" class="text-primary edit" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>