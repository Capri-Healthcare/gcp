<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
<script type='text/javascript' src='public/js/invoice.js'></script>
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'optician-invoices'; ?>">Optician Invoices</a></li>
                    <li><?php echo $page_title; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 text-right"></div>
    </div>
</div>

<form action="<?php echo $action ?>" method="post">
    <div class="panel panel-default">
        <input type="hidden" name="_token" value="<?php echo $common['token']; ?>">
        <input type="hidden" name="invoice[id]" value="<?php echo $result['id']; ?>">
        <input type="hidden" name="invoice[appointment_id]" value="<?php echo $result['appointment_id']; ?>">
        <input type="hidden" name="hidden_medical_insurers_name" id="hidden_medical_insurers_name" value="<?php echo $result['medical_insurers_name']; ?>">
        <input type="hidden" name="hidden_policyholders_name" id="hidden_policyholders_name" value="<?php echo $result['policyholders_name']; ?>">
        <input type="hidden" name="hidden_membership_number" id="hidden_membership_number"
               value="<?php echo $result['membership_number']; ?>">
        <input type="hidden" name="hidden_scheme_name" id="hidden_scheme_name"
               value="<?php echo $result['scheme_name']; ?>">
        <input type="hidden" name="hidden_authorisation_number" id="hidden_authorisation_number"
               value="<?php echo $result['authorisation_number']; ?>">
        <input type="hidden" name="hidden_employer" id="hidden_employer" value="<?php echo $result['employer']; ?>">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-form-label">Invoice Date <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar"></i></span>
                            </div>
                            <input type="text" name="invoice[invoicedate]" class="form-control date"
                                   value="<?php echo date_format(date_create($result['invoicedate']), $common['info']['date_format']); ?>"
                                   placeholder="Invoice Date" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-form-label">Due Date <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar"></i></span>
                            </div>
                            <input type="text" name="invoice[duedate]" class="form-control date"
                                   value="<?php echo date('d-m-Y', strtotime("+5 weeks", strtotime(date('Y-m-d')))) ?>"
                                   placeholder="Due Date" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Payment Method <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="ti-credit-card"></i></span></div>
                            <select name="invoice[method]" class="custom-select" id="payment_method" required>
                                <?php $selected_payment_method = "";
                                if ($payment_method) {
                                    foreach ($payment_method as $key => $value) { ?>
                                        <option value="<?php echo $value['id'] ?>" <?php if ($result['method'] == $value['id']) {
                                            $selected_payment_method = $value['name'];
                                            echo "selected";
                                        } ?>><?php echo $value['name']; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-form-label">Payment Status <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span>
                            </div>
                            <select name="invoice[status]" id="" class="custom-select" required>
                                <option value="Paid" <?php if ("Paid" == $result['status']) {
                                    echo "selected";
                                } ?>>Paid
                                </option>
                                <option value="Partially Paid" <?php if ("Partially Paid" == $result['status']) {
                                    echo "selected";
                                } ?>>Partially Paid
                                </option>
                                <option value="Unpaid" <?php if ("Unpaid" == $result['status']) {
                                    echo "selected";
                                } ?>>Unpaid
                                </option>
                                <option value="Pending" <?php if ("Pending" == $result['status']) {
                                    echo "selected";
                                } ?>>Pending
                                </option>
                                <option value="In Process" <?php if ("In Process" == $result['status']) {
                                    echo "selected";
                                } ?>>In Process
                                </option>
                                <option value="Cancelled" <?php if ("Cancelled" == $result['status']) {
                                    echo "selected";
                                } ?>>Cancelled
                                </option>
                                <option value="Other" <?php if ("Other" == $result['status']) {
                                    echo "selected";
                                } ?>>Other
                                </option>
                                <option value="Unknown" <?php if ("Unknown" == $result['status']) {
                                    echo "selected";
                                } ?>>Unknown
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-form-label">Invoice Status <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span>
                            </div>
                            <select name="invoice[inv_status]" class="custom-select" required>
                                <option value="0" <?php if ($result['inv_status'] == "0") {
                                    echo "selected";
                                } ?>>Draft
                                </option>
                                <option value="1" <?php if ($result['inv_status'] == "1") {
                                    echo "selected";
                                } ?>>Published
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-items table-responsive pt-3 pb-5">
                <table class="table-input">
                    <thead>
                    <tr>
                        <th>Patient<span class="form-required">*</span></th>
                        <th>Report Type<span class="form-required">*</span></th>
                        <th>Quantity <span class="form-required">*</span></th>
                        <th>Unit Cost <span class="form-required">*</span></th>
<!--                        <th>Tax</th>-->
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($result['items'])) {
                        foreach ($result['items'] as $key => $value) { ?>
                            <tr class="item-row">
                                <td>
                                    <select name="invoice[item][<?php echo $key; ?>][name]" class="item-name form-control" onchange="reportPatient(event)" data-row="<?php echo $key; ?>" required>
                                        <option value="">Select Patient</option>
                                        <?php if (!empty($patient)) {
                                            foreach ($patient as $list) { ?>
                                                <option value="<?php echo $list['firstname'] . " " . $list['lastname'] ?>" <?php echo ($value['name'] == $list['firstname'] . " " . $list['lastname']) ? 'selected' : '' ?> data-patientid="<?php echo $list['patient_id'] ?>"><?php echo $list['firstname'] . " " . $list['lastname'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                    <input type="hidden" name="invoice[item][<?php echo $key; ?>][patient_id]" value="<?php echo $value['patient_id']?>">
                                </td>
                                <td class="invoice-item">
                                    <select name="invoice[item][<?php echo $key; ?>][descr]" class="item-descr form-control" onchange="reportPrice(event)" data-row="<?php echo $key; ?>">
                                        <option value="">Select Report Type</option>
                                        <?php foreach (constant('INVOICE_REPORT_TYPE') as $list) { ?>
                                            <option value="<?php echo $list['name'] ?>" <?php echo $value['descr'] == $list['name'] ? 'selected' : '' ?> data-price="<?php echo $list['price'] ?>"><?php echo $list['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td class="">
                                    <textarea readonly type="text" name="invoice[item][<?php echo $key; ?>][quantity]"
                                              class="item-quantity"
                                              required onkeypress="return numericValidation(event)"><?php echo $value['quantity']; ?></textarea>
                                </td>
                                <td class="">
                                    <textarea readonly type="text" name="invoice[item][<?php echo $key; ?>][cost]" class="item-cost" required onkeypress="return numericValidation(event)"><?php echo $value['cost']; ?></textarea>
                                </td>
<!--                                <td class="invoice-tax">-->
<!--                                    --><?php //if (!empty($value['tax'])) {
//                                        foreach ($value['tax'] as $tax_key => $tax_value) { ?>
<!--                                            <p class="badge badge-light badge-sm badge-pill">-->
<!--                                                --><?php //echo $tax_value['name']; ?>
<!--                                                <input type="number"-->
<!--                                                       name="invoice[item][--><?php //echo $key ?><!--][tax][--><?php //echo $tax_key ?><!--][tax_price]"-->
<!--                                                       class="single-tax-price"-->
<!--                                                       value="--><?php //echo $tax_value['tax_price']; ?><!--" readonly>-->
<!--                                                <input type="hidden"-->
<!--                                                       name="invoice[item][--><?php //echo $key ?><!--][tax][--><?php //echo $tax_key ?><!--][id]"-->
<!--                                                       class="invoice-tax-id" value="--><?php //echo $tax_value['id']; ?><!--">-->
<!--                                                <input type="hidden"-->
<!--                                                       name="invoice[item][--><?php //echo $key ?><!--][tax][--><?php //echo $tax_key ?><!--][name]"-->
<!--                                                       value="--><?php //echo $tax_value['name']; ?><!--">-->
<!--                                                <input type="hidden" class="invoice-tax-rate"-->
<!--                                                       name="invoice[item][--><?php //echo $key ?><!--][tax][--><?php //echo $tax_key ?><!--][rate]"-->
<!--                                                       value="--><?php //echo $tax_value['rate']; ?><!--">-->
<!--                                            </p>-->
<!--                                        --><?php //}
//                                    } ?>
<!--                                    <input type="hidden" name="invoice[item][--><?php //echo $key; ?><!--][taxprice]"-->
<!--                                           class="item-tax-price" value="--><?php //echo $value['taxprice']; ?><!--" readonly>-->
<!--                                </td>-->
                                <td>
                                    <textarea  name="invoice[item][<?php echo $key; ?>][price]"
                                              class="item-total-price"
                                              readonly onkeypress="return numericValidation(event)"><?php echo $value['price']; ?></textarea>
                                    <input type="hidden" class="item-price" value="<?php echo $value['price']; ?>">
                                </td>
                                <td>
                                    <!--a class="badge badge-warning badge-sm badge-pill add-taxes m-1">Add Taxes</a-->
                                    <a class="badge badge-danger badge-sm badge-pill delete m-1">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr class="item-row">
                            <td>
                                <select name="invoice[item][0][name]" class="item-name form-control" onchange="reportPatient(event)" data-row="0" required>
                                    <option value="">Select Patient</option>
                                    <?php if (!empty($patient)) {
                                        foreach ($patient as $list) { ?>
                                            <option value="<?php echo $list['firstname'] . " " . $list['lastname'] ?>" data-patientid="<?php echo $list['patient_id'] ?>"><?php echo $list['firstname'] . " " . $list['lastname'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                                <input type="hidden" name="invoice[item][0][patient_id]" value="">
                            </td>
                            <td class="invoice-item">
                                <select name="invoice[item][0][descr]" class="item-descr form-control" onchange="reportPrice(event)" data-row="0">
                                    <option value="">Select Report Type</option>
                                    <?php foreach (constant('INVOICE_REPORT_TYPE') as $list) { ?>
                                        <option value="<?php echo $list['name'] ?>" data-price="<?php echo $list['price'] ?>"><?php echo $list['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="">
                                <textarea name="invoice[item][0][quantity]" class="item-quantity"
                                          required readonly onkeypress="return numericValidation(event)">1</textarea>
                            </td>
                            <td class="">
                                <textarea  name="invoice[item][0][cost]" class="item-cost"
                                          required onkeypress="return numericValidation(event)"></textarea>
                            </td>
<!--                            <td class="invoice-tax">-->
<!--                                <input type="hidden" name="invoice[item][0][taxprice]" class="item-tax-price" value="0"-->
<!--                                       readonly>-->
<!--                            </td>-->
                            <td class="">
                                <textarea  name="invoice[item][0][price]" class="item-total-price"
                                          readonly onkeypress="return numericValidation(event)"></textarea>
                                <input type="hidden" class="item-price">
                            </td>
                            <td>
<!--                                <a class="badge badge-warning badge-sm badge-pill add-taxes m-1">Add Taxes</a>-->
                                <a class="badge badge-danger badge-sm badge-pill delete m-1">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="p-2">
                            <div class="add-items d-inline-block">
                                <a class="btn btn-success btn-sm m-1"><i class="icon-plus mr-1"></i>Add Patient</a>
                            </div>
                        </td>
                        <td colspan="2" class="total-line">
                            <label>Sub Total</label>
                        </td>
                        <td colspan="2" class="total-value">
                            <input type="number" name="invoice[subtotal]" class="form-transparent sub-total"
                                   value="<?php echo $result['subtotal'] ?>" readonly>
                        </td>
                    </tr>
<!--                    <tr>-->
<!--                        <td colspan="3" class="blank">-->
<!--                        </td>-->
<!--                        <td colspan="2" class="total-line">-->
<!--                            <label>Tax</label>-->
<!--                        </td>-->
<!--                        <td colspan="2" class="total-value">-->
                            <input type="hidden" name="invoice[tax]" class="form-transparent tax-total"
                                   value="<?php echo $result['tax'] ?>" readonly>
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td colspan="3" class="blank">
                        </td>
                        <td colspan="2" class="total-line">
                            <div class="row align-items-center">
                                <div class="col-8"><label>Discount</label></div>
                                <div class="col-4">
                                    <select name="invoice[discounttype]" class="form-control discount-type">
                                        <option value="1" <?php if ($result['discounttype'] == 1) {
                                            echo "selected";
                                        } ?>>%
                                        </option>
                                        <option value="2" <?php if ($result['discounttype'] == 2) {
                                            echo "selected";
                                        } ?>>Flat
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td colspan="2" class="total-value">
                            <input type="number" name="invoice[discount]" class="form-transparent discount-total"
                                   value="<?php echo $result['discount'] ?>">
                            <input type="hidden" class="discount_amount" name="invoice[discount_value]"
                                   value="<?php echo $result['discount_value'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="blank">
                        </td>
                        <td colspan="2" class="total-line">
                            <label>Total</label>
                        </td>
                        <td colspan="2" class="total-value">
                            <input type="number" name="invoice[amount]" class="form-transparent  total-amount"
                                   value="<?php echo $result['amount'] ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="blank">
                        </td>
                        <td colspan="2" class="total-line">
                            <label>Paid</label>
                        </td>
                        <td colspan="2" class="total-value">
                            <input type="number" name="invoice[paid]" class="form-transparent paid-amount"
                                   value="<?php echo $result['paid'] ?>" onkeypress="return numericValidation(event)">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="blank">
                        </td>
                        <td colspan="2" class="total-line">
                            <label>Due</label>
                        </td>
                        <td colspan="2" class="total-value">
                            <input type="text" name="invoice[due]" class="form-transparent due-amount"
                                   value="<?php echo $result['due'] ?>" readonly>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Customer Note</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="ti-quote-left"></i></span></div>
                            <textarea class="form-control" name="invoice[note]"
                                      rows="3"><?php if (empty($result['id'])) {
                                    echo '';
                                } else {
                                    echo $result['note'];
                                } ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Terms Conditions</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="ti-notepad"></i></span></div>
                            <textarea class="form-control" name="invoice[tc]" rows="3"><?php if (empty($result['id'])) {
                                    echo '';
                                } else {
                                    echo $result['tc'];
                                } ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer text-center">
            <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
        </div>
    </div>
</form>

<div class="modal fade" id="addTax">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tax</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($taxes) {
                    foreach ($taxes as $key => $value) { ?>
                        <div class="custom-control custom-checkbox custom-checkbox-1 mb-3">
                            <input type="checkbox" class="custom-control-input"
                                   id="inv-taxes-<?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>"
                                   data-rate="<?php echo $value['rate'] ?>" data-name="<?php echo $value['name'] ?>"
                                   name="modaltax">
                            <label class="custom-control-label"
                                   for="inv-taxes-<?php echo $value['id'] ?>"><?php echo $value['name'] . ' (' . $value['rate'] . '%)'; ?></label>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-pill add-modal-taxes">Add Taxes</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var isOptician =  <?php echo !in_array($common['user']['role'], constant('USER_ROLE')) ? 0 : 1 ?>;
    var patientOption = null;
    var itemDescriptionOption = null;
    <?php if (!empty($patient)) {
    foreach ($patient as $list) { ?>
     patientOption += '<option value="<?php echo $list["firstname"]. " " . $list["lastname"] ?>" data-patientid="<?php echo $list["patient_id"] ?>"><?php echo $list["firstname"]. " " . $list["lastname"] ?></option>';
    <?php }
    } ?>
    <?php if (!empty($patient)) {
    foreach (constant('INVOICE_REPORT_TYPE')  as $list) { ?>
    itemDescriptionOption += '<option value="<?php echo $list['name']; ?>" data-price="<?php echo $list['price']; ?>"><?php echo $list['name']; ?></option>';
    <?php }
    } ?>
</script>

<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>
