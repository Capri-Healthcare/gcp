<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-4">
            <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoices'; ?>">Invoices</a></li>
                    <li><?php echo $page_title; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 text-right">
        </div>
    </div>
    <div>
        <div class="row align-items-center">
            <div class="col-sm-12 pb-2 text-right">
                <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/reminderemailpdf&id=' . $result['id']; ?>" class="btn btn-secondary btn-sm" target="_blank"><i class="ti-wallet mr-2"></i>Download reminder email letter</a>

                <?php if ($page_send_mail) { ?>
                    <a data-toggle="modal" class="btn btn-success btn-sm" data-target="#invoiceMail"><i class="ti-envelope mr-2"></i>Send payment reminder email</a>
                <?php } ?>

                <!-- <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/sendinvoice&id=' . $result['id']; ?>" class="btn btn-warning btn-sm"><i class="ti-wallet mr-2"></i>Send invoice</a> -->
                <a data-toggle="modal" class="btn btn-warning btn-sm" data-target="#sendMailPreview"><i class="ti-envelope mr-2"></i>Send invoice</a>

                <?php if ($page_pdf) { ?>
                    <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/pdf&id=' . $result['id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>PDF/Print</a>
                <?php }
                if ($page_edit) { ?>
                    <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/edit&id=' . $result['id']; ?>" class="btn btn-primary btn-sm"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                <?php }
                /* if ($page_addpayment) { ?>
                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addPayment"><i
                                class="ti-wallet mr-2"></i>Add Payment</a>
                <?php } */ ?>
                <!-- <a data-toggle="modal" class="btn btn-info btn-sm" data-target="#attach-file" class="btn btn-secondary btn-sm"><i class="ti-clip"></i></a> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-12 col-xl-8">
            <div class="inv-template mb-4">
                <div class="inv-template-bdy table-responsive p-4">
                    <div class="company table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="info">
                                        <div class="logo"><img src="../public/images/gcp_logo.png" alt="logo"></div>
                                        <div class="name"><?php echo $common['info']['legal_name']; ?></div>
                                        <div class="text"><?php echo $common['info']['address']['address1'] . ', ' . $common['info']['address']['address2'] . ', ' . $common['info']['address']['city'] . ', ' . $common['info']['address']['country'] . ' - ' . $common['info']['address']['postal']; ?></div>
                                    </td>
                                    <td class="text-right">
                                        <div class="title">Invoice</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="meta table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="bill-to v-aling-bottom">
                                        <div class="heading">Bill To</div>
                                        <div class="title"><?php echo $result['name']; ?></div>
                                        <div class="text"><?php echo $result['email']; ?></div>
                                        <div class="text"><?php echo $result['mobile']; ?></div>
                                    </td>
                                    <td class="info v-aling-bottom">
                                        <table class="text-right">
                                            <tbody>
                                                <tr>
                                                    <td class="text">Invoice ID</td>
                                                    <td class="text w-min-130"><?php
                                                                                $invoice_number = 'INV-' . str_pad($result['id'], 5, '0', STR_PAD_LEFT);
                                                                                echo $invoice_number; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text">Invoice Date</td>
                                                    <td class="text w-min-130"><?php echo date_format(date_create($result['invoicedate']), $common['info']['date_format']); ?></td>
                                                </tr>
                                                <?php if (!is_null($result['treatmentdate']) && $result['treatmentdate'] != '0000-00-00') { ?>

                                                    <tr>
                                                        <td class="text">Treatment Date</td>
                                                        <td class="text w-min-130"><?php echo date_format(date_create($result['treatmentdate']), $common['info']['date_format']); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td class="text">Due Date</td>
                                                    <td class="text w-min-130"><?php echo date_format(date_create($result['duedate']), $common['info']['date_format']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text">Due Amount</td>
                                                    <td class="text w-min-130"><?php echo $common['info']['currency_abbr'] . $result['due']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text">Payment Method</td>
                                                    <td class="text w-min-130"><?php echo $result['method']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text">Status</td>
                                                    <td class="text w-min-130"><?php if ($result['inv_status'] == "0") {
                                                                                    echo 'Draft';
                                                                                } else {
                                                                                    echo $result['status'];
                                                                                } ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="item table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="w-min-280">Items & Description</th>
                                    <th>Qty</th>
                                    <th><?php echo 'Unit Cost'; ?></th>
                                    <!--								<th>--><?php //echo 'Tax'; 
                                                                                ?>
                                    <!--</th>-->
                                    <th><?php echo 'Price'; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($result['items'])) {
                                    foreach ($result['items'] as $key => $value) { ?>
                                        <tr>
                                            <td class="title">
                                                <p><?php echo htmlspecialchars_decode($value['name']); ?></p>
                                                <span><?php echo htmlspecialchars_decode($value['descr']); ?></span>
                                            </td>
                                            <td><?php echo $value['quantity']; ?></td>
                                            <td><?php echo $common['info']['currency_abbr'] . $value['cost']; ?></td>
                                            <!--									<td class="tax">-->
                                            <!--										--><?php //if (!empty($value['tax'])) { foreach ($value['tax'] as $tax_key => $tax_value) { 
                                                                                            ?>
                                            <!--											<div><span>-->
                                            <?php //echo $common['info']['currency_abbr'].$tax_value['tax_price']; 
                                            ?>
                                            <!--</span><span>-->
                                            <?php //echo $tax_value['name']; 
                                            ?>
                                            <!--</span></div>-->
                                            <!--										--><?php //} } 
                                                                                            ?>
                                            <!--									</td>-->
                                            <td><?php echo $common['info']['currency_abbr'] . $value['price']; ?></td>
                                        </tr>
                                <?php }
                                } ?>
                                <tr class="total">
                                    <td rowspan="5" colspan="2" class="blank">
                                        <?php
                                        if (in_array($common['user']['role'], constant('USER_ROLE'))) {
                                            if (isset($result['medical_insurers_name']) and !empty($result['medical_insurers_name'])) {
                                                echo "<b>Policy details</b>";
                                                echo "<br>" . "Medical insurers name: " . $result['medical_insurers_name'];
                                                echo "<br>" . "Policyholder's name: " . $result['policyholders_name'];
                                                echo "<br>" . "Membership number: " . $result['membership_number'];
                                                echo "<br>" . "Scheme name: " . $result['scheme_name'];
                                                echo "<br>" . "Authorisation number: " . $result['authorisation_number'];
                                                echo "<br>" . "Employer: " . $result['employer'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td class="title">Sub Total</td>
                                    <td class="value"><?php echo $common['info']['currency_abbr'] . $result['subtotal']; ?></td>
                                </tr>
                                <!--							<tr class="total">-->
                                <!--								<td class="title">Tax</td>-->
                                <!--								<td class="value">-->
                                <?php //echo $common['info']['currency_abbr'].$result['tax']; 
                                ?>
                                <!--</td>-->
                                <!--							</tr>-->
                                <tr class="total">
                                    <td class="title">Discount</td>
                                    <td class="value"><?php echo $common['info']['currency_abbr'] . $result['discount_value']; ?></td>
                                </tr>
                                <tr class="total">
                                    <td class="title">Total</td>
                                    <td class="value"><?php echo $common['info']['currency_abbr'] . $result['amount']; ?></td>
                                </tr>
                                <tr class="total">
                                    <td class="title">Paid</td>
                                    <td class="value"><?php echo empty($result['paid']) ? $common['info']['currency_abbr'] . $result['paid'] . '0' : $common['info']['currency_abbr'] . $result['paid'] ?></td>
                                </tr>
                                <tr class="total">
                                    <td class="title">Due Amount</td>
                                    <td class="value"><?php echo $common['info']['currency_abbr'] . $result['due']; ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="note">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="block align-top">
                                        <span>Customer Note</span>
                                        <p><?php echo $result['note']; ?></p>
                                    </td>
                                    <!--td class="block align-top">
									<span>Terms & Conditions</span>
									<p><?php echo $result['tc']; ?></p>
								</td-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-12 col-xl-4">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-12">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">
                                <span class="panel-title-text">Payment History</span>
                            </div>
                            <div class="panel-action">
                                <?php if ($page_addpayment) { ?>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addPayment"><i class="ti-wallet mr-1"></i> Add Payment</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0;
                                    if (!empty($payments)) {
                                        foreach ($payments as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo date_format(date_create($value['payment_date']), $common['info']['date_format']); ?></td>
                                                <td><?php if (!empty($value['method_name'])) {
                                                        echo $value['method_name'];
                                                    } else {
                                                        echo "Paypal";
                                                    } ?></td>
                                                <td><?php echo $common['info']['currency_abbr'] . $value['amount']; ?></td>
                                            </tr>
                                        <?php $total = $total + $value['amount'];
                                        } ?>
                                        <tr>
                                            <td colspan="2" class="text-right">Total</td>
                                            <td><?php echo $common['info']['currency_abbr'] . ' ' . $total; ?></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="3">Payment History</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-12">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">
                                <span class="panel-title-text">Attachments</span>
                            </div>
                            <div class="panel-action">
                                <a data-toggle="modal" class="btn btn-info btn-sm" data-target="#attach-file" class="btn btn-secondary btn-sm"><i class="ti-clip"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper">
                            <div class="attachment-container">
                                <?php if (!empty($attachments)) {
                                    foreach ($attachments as $key => $value) {
                                        $file_ext = pathinfo($value['file'], PATHINFO_EXTENSION);
                                        if ($file_ext == "pdf") { ?>
                                            <div class="attachment-image attachment-pdf">
                                                <a href="../public/uploads/attachments/<?php echo $value['file']; ?>" class="open-pdf">
                                                    <img src="../public/images/pdf.png" alt="">
                                                </a>
                                                <div class="attachment-delete" data-toggle="tooltip" title="Delete"><a class="ti-close"></a></div>
                                                <input type="hidden" name="report_name" value="<?php echo $value['file']; ?>">
                                            </div>
                                        <?php } else { ?>
                                            <div class="attachment-image">
                                                <a data-fancybox="gallery" href="../public/uploads/attachments/<?php echo $value['file']; ?>">
                                                    <img src="../public/uploads/attachments/<?php echo $value['file']; ?>" alt="">
                                                </a>
                                                <div class="attachment-delete" data-toggle="tooltip" title="Delete"><a class="ti-close"></a></div>
                                                <input type="hidden" name="report_name" value="<?php echo $value['file']; ?>">
                                            </div>
                                    <?php }
                                    }
                                } else { ?>
                                    <p class="p-3 text-danger text-center">No doument found !!!</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Payment Modal -->
    <div id="addPayment" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payments</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?php echo $action; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Payment Method</label>
                            <select name="payment[method]" class="custom-select" required>
                                <option value="">Payment Method</option>
                                <?php if ($method) {
                                    foreach ($method as $key => $value) { ?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><?php echo 'Amount (' . $common['info']['currency_abbr'] . ')'; ?></label>
                            <input type="text" class="form-control" name="payment[amount]" value="<?php echo $result['due']; ?>" placeholder="Amount" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Payment Date</label>
                            <input type="text" class="form-control date" name="payment[date]" value="<?php echo date_format(date_create(), $common['info']['date_format']); ?>" placeholder="Payment Date" required>
                        </div>
                        <input type="hidden" name="payment[invoice]" value="<?php echo $result['id']; ?>">
                        <input type="hidden" name="payment[email]" value="<?php echo $result['email']; ?>">
                        <input type="hidden" name="_token" value="<?php echo $common['token']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Attach File Modal -->
    <div id="attach-file" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Uplaod Attachments</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <form action="<?php echo URL_ADMIN . DIR_ROUTE . 'attach/documents'; ?>" class="dropzone" id="attach-file-upload"></form>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
    <script src="public/js/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $("a.open-pdf").fancybox({
                'frameWidth': 800,
                'frameHeight': 900,
                'overlayShow': true,
                'hideOnContentClick': false,
                'type': 'iframe'
            });

            $("#attach-file-upload").dropzone({
                addRemoveLinks: true,
                acceptedFiles: "image/*,application/pdf",
                maxFilesize: 2,
                dictDefaultMessage: 'Drop files here or click here to upload.<br /><br /> Only Image and PDF allowed.',
                init: function() {
                    var attachmentDropzone = this;

                    this.on("sending", function(file, xhr, formData) {
                        formData.append("id", <?php echo $result['id']; ?>);
                        formData.append("type", 'invoice');
                        formData.append("_token", $('.s_token').val());
                    });

                    this.on("success", function(file, xhr) {
                        var response = JSON.parse(xhr);
                        if (response.error === false) {
                            if (response.ext === "pdf") {
                                $('.attachment-container').append('<div class="attachment-image attachment-pdf">' +
                                    '<a href="../public/uploads/attachments/' + response.name + '" class="open-pdf">' +
                                    '<img class="img-thumbnail" src="../public/images/pdf.png" alt="">' +
                                    '</a>' +
                                    '<input type="hidden" name="report_name" value="' + response.name + '">' +
                                    '<div class="attachment-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close"></a></div>' +
                                    '</div>');
                            } else {
                                $('.attachment-container').append('<div class="attachment-image">' +
                                    '<a data-fancybox="gallery" href="../public/uploads/attachments/' + response.name + '">' +
                                    '<img class="img-thumbnail" src="../public/uploads/attachments/' + response.name + '" alt="">' +
                                    '</a>' +
                                    '<div class="attachment-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close"></a></div>' +
                                    '<input type="hidden" name="report_name" value="' + response.name + '">' +
                                    '</div>');
                            }
                            toastr.success('File uploaded successfully.');
                            $('#attach-file').modal('hide');
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                        attachmentDropzone.removeFile(file);
                    });
                }
            });

            $('.attachment-container').on('click', '.attachment-delete a', function() {
                var ele = $(this),
                    name = ele.parents('.attachment-image').find('input').val();
                $.ajax({
                    type: 'POST',
                    url: 'index.php?route=attach/documents/delete',
                    data: {
                        name: name,
                        type: 'invoice',
                        id: '<?php echo $result['id']; ?>',
                        _token: $('.s_token').val()
                    },
                    error: function() {
                        toastr.error('File could not be deleted', 'Server Error');
                    },
                    success: function(data) {
                        response = JSON.parse(data);
                        if (response.error === false) {
                            ele.parents('.attachment-image').remove();
                            toastr.success('File deleted successfully');
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                    }
                });
            });
        });
    </script>
    <!-- Sent Email -->
    <div id="invoiceMail" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/sentmail'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>To</label>
                                <input type="text" class="form-control" value="<?php echo $result['name'] ?>" placeholder="To" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>BCC</label>
                                <input type="email" class="form-control" name="mail[bcc]" value="" placeholder="BCC">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="mail[subject]" value="Reminder for unpaid invoices" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <label>Attach PDF?</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="mail[attachPdf]" class="custom-control-input" value="1" id="mailPdf" checked>
                                <label class="custom-control-label" for="mailPdf"><i class="icon-paper-clip ml-2"></i>
                                    invoice-<?php echo $result['id']; ?>.pdf</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Message</label>
                            <textarea name="mail[message]" class="mail-summernote" placeholder="Message">

                            <?php
                            $address_arr = json_decode($result['address'], true);
                            $patient_address = "";
                            $patient_address .= !empty($address_arr['address1']) ? ('<br>' . $address_arr['address1']) : '';
                            $patient_address .= !empty($address_arr['address2']) ? ('<br>' . $address_arr['address2']) : '';
                            $patient_address .= !empty($address_arr['city']) ? ('<br>' . $address_arr['city']) : '';
                            $patient_address .= !empty($address_arr['postal']) ? ('<br>' . $address_arr['postal']) : '';

                            $emial_body = INVOICE_REMINDER_EMAIL_TEMPLATE;
                            $emial_body = str_replace("#TODAY_DATE", date('d-m-Y'), $emial_body);

                            $patient_first_name_arr = explode(" ", strtolower($result['name']));
                            if (in_array($patient_first_name_arr[0], ['mr.', 'mrs.', 'ms.', 'miss.', 'mr', 'mrs', 'ms', 'miss'])) {
                                $patient_first_name = ucfirst(strtolower($patient_first_name_arr[1]));
                            } else {
                                $patient_first_name = ucfirst(strtolower($patient_first_name_arr[0]));
                            }
                            $emial_body = str_replace("#PATIENT_FULLNAME", $result['name'], $emial_body);
                            $emial_body = str_replace("#PATIENT_FIRST_NAME", $patient_first_name, $emial_body);
                            $emial_body = str_replace("#PATIENT_ADDRESS", $patient_address, $emial_body);
                            $emial_body = str_replace("#INVOICE_NUMBER", $invoice_number, $emial_body);
                            $emial_body = str_replace("#INVOICE_DATE", $result['invoicedate'], $emial_body);
                            $emial_body = str_replace("#INVOICE_TREATMENT_DATE", $result['treatmentdate'], $emial_body);
                            $emial_body = str_replace("#INVOICE_TOTAL", $common['info']['currency_abbr'] . $result['amount'], $emial_body);
                            $emial_body = str_replace("#INVOICE_DUE", $common['info']['currency_abbr'] . $result['due'], $emial_body);
                            echo $emial_body;
                            ?>
                            </textarea>
                        </div>
                        <input type="hidden" name="mail[id]" value="<?php echo $result['id']; ?>">
                        <input type="hidden" name="_token" value="<?php echo $common['token']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="sendMailPreview" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Mail</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/sentmail'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>To</label>
                                <input type="text" class="form-control" value="<?php echo $result['name'] ?>" placeholder="To" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>BCC</label>
                                <input type="email" class="form-control" name="mail[bcc]" value="" placeholder="BCC">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="mail[subject]" value="<?php echo $email_preview['subject']; ?>" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Message</label>
                            <textarea name="mail[message]" class="mail-summernote" placeholder="Message">
                            <?php
                            echo $email_preview['message'];
                            ?>
                            </textarea>
                        </div>
                        <input type="hidden" name="mail[id]" value="<?php echo $result['id']; ?>">
                        <input type="hidden" name="_token" value="<?php echo $common['token']; ?>">
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo URL_ADMIN . DIR_ROUTE . 'invoice/sendinvoice&id=' . $result['id']; ?>" class="btn btn-primary"><i class="ti-save-alt pr-2"></i>Send invoice</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- include summernote css/js-->
    <link href="public/css/summernote-bs4.css" rel="stylesheet">
    <script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="public/js/klinikal.summernote.js"></script>

    <?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>