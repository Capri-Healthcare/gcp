<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
    <!-- Invoice List Page start -->
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <h2 class="page-title-text d-inline-block"><?php echo $page_title ?></h2>
                <div class="breadcrumbs d-inline-block">
                    <ul>
                        <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                        <li>Optician Invoices</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 text-right">
                <div class="btn btn-white btn-sm text-left mr-2">
                    <i class="ti-filter text-danger pr-2"></i>
                    <input type="text" class="table-date-range">
                </div>

                <?php if ($common['user']['role'] != constant('USER_ROLE_OPTOMETRIST')) { ?>

                    <div class="btn btn-white btn-sm text-left mr-2">
                        <i class="ti-filter text-danger pr-2"></i>
                        <select class="optician" style="border: 0px;">
                            <option value="">Select Optician</option>
                            <?php foreach ($optician_user as $key => $list) { ?>
                                <option value="<?php echo $list['optician_shop_name'] ?>" <?php echo (!empty($dropdown_optician_selected) && $list['optician_shop_name'] == $dropdown_optician_selected) ? 'selected' : '' ?>>
                                    <?php echo $list['optician_shop_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <div class="btn btn-white btn-sm text-left mr-2">
                    <i class="ti-filter text-danger pr-2"></i>
                    <select class="status" style="border: 0px;">
                        <<?php foreach (constant('PAYMENT_STATUS_FILTER_INVOIVE') as $key => $status) { ?>
                            <option value="<?php echo $key ?>" <?php echo ($key == $period['status']) ? 'selected' : '' ?>><?php echo $status; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!--div class="dropdown d-inline-block mr-2">
                    <a class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"><i
                                class="ti-download text-primary pr-2"></i> Export</a>
                    <ul class="dropdown-menu dropdown-menu-right export-button">
                        <li><a href="#" class="pdf"><i class="far fa-file-pdf pr-2"></i>PDF</a></li>
                        <li><a href="#" class="excel"><i class="far fa-file-excel pr-2"></i>Excel</a></li>
                        <li><a href="#" class="csv"><i class="ti-clipboard pr-2"></i>CSV</a></li>
                        <li><a href="#" class="print"><i class="ti-printer pr-2"></i>Print</a></li>
                        <li><a href="#" class="copy"><i class="ti-layers pr-2"></i>Copy</a></li>
                    </ul>
                </div-->
                <?php if ($page_add) { ?>
                    <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician/invoice/add&id=0'; ?>"
                       class="btn btn-primary btn-sm"><i class="ti-plus pr-2"></i> New Invoice</a>
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
                <table class="table table-middle table-bordered table-striped invoice-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <?php if ($common['user']['role'] != constant('USER_ROLE_OPTOMETRIST')) { ?>
                        <th>Optician name</th>
                        <?php } ?>
                        <th>Amount</th>
                        <th>Due</th>
                        <th>Status</th>
                        <th>Invoice Date</th>
                        <th>Created Date</th>
                        <?php if ($page_view || $page_edit || $page_delete || $page_pdf) { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($result)) {
                        foreach ($result as $key => $value) { ?>
                            <tr>
                                <td><?php echo $common['info']['opt_invoice_prefix'] . str_pad($value['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <?php if ($common['user']['role'] != constant('USER_ROLE_OPTOMETRIST')) { ?>
                                <td>
                                    <p class="m-0 text-primary"><?php echo $value['name']; ?></p>
                                    <p class="m-0"><?php echo $value['email']; ?></p>
                                    <p class="m-0"><?php echo $value['mobile']; ?></p>
                                </td>
                                <?php } ?>
                                <td><?php echo $common['info']['currency_abbr'] . $value['amount']; ?></td>
                                <td><?php echo $common['info']['currency_abbr'] . $value['due']; ?></td>
                                <td>
                                    <?php if ($value['inv_status'] == "0") { ?>
                                        <span class="label label-success">Draft</span>
                                    <?php } else {
                                        if ($value['status'] == "Paid") { ?>
                                            <span class="label label-success">Paid</span>
                                        <?php } elseif ($value['status'] == "Unpaid") { ?>
                                            <span class="label label-danger">Unpaid</span>
                                        <?php } elseif ($value['status'] == "Pending") { ?>
                                            <span class="label label-secondary">Pending</span>
                                        <?php } elseif ($value['status'] == "In Process") { ?>
                                            <span class="label label-primary">In Process</span>
                                        <?php } elseif ($value['status'] == "Cancelled") { ?>
                                            <span class="label label-warning">Cancelled</span>
                                        <?php } elseif ($value['status'] == "Other") { ?>
                                            <span class="label label-default">Other</span>
                                        <?php } elseif ($value['status'] == "Partially Paid") { ?>
                                            <span class="label label-info badge-pill badge-sm">Partially Paid</span>
                                        <?php } else { ?>
                                            <span class="label label-default">Unknown</span>
                                        <?php }
                                    } ?>
                                </td>
                                <td><?php echo date_format(date_create($value['invoicedate']), $common['info']['date_format']); ?></td>
                                <td><?php echo date_format(date_create($value['date_of_joining']), $common['info']['date_format']); ?></td>
                                <?php if ($page_view || $page_edit || $page_delete || $page_pdf) { ?>
                                    <td class="table-action">
                                        <?php if ($page_view || $page_edit) { ?>
                                            <div class="dropdown d-inline-block">
                                                <a class="text-primary edit dropdown-toggle" data-toggle="dropdown">
                                                    <i class="ti-more"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right export-button">
                                                    <?php if ($page_view) { ?>
                                                        <li>
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician/invoice/view&id=' . $value['id']; ?>"><i
                                                                        class="ti-layout-media-center-alt pr-2"></i>View</a>
                                                        </li>
                                                    <?php }
                                                    if ($page_edit) { ?>
                                                        <!--li>
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician/invoice/edit&id=' . $value['id']; ?>"><i
                                                                        class="ti-pencil-alt pr-2"></i>Edit</a></li-->
                                                    <?php }
                                                    if ($page_pdf) { ?>
                                                        <li>
                                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician/invoice/pdf&id=' . $value['id']; ?>"
                                                               target="_blank"><i class="ti-pencil-alt pr-2"></i>PDF/Print</a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        <?php }
                                        if ($page_delete) { ?>
                                            <a class="table-delete text-danger delete" data-toggle="tooltip"
                                               title="Delete">
                                                <i class="ti-trash"></i><input type="hidden"
                                                                               value="<?php echo $value['id']; ?>">
                                            </a>
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php if ($page_view || $page_edit || $page_delete || $page_pdf) { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                    </tfoot>
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
                startDate:'<?php echo (isset($_GET['start'])) ? date_format(date_create($_GET['start']), $common['info']['date_format']):date_format(date_create(date('Y-m-d ' . '00:00:00')), 'd-m-Y')?>',
                endDate: '<?php echo (isset($_GET['end'])) ? date_format(date_create($_GET['end']), $common['info']['date_format']) :date_format(date_create(date('Y-m-d ' . '23:59:59')), 'd-m-Y')?>',
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'All Time': [moment('2015-01-01'), moment().add(1000, 'days')]
                },
            });

            $('.table-date-range').on('apply.daterangepicker', function (ev, picker) {
                var status = $(".status").val();
                var optician = $('.optician').val();
                <?php if ($common['user']['role'] != constant('USER_ROLE_OPTOMETRIST')) { ?>
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-invoices' + '&status=' + status + '&optician=' + optician + '&start=' + picker.startDate.format('YYYY-MM-DD') + '&end=' + picker.endDate.format('YYYY-MM-DD'));
                <?php } else { ?>
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-invoices' + '&status=' + status +'&start=' + picker.startDate.format('YYYY-MM-DD') + '&end=' + picker.endDate.format('YYYY-MM-DD'));
                <?php }?>
            });

            $('.status').on('change', function (e) {
                var startDate = $("#startDate").val();
                var endDate = $("#endDate").val();
                var optician = $('.optician').val();

                <?php if ($common['user']['role'] != constant('USER_ROLE_OPTOMETRIST')) { ?>
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-invoices' + '&status=' + e.currentTarget.value + '&optician=' + optician + '&start=' + startDate + '&end=' + endDate);
                <?php } else { ?>
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-invoices' + '&status=' + e.currentTarget.value + '&start=' + startDate + '&end=' + endDate);
                <?php }?>

            });

            $('.optician').on('change', function (e) {
                var startDate = $("#startDate").val();
                var endDate = $("#endDate").val();
                var status = $('.status').val();
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>optician-invoices' + '&optician=' + e.currentTarget.value + '&status=' + status + '&start=' + startDate + '&end=' + endDate);
            });


            var invoiceTable = $('.invoice-table').DataTable({
                aLengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "All"]],
                iDisplayLength: 10,
                pagingType: 'full_numbers',
                order: [],
                dom: "<'row align-items-center pb-3'<'col-sm-6 text-left'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row align-items-center pt-3'<'col-sm-12 col-md-4'i><'col-sm-12 col-md-8 text-right dataTables_pager'p>>",
                responsive: false,
                buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
                language: {
                    "paginate": {
                        "first": '<i class="fa fa-angle-double-left"></i>',
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>',
                        "last": '<i class="fa fa-angle-double-right"></i>'
                    },
                },
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api(), data;
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\£,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };
                    amount = api.column(2).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    pageamount = api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    due = api.column(3).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    pagedue = api.column(3, {page: 'current'}).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    $(api.column(2).footer()).html('<?php echo $common['info']['currency_abbr']; ?>' + amount);
                    $(api.column(3).footer()).html('<?php echo $common['info']['currency_abbr']; ?>' + due);
                }
            });

            $(".export-button .print").on("click", function (e) {
                e.preventDefault();
                invoiceTable.button(0).trigger()
            });

            $("export-button .copy").on("click", function (e) {
                e.preventDefault();
                invoiceTable.button(1).trigger()
            });

            $(".export-button .excel").on("click", function (e) {
                e.preventDefault();
                invoiceTable.button(2).trigger()
            });

            $(".export-button .csv").on("click", function (e) {
                e.preventDefault();
                invoiceTable.button(3).trigger()
            });

            $(".export-button .pdf").on("click", function (e) {
                e.preventDefault();
                invoiceTable.button(4).trigger()
            });
        });
    </script>

<?php if ($page_delete) {
    include DIR_VIEW . 'common/delete_modal.tpl.php';
}
include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>