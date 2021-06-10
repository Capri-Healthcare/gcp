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
                <div class="btn btn-white btn-sm text-left mr-2">
                    <i class="ti-filter text-danger pr-2"></i>
                    <input type="text" class="table-date-range">
                </div>
                <div class="btn btn-white btn-sm text-left mr-2">
                    <i class="ti-filter text-danger pr-2"></i>
                    <select class="status" style="border: 0px;">

                        <?php if ($common['user']['role'] == constant('USER_ROLE_MED')) { ?>
                            <?php foreach (constant('STATUS_MED_ROLE') as $key => $status) { ?>
                                <option value="<?php echo $key ?>" <?php echo (isset($_GET['status']) && $key == $_GET['status']) ? 'selected' : '' ?>><?php echo $status; ?></option>
                            <?php } ?>
                        <?php } else { ?>
                            <?php foreach (constant('STATUS') as $key => $status) { ?>
                                <option value="<?php echo $key ?>" <?php echo (isset($_GET['status']) && $key == $_GET['status']) ? 'selected' : '' ?>><?php echo $status; ?></option>
                            <?php } ?>
                        <?php }?>
                    </select>
                </div>
                <?php if ($page_add) { ?>
                    <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral/add'; ?>"
                       class="btn btn-primary btn-sm"><i class="ti-plus pr-2"></i> Create Referral</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <input type="hidden" id="startDate"
           value="<?php echo $_GET['start'] ?? date_format(date_create(date('Y-m-d ' . '00:00:00')), 'Y-m-d'); ?>">
    <input type="hidden" id="endDate"
           value="<?php echo $_GET['end'] ?? date_format(date_create(date('Y-m-d ' . '23:59:59')), 'Y-m-d'); ?>">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">

                <table class="table table-middle table-bordered table-striped datatable-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Optician</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Status</th>
                        <!--						<th>Created By</th>-->
                        <th>Date Submited</th>
                        <?php if ($page_delete || $page_edit || $page_view) { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                    </thead>

                    <tbody>

                    <?php if (!empty($result)) {
                        foreach ($result as $key => $value) { ?>


                            <tr style="cursor: pointer">
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $key + 1; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $value['optician_name']; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $value['first_name']; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $value['last_name']; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $value['mobile']; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $value['city']; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo constant('STATUS')[$value['status']]; ?></td>
                                <!--							<td>--><?php //echo $value['created_by']; ?><!--</td>-->
                                <td><?php echo date_format(date_create($value['created_at']), $common['info']['date_format']); ?></td>
                                <?php if ($value['status'] == 'ACCEPTED') { ?>
                                    <td>
                                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointments&id=' . $value['patient_id'] . '&referralid=' . $value['id'] . '&opticianid=' . $value['created_by']; ?>"
                                           class="btn btn-sm btn-primary" data-toggle="tooltip"
                                           title="Book Appointment">&nbsp;Book Appointment</a></td>

                                <?php } ?>

                                <?php if ($page_delete || $page_edit || $page_view) { ?>
                                    <td class="table-action">
                                        <div class="dropdown d-inline-block">
                                            <a class="text-primary edit dropdown-toggle" data-toggle="dropdown"><i
                                                        class="ti-more"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right export-button">
                                                <?php if ($page_view) { ?>
                                                    <li><a class="pageview<?php echo $key + 1 ?>"
                                                           href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral/view&id=' . $value['id']; ?>"><i
                                                                    class="ti-eye"></i>&nbsp;View</a></li>
                                                <?php } ?>
                                                <?php if ($page_edit) { ?>
                                                    <?php if ($value['status'] == 'DRAFT') { ?>
                                                        <li>
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral/edit&id=' . $value['id']; ?>"
                                                               class="text-primary edit" data-toggle="tooltip"
                                                               title="Edit"><i
                                                                        class="ti-pencil-alt"></i>&nbsp;Edit</a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php if ($page_delete && $value['status'] == 'NEW' && in_array($common['user']['role'], constant('USER_ROLE'))) { ?>
                                            <a class="table-delete text-danger delete" data-toggle="tooltip"
                                               title="Delete">
                                                <i class="ti-trash"></i><input type="hidden"
                                                                               value="<?php echo $value['id']; ?>">
                                            </a>
                                        <?php } ?>
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
        $(document).ready(function () {
            $('.table-date-range').daterangepicker({
                autoApply: false,
                alwaysShowCalendars: true,
                opens: 'left',
                applyButtonClasses: 'btn-danger',
                cancelClass: 'btn-white',
                locale: {
                    format: $('.common_daterange_format').val(),
                    separator: " => ",
                },
                startDate: moment(),
                endDate: moment(),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Next 7 Days': [moment(), moment().add(6, 'days')],
                    //'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'All Time': [moment('2015-01-01'), moment().add(30, 'days')]
                },
            });

            $('.table-date-range').on('apply.daterangepicker', function (ev, picker) {
                var status = $(".status").val();
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-referral' + '&status=' + status + '&start=' + picker.startDate.format('YYYY-MM-DD') + '&end=' + picker.endDate.format('YYYY-MM-DD'));
            });
        });

        $('.status').on('change', function (e) {
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-referral' + '&status=' + e.currentTarget.value + '&start=' + startDate + '&end=' + endDate);
        });
        $(".clickable-row").click(function (e) {
            window.location = $(".pageview" + e.currentTarget.getAttribute('data-count')).attr("href");
        });
    </script>
<?php
if ($page_delete) {
    include DIR_VIEW . 'common/delete_modal.tpl.php';
}
include(DIR_ADMIN . 'app/views/common/footer.tpl.php');
?>