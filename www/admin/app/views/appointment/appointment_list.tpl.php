<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
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
        <div class="col-sm-6 text-right">
            <div class="btn btn-white btn-sm text-left mr-2">
                <i class="ti-filter text-danger pr-2"></i>
                <input type="text" class="table-date-range">
            </div>
            <!--div class="dropdown d-inline-block mr-2">
                <a class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"><i class="ti-download text-primary pr-2"></i> Export</a>
                <ul class="dropdown-menu dropdown-menu-right export-button">
                    <li><a href="#" class="pdf"><i class="far fa-file-pdf pr-2"></i>PDF</a></li>
                    <li><a href="#" class="excel"><i class="far fa-file-excel pr-2"></i>Excel</a></li>
                    <li><a href="#" class="csv"><i class="ti-clipboard pr-2"></i>CSV</a></li>
                    <li><a href="#" class="print"><i class="ti-printer pr-2"></i>Print</a></li>
                    <li><a href="#" class="copy"><i class="ti-layers pr-2"></i>Copy</a></li>
                </ul>
            </div-->
            <?php if ($page_add) { ?>
                <a class="btn btn-primary btn-sm appointment-sidebar" id="appointment-sidebar"><i class="ti-plus pr-2"></i> New Appointment</a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive" data-name="appointments">
            <table class="table table-middle table-bordered table-striped datatable-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient</th>
                        <th>DateTime</th>
                        <th>Doctor</th>
                        <!--th>Consultation Method</th-->
                        <th>Status</th>
                        <?php if ($page_edit || $page_view || $page_delete || $invoice_view || $invoice_add) { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)) { foreach ($result as $key => $value) { ?>
                        <tr style="cursor: pointer">
                            <td class="clickable-row" data-count="<?php echo $key+1; ?>"><?php echo $common['info']['appointment_prefix'].str_pad($value['id'], 5, '0', STR_PAD_LEFT); ?></td>
                            <td class="clickable-row" data-count="<?php echo $key+1; ?>">
                                <a class="m-0 text-primary"><?php echo $value['name'];?></a>
                                <p class="m-0"><?php echo $value['email']; ?></p>
                                <p class="m-0"><?php echo $value['mobile']; ?></p>
                            </td>
                            <td class="clickable-row" data-count="<?php echo $key+1; ?>"><?php echo date_format(date_create($value['date']), $common['info']['date_format']).' AT '.$value['time']; ?></td>
                            <td class="clickable-row" data-count="<?php echo $key+1; ?>">Dr. <?php echo $value['doctor']; ?></td>
                            <!--td>
                                <div class="video_call_icon pull-left col-12 pl-0">
                                    <?php echo CONSULTATION_TYPE[$value['consultation_type']]; ?>
                                </div>
                                <?php if($value['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE AND $value['status'] == CONFIRMED_APPOINTMENT_STATUS_ID){ ?>                        
                                    <div class="video_call_icon pull-left">
                                        <div class="icon tbl-cell">
                                            <a href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/videoConsultation&token='.$value['video_consultation_token']; ?>" >
                                                <i class="fas fa-video"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </td-->
                            <td class="clickable-row" data-count="<?php echo $key+1; ?>">
                                <?php if ($value['status'] == 1) {                                    
                                    echo '<span class="label label-warning">In process</span>';
                                } elseif ($value['status'] == 2) {
                                    echo '<span class="label label-warning">Document Requested</span>';
                                } elseif ($value['status'] == 3) {                                    
                                    echo '<span class="label label-success">Confirmed</span>';
                                }  elseif ($value['status'] == 4) {                                    
                                }  elseif ($value['status'] == 5) {
                                    echo '<span class="label label--default">Completed</span>';
                                }  elseif ($value['status'] == 6) {
                                    echo '<span class="label label-danger">Cancelled</span>';
                                } else {
                                    echo '<span class="label label-primary">New</span>';
                                } ?>
                            </td>
                            <?php if ($page_edit || $page_view || $page_delete || $invoice_view || $invoice_add) { ?>
                                <td class="table-action">
                                    <?php if ($page_edit || $page_view || $invoice_view || $invoice_add) { ?>
                                        <div class="dropdown d-inline-block">
                                            <a class="text-primary edit dropdown-toggle" data-toggle="dropdown"><i class="ti-more"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right export-button">
                                                <?php if ($page_view) { ?>
                                                    <li><a target="_blank" class="pageview<?php echo $key+1?>" href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/view&id='.$value['id'];?>"><i class="ti-layout-media-center-alt pr-2"></i>View</a></li>
                                                <?php } if ($page_edit) { ?>
                                                    <li><a target="_blank" href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/edit&id='.$value['id'];?>"><i class="ti-pencil-alt pr-2"></i>Edit</a></li>
                                                <?php } if (!empty($value['invoice_id']) && $invoice_view) { ?>
                                                    <li><a target="_blank" href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/view&id='.$value['invoice_id'];?>"><i class="ti-receipt pr-2"></i>View Invoice</a></li>
                                                <?php } elseif (empty($value['invoice_id']) && $invoice_add) { ?>
                                                    <li><a target="_blank" href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/add&appointment='.$value['id'];?>"><i class="ti-receipt pr-2"></i>Generate Invoice</a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    <?php } if ($page_delete) { ?>
                                        <a class="table-delete text-danger delete" data-toggle="tooltip" title="Delete">
                                            <i class="ti-trash"></i><input type="hidden" value="<?php echo $value['id'];?>">
                                        </a>
                                    <?php } ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } } ?>
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
            startDate:'<?php echo (isset($_GET['start'])) ? date_format(date_create($_GET['start']), $common['info']['date_format']):date_format(date_create(date('Y-m-d ' . '00:00:00')), 'd-m-Y')?>',
            endDate: '<?php echo (isset($_GET['end'])) ? date_format(date_create($_GET['end']), $common['info']['date_format']) :date_format(date_create(date('Y-m-d ' . '23:59:59')), 'd-m-Y')?>',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Next 7 Days': [moment(), moment().add(6, 'days')],
                //'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'All Time': [moment('2015-01-01'), moment().add(1000, 'days')]
            },
        });

        $('.table-date-range').on('apply.daterangepicker', function(ev, picker) {
            window.location.replace('<?php echo URL_ADMIN.DIR_ROUTE; ?>appointments'+'&start='+picker.startDate.format('YYYY-MM-DD')+'&end='+picker.endDate.format('YYYY-MM-DD'));
        });
    });

    $(".clickable-row").click(function(e) {
        window.location = $(".pageview"+e.currentTarget.getAttribute('data-count')).attr("href");
    });

</script>

<?php if ($page_delete) { include DIR_VIEW.'common/delete_modal.tpl.php';
} if ($page_add) { include DIR_ADMIN.'app/views/common/appointment_sidebar.tpl.php'; ?>
<script type="text/javascript" src="public/js/appointment.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var patient = '<?php echo(isset($patient)?true:false)?>';
            if(patient){
                document.getElementById('appointment-sidebar').click();
            }
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
    </script>


<?php } ?>

<!-- Footer -->
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>