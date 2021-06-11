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
                <?php if ($common['user']['role'] != constant('USER_ROLE')[1]) { ?>
                    <div class="btn btn-white btn-sm text-left mr-2">
                        <i class="ti-filter text-danger pr-2"></i>
                        <select class="status" style="border: 0px;">
                            <?php if (in_array($common['user']['role'], constant('USER_FOLLOWUP_GCP_ROLE'))) { ?>
                                <?php foreach (constant('STATUS_PAYMENT') as $key => $status) { ?>

                                    <option value="<?php echo $key ?>" <?php echo (isset($_GET['status']) && $key == $_GET['status']) ? 'selected':''?>>
                                        <?php echo $status; ?></option>
                                <?php } ?>
                            <?php } ?>
                            <?php if (in_array($common['user']['role'], constant('USER_FOLLOWUP_MED_ROLE'))) { ?>
                                <?php foreach (constant('STATUS_FOLLOWUP') as $key => $status) { ?>
                                    <option value="<?php echo $key ?>" <?php echo (isset($_GET['status']) && $key == $_GET['status']) ? 'selected':''?>>
                                        <?php echo $status; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <!--                --><?php //if ($page_add) { ?>
                <!--                    <a href="-->
                <?php //echo URL_ADMIN . DIR_ROUTE . 'optician-referral/add'; ?><!--"-->
                <!--                       class="btn btn-primary btn-sm"><i class="ti-plus pr-2"></i> Create Referral</a>-->
                <!--                --><?php //} ?>
                <!--            </div>-->
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
                        <th>Patient info</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Due for Followup</th>
                        <?php if (in_array($common['user']['role'], constant('USER_FOLLOWUP_GCP_ROLE'))) { ?>
                            <th>Payment Status</th>
                        <?php }
                        if (in_array($common['user']['role'], constant('USER_FOLLOWUP_MED_ROLE'))) { ?>
                            <th>Followup Status</th>
                        <?php } ?>
                        <th>Date Submited</th>
                        <?php if ($page_edit) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                    </thead>

                    <tbody>

                    <?php if (!empty($result)) {
                        foreach ($result as $key => $value) { ?>


                            <tr style="cursor: pointer">
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $key + 1; ?></td>
                                <td class="clickable-row" data-count="<?php echo $key + 1; ?>">
                                    <?php echo $value['patient_name']; ?>
                                    <p class="m-0"><?php echo $value['email']; ?></p>
                                    <p class="m-0"><?php echo $value['mobile']; ?></p>
                                </td class="clickable-row" data-count="<?php echo $key + 1; ?>">
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo $value['gender']; ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo date_format(date_create($value['dob']), $common['info']['date_format']); ?></td>
                                <td class="clickable-row"
                                    data-count="<?php echo $key + 1; ?>"><?php echo date("M Y", strtotime($value['due_date'])); ?>
                                </td>
                                <?php if (in_array($common['user']['role'], constant('USER_FOLLOWUP_GCP_ROLE'))) { ?>
                                    <td><?php if ($value['payment_status'] == 'UNPAID') {
                                            echo '<a href="' . URL_ADMIN . DIR_ROUTE . 'follow-up/edit&id=' . $value['id'] . '&status=PAID" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Mark as Paid">&nbsp;Mark as paid</a></br></br>';
                                            echo '<a href="' . URL_ADMIN . DIR_ROUTE . 'follow-up/edit&id=' . $value['id'] . '&status=NOT_SUITABLE" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Mark as Not Suitable">&nbsp;Not Suitable</a>';
                                        } else {
                                            echo constant('STATUS_PAYMENT')[$value['payment_status']];
                                        } ?></td>
                                <?php } ?>
                                <?php if (in_array($common['user']['role'], constant('USER_FOLLOWUP_MED_ROLE'))) { ?>
                                    <td><?php echo constant('STATUS_FOLLOWUP')[$value['followup_status']]; ?></td>
                                <?php } ?>
                                <!--                                <td class="clickable-row"-->
                                <!--                                    data-count="-->
                                <?php //echo $key + 1; ?><!--">--><?php //echo $value['followup_status']; ?><!--</td>-->
                                <!--							<td>--><?php //echo $value['created_by']; ?><!--</td>-->

                                <td><?php echo date_format(date_create($value['created_at']), $common['info']['date_format']); ?></td>
                                <td class="<?php echo ($common['user']['role'] == constant('USER_ROLE_OPTOMETRIST')) ? 'table-action' : '' ?>">
                                    <?php if ($page_edit) { ?>

                                        <?php if ($common['user']['role'] != constant('DASHBOARD_NOT_SHOW')[0] && $common['user']['role'] != constant('DASHBOARD_NOT_SHOW')[2] && $value['followup_status'] == 'NEW') { ?>
                                            <a class="pageview<?php echo $key + 1 ?>"
                                               href="<?php echo URL_ADMIN . DIR_ROUTE . 'follow-up/edit&id=' . $value['id']; ?>"
                                               class="text-primary edit" data-toggle="tooltip"
                                               title="Edit"><i
                                                        class="ti-pencil-alt"></i></a>
                                        <?php } ?>

                                    <?php } ?>
                                    <?php if (in_array($common['user']['role'], constant('USER_FOLLOWUP_MED_ROLE'))) { ?>
                                        <?php if ($value['followup_status'] != 'ACCEPTED' && $value['followup_status'] != 'NOT_SUITABLE' && $common['user']['role'] == constant('DASHBOARD_NOT_SHOW')[0]) {
                                            echo '<a href="#" class="btn btn-sm btn-primary btnHospitalPopup" data-toggle="modal" data-id="' . $value['id'] . '">&nbsp;Select Hospital</a></br></br>';
                                            echo '<a href="' . URL_ADMIN . DIR_ROUTE . 'follow-up/edit&id=' . $value['id'] . '&status=NOT_SUITABLE" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Mark as Not Suitable">&nbsp;Not Suitable</a>';
                                        } ?>

                                        <?php if ($value['followup_status'] == 'ACCEPTED' && $common['user']['role'] != constant('DASHBOARD_NOT_SHOW')[1]) { ?>
                                            <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'appointments&id=' . $value['patient_id'] . '&followupid=' . $value['id'].'&opticianid=' . $value['optician_id']; ?>"
                                               class="btn btn-sm btn-primary" data-toggle="tooltip"
                                               title="Book Appointment">&nbsp;<?php echo($common['user']['role'] != constant('USER_ROLE_MED')) ?'Book Appointment':'Add to list'?></a>
                                        <?php } ?>

                                    <?php } ?>
                                </td>

                            </tr>
                            </a>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="modal-Hospital">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Select Hospital</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" id="follow-up-id">
                                <?php foreach (constant('HOSPITAL_LIST') as $key => $list) { ?>
                                    <div class="custom-control custom-radio custom-radio-1 d-inline-block">
                                        <input type="radio" name="patient[hospital_code]"
                                               class="custom-control-input hospital_code" value="<?php echo $key; ?>" id="" checked>
                                        <label class="custom-control-label" for="prescription_template-template-1">&nbsp;<b><?php echo $list['name'] ?></b></label>
                                        <label class="ml-4 mt-1">
                                            <i class="ti-mobile"></i><?php echo $list['mobile'] ?> &nbsp;&nbsp;<i
                                                    class="ti-email"></i>&nbsp;<?php echo $list['email'] ?>
                                            <br><i class="ti-location-pin"></i><?php echo $list['address'] ?><br><i
                                                    class="ti-world"></i>&nbsp;<?php echo $list['web'] ?>
                                        </label>
                                    </div>
                                    <hr/>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary hospital-code">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
                    window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>follow-up' + '&status=' + status + '&start=' + picker.startDate.format('YYYY-MM-DD') + '&end=' + picker.endDate.format('YYYY-MM-DD'));
                });
            });

            $('.status').on('change', function (e) {
                var startDate = $("#startDate").val();
                var endDate = $("#endDate").val();
                window.location.replace('<?php echo URL_ADMIN . DIR_ROUTE; ?>follow-up' + '&status=' + e.currentTarget.value + '&start=' + startDate + '&end=' + endDate);
            });
            $(".clickable-row").click(function (e) {

                var link = $(".pageview" + e.currentTarget.getAttribute('data-count')).attr("href");
                if (link != undefined) {
                    window.location = $(".pageview" + e.currentTarget.getAttribute('data-count')).attr("href");

                }

            });

            $('.hospital-code').on('click', function (e) {
                var hospitalcode = $(".hospital_code:checked").val();
                var followupId = $("#follow-up-id").val();

                if (hospitalcode != undefined) {
                    $.ajax({
                        type: 'GET',
                        url: 'index.php?route=follow-up/edit&id='+followupId+'&hospitalcode='+hospitalcode,
                        error: function () {
                            toastr.error('Error', 'Please try again...');
                        },
                        success: function (data) {
                            $("#modal-Hospital").modal('hide');
                            window.location.reload();
                            toastr.success('', 'Followup Successfully updated.');

                        }
                    });

                } else {
                    toastr.error('Error', 'Select Hospital');
                }

            });

            $('.btnHospitalPopup').on('click', function (e) {
                var id = $(this).data('id');
                $("#follow-up-id").val(id);
                $("#modal-Hospital").modal('show');
            });

        </script>
    </div>
<?php
include(DIR_ADMIN . 'app/views/common/footer.tpl.php');
?>